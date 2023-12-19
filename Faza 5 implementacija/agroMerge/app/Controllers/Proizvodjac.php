<?php

namespace App\Controllers;

use App\Models\ProizvodjacModel2;
use App\Models\ProizvodModel2;
use App\Models\KorisnikModel;
use App\Models\KorpaModel;

class Proizvodjac extends BaseController
{
    protected function prikaz($page,$page1,$data){
        echo view("sabloni/$page1",$data);
        echo view ("stranice/$page",$data);
    }
    public function index()
    {
        $this->mojiProizvodi();
    }
    public function prikazPonuda(){
        $this->prikaz('proizvodi' ,'headerPro',[]);
    }
    
    //prikaz stranice za izmenu i brisanje
    public function izmeniObrisi(){
        $proizvodModel=new ProizvodModel2();
        $proizvodi=$proizvodModel->dohvatiProizvodeProizvodjaca($this->session->get('korisnik')->IdKor);
        $this->prikaz('izmena_pocetna','headerIzm',['proizvodi'=>$proizvodi]);
    }
    
    //prikaz forme za izmenu proizvoda sa prosledjenim id
    public function izmeni($id){
        $proizvodModel=new ProizvodModel2();
        $proizvodi=$proizvodModel->dohvatiProizvodeProizvodjaca($this->session->get('korisnik')->IdKor);
        $this->prikaz('izmena_brisanje','headerIzm',['proizvodi'=>$proizvodi,'id'=>$id]);
    }
    
    
    //funkcija za izmenu ponude na klik dugmeta izmeni iz forme
    public function izmeniPonudu($id){
       
        $cf=$this->request->getVar('fizi');
        $cp=$this->request->getVar('pr');
        $kol=$this->request->getVar('k');
        
        if(($cf<0&&$cf)||($cp<0&&$cp)||($kol<0&&$kol)){
            $proizvodModel=new ProizvodModel2();
         $proizvodi=$proizvodModel->dohvatiProizvodeProizvodjaca($this->session->get('korisnik')->IdKor);
            $error="Kolicina i cene moraju biti veci od nule";
            return $this->prikaz('izmena_brisanje','headerIzm',['proizvodi'=>$proizvodi,'id'=>$id,'error'=>$error]);
        }
        else{
        $proizvodModel=new ProizvodModel2();
        $pro=$proizvodModel->find($id);
        
        if(!$cf){$cf=$pro->cenaFizicko;}
        if(!$cp){$cp=$pro->cenaPravno;}
        if(!$kol){$kol=$pro->kolicina;}
        $data=[
            'cenaFizicko'=>$cf,
            'cenaPravno'=>$cp,
            'kolicina'=>$kol
        ];
       
        
        $proizvodModel->update($id,$data);
        
       return redirect()->to(site_url("Proizvodjac/izmeniObrisi"));
       
        }
    }
    
    //brisanje ponude sa prosledjenim id na klik dugmeta obrisi ponudu u tabeli ponuda
    public function obrisi($id){
        $korpaModel=new KorpaModel();
        $proizvodModel=new ProizvodModel2();
        $korpaModel->where('IdPro',$id)->delete();
        $proizvodModel->where('IdPro',$id)->delete();
  
        return redirect()->to(site_url("Proizvodjac/izmeniObrisi"));
    }
    
    //dohvatanje svih ponuda korisnika i njihovo prikazivanje 
     public function mojiProizvodi(){
        $proizvodModel=new ProizvodModel2();
        $proizvodi=$proizvodModel->dohvatiProizvodeProizvodjaca($this->session->get('korisnik')->IdKor);
        $this->prikaz('proizvodi','headerPro', ['proizvodi'=>$proizvodi]);
    } 
    
    //otvaranje stranice za dodavanje ponude
    public function dodavanjePonuda(){
        $this->prikaz('dodavanje_ponuda','headerPro' ,[]);
    }
  
   
    //funkcija koja dodaje novu ponudu klikom na dugme dodaj ponudu iz forme
     public function novaPonuda() {
         if(!$this->validate([
          'naziv' =>[
              'label'=>'naziv',
              'rules'=>'required',
              'errors'=>[
                'required'=>'Potrebno je da popunite ovo polje'  
              ]
          ],
            'slika' =>[
              'label'=>'slika',
              'rules'=>'required',
              'errors'=>[
                'required'=>'Potrebno je da popunite ovo polje'  
              ]
          ],
               'opis' =>[
              'label'=>'opis',
              'rules'=>'required',
              'errors'=>[
                'required'=>'Potrebno je da popunite ovo polje'  
              ]
          ],
               'kolicina' =>[
              'label'=>'kolicina',
              'rules'=>'required|is_natural',
              'errors'=>[
                'required'=>'Potrebno je da popunite ovo polje',
                'is_natural'=>'Kolicina mora da bude veca od 0' 
              ]
          ],
               'cenaFizicko' =>[
              'label'=>'cenaFizicko',
              'rules'=>'required|is_natural',
              'errors'=>[
                'required'=>'Potrebno je da popunite ovo polje' ,
                'is_natural'=>'Cena mora da bude veca od 0'  
              ]
          ],
           'cenaPravno' =>[
              'label'=>'cenaPravno',
              'rules'=>'required|is_natural',
              'errors'=>[
                'required'=>'Potrebno je da popunite ovo polje' ,
                'is_natural'=>'Cena mora da bude veca od 0'  
              ]  
     ]])){
         return $this->prikaz('dodavanje_ponuda','headerPro',['errors'=>$this->validator->getErrors()]) ;   
     }
     else{   
 
        $proizvodModel=new ProizvodModel2();
        $proizvodModel->insert([
            'kategorija'=>$this->request->getVar('kategorija'),
            'naziv'=>$this->request->getVar('naziv'),
            'slika'=>$this->request->getVar('slika'),
            'opis'=>$this->request->getVar('opis'),
            'cenaFizicko'=>$this->request->getVar('cenaFizicko'),
            'cenaPravno'=>$this->request->getVar('cenaPravno'),
            'kolicina'=>$this->request->getVar('kolicina'),
            'IdProizv'=>$this->session->get('korisnik')->IdKor
           
        ]);
       return redirect()->to(site_url("Proizvodjac/mojiProizvodi")); 
     } 
    }
    
    //funkcija za odjavljivanje
    public function izlogujSe(){
       $this->session->destroy();
        return redirect()->to("/");
    }
    
}
