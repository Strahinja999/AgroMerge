<?php

namespace App\Controllers;

use App\Models\KorpaModel;
use App\Models\ProizvodModel;

class Korpa extends BaseController
{
    
    protected function prikaz($page, $data) {
        $data['controller']='Korpa';
        echo view('headers/korpa_header');
        echo view("stranice/$page",$data);
    }
    public function index($poruka)
    {
        $this->prikaz('korpa', ['poruka'=>$poruka]);
    }
    
    public function prikaziProizvode($poruka = null){
        $korpaModel = new KorpaModel();
        $sviProizvodiIzKorpe = $korpaModel->dohvatiSveIzKorpe();
        $proizvodi = $korpaModel->dohvatiProizvodeProizvodjaca($this->session->get('korisnik')->IdKor);
        $ProizvodModel = new ProizvodModel();
        $nizProizvoda = array();
        foreach ($proizvodi as $p){
            $nizProizvoda[] = $ProizvodModel->dohvatiProizvodeSaID($p->IdPro);
        }
        $this->prikaz('korpa',['proizvodi'=>$nizProizvoda,'kolicine'=>$proizvodi,'tip'=>$this->session->get('korisnik')->tipKorisnika,'poruka'=>$poruka]);
        
    }
    public function dodajUKorpu($id){
        
        if(!$this->validate(["kolicina{$id}"=>[
            'rules'=> 'required',
            'errors' => [
                'required'=> 'Potrebno je uneti ovo polje'
            ]
        ]])){
            return redirect()->to(site_url("Potrosac/index"));
        }
        else{
             $kolicina = $this->request->getVar("kolicina{$id}");
        //$this->prikaz('korpa',['kolicina'=>$this->request->getVar("kolicina{$id}")]);
        
        $korisnikID = $this->session->get('korisnik')->IdKor;
        $korpaModel = new KorpaModel();
        $proizvodi = $korpaModel->dohvatiProizvodeSaIDProizvoda($id);
        foreach ($proizvodi as $p){
            if($p->IdKorisnik == $this->session->get('korisnik')->IdKor){
                $novaKolicina = $p->kolicina + $kolicina;
                $data=[
                    'kolicina'=>$novaKolicina
                ];
                $korpaModel->where('IdPro',$id)->update ($p->IdKorpa,$data);
                return redirect()->to(site_url("Korpa/prikaziProizvode"));
            }
        }
        $korpaModel->insert([
            'IdPro'=>$id,
            'kolicina'=>$kolicina,
            'IdKorisnik'=>$korisnikID
        ]);
        return redirect()->to(site_url("Korpa/prikaziProizvode"));
        }

        
       
    }
    
    public function ispraznikorpu(){
        $korpaModel = new KorpaModel();
        $proizvodi = $korpaModel->dohvatiProizvodeProizvodjaca($this->session->get('korisnik')->IdKor);
        $proizvodModel = new ProizvodModel();
        $sviProizvodi = $proizvodModel->dohvatiProizvode();
        foreach ($proizvodi as $p){
            if($p->IdKorisnik == $this->session->get('korisnik')->IdKor){
               $trenuntniProizvod = $proizvodModel->dohvatiProizvodeSaID($p->IdPro);
                $novaKolicina = $trenuntniProizvod->kolicina - $p->kolicina;
                if($novaKolicina < 0 ){
                    $proizvod = $proizvodModel->dohvatiProizvodeSaID($p->IdPro);
                    $poruka = "Trenutno nema dovoljno količine proizvoda: "."{$proizvod->naziv}".". Potrebno je ukloniti dati proizvod iz korpe!";
                    return $this->prikaziProizvode($poruka);
                }
                $data =[
                    'kolicina'=>$novaKolicina
                ];
                $proizvodModel->update($p->IdPro,$data); 
                $korpaModel->delete((int)$p->IdKorpa);
            }
            
        }
        return redirect()->to(site_url("Korpa/prikaziProizvode"));
    }
    
    public function nastaviKupovinu(){
        $korpaModel = new KorpaModel();
        $sviProizvodiIzKorpe = $korpaModel->dohvatiSveIzKorpe();
        $proizvodi = $korpaModel->dohvatiProizvodeProizvodjaca($this->session->get('korisnik')->IdKor);
        $ProizvodModel = new ProizvodModel();
        $nizProizvoda = array();
        foreach ($proizvodi as $p){
            $nizProizvoda[] = $ProizvodModel->dohvatiProizvodeSaID($p->IdPro);
        }
        $this->prikaz('kupovina',['proizvodi'=>$nizProizvoda,'kolicine'=>$proizvodi,'tip'=>$this->session->get('korisnik')->tipKorisnika]);
        
    }
    
    public function ukloni($id) {
        $korpaModel = new KorpaModel();
        $proizvod = $korpaModel->dohvatiProizvodeSaIDProizvoda($id);
        $nizPro = array();
        foreach ($proizvod as $p){
            if($p->IdKorisnik == $this->session->get('korisnik')->IdKor){
                $korpaModel->delete((int)$p->IdKorpa);
                return redirect()->to(site_url("Korpa/prikaziProizvode"));
            }
        }
        
    }
    
}
