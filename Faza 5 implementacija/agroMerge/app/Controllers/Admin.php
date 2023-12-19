<?php

namespace App\Controllers;
use App\Models\Admin_model;
use App\Models\FizickoModel;
use App\Models\PravnoModel;
use App\Models\ProizvodjacModel;
use App\Models\AdminModel;
use App\Models\KorpaModel1;
use App\Models\ProizvodModel1;

class Admin extends BaseController
{
    protected function prikaz($page,$poruka){
        echo view ("heder/admin_heder");
        echo view ("stranice/$page", $poruka);
    }

    public function izlogujSe(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }

    public function index($poruka=null)
    {
        $this->prikaz("indexadmin", ['poruka'=>$poruka]);
    }
    
    public function dodajMod() {
        if(!$this->validate(['korIme'=> 'required','loz'=> 'required'])){
            return $this->index("Unesite sve parametre" );
        }
        $admmod= new Admin_model();
        $adm=null;
        $adm= $admmod->find($this->request->getVar('korIme'));
        if($adm== null){
              $admmod->insert([
                 'korisnickoIme'=>$this->request->getVar('korIme'),
                 'lozinka'=>$this->request->getVar('loz'),
                 'tipKorisnika'=>4
             ]);
             return $this->index("Uspesno ste uneli moderatora!");
         
        }
        
          return $this->index("Korisnicko ime je zauzeto");    
          
    }
    
    public function ukloni($id){
        $proiz = new ProizvodModel1;
        $p= $proiz->where('IdProizv',$id)->findAll();
        
        foreach($p as $pro){
        $k= new KorpaModel1();
        $k->where('IdPro',$pro->IdPro)->delete();
            
        }
        $k= new KorpaModel1();
        $k->delete($id);
        $proiz->delete($id);
        
         $p= new ProizvodjacModel();
         $fl= new FizickoModel();
         $pr= new PravnoModel();
         $p->delete($id);
         $fl->delete($id);
         $pr->delete($id);
         $korisnik = new AdminModel();
        $korisnik->delete($id);
        
        
        return redirect()->back()->withInput();
        
    }
    
    public function uklanjanje(){
        $mod=4;
         $p= new ProizvodjacModel();
         $fl= new FizickoModel();
         $pr= new PravnoModel();
         $adm= new AdminModel();
         $korisnik = $p->where('odobreno', 1)->orderBy('IdKorP','asc')->findAll();
      
         $korisnik1 = $fl->orderBy('IdKorFL','asc')->findAll();
         $korisnik2 = $pr->where('odobreno', 1)->orderBy('IdKorPL','asc')->findAll();
         $korisnik3 = $adm->where('tipKorisnika', $mod)->orderBy('IdKor','asc')->findAll();
         $korisnik4 = $adm->where('odobreno', 1)->where('tipKorisnika', 1)->orderBy('IdKor','asc')->findAll();
         $korisnik5 = $adm->where('tipKorisnika', 2)->orderBy('IdKor','asc')->findAll();
         $korisnik6 = $adm->where('odobreno', 1)->where('tipKorisnika', 3)->orderBy('IdKor','asc')->findAll();
         
          
        
         
        return $this->prikaz("uklanjanjekorisnika", ['korisnik'=>$korisnik,'korisnik1'=>$korisnik1,'korisnik2'=>$korisnik2,'korisnik3'=>$korisnik3, 'korisnik4'=>$korisnik4,'korisnik5'=>$korisnik5,'korisnik6'=>$korisnik6]);
    }
}
