<?php

namespace App\Controllers;
use App\Models\KorisnikModel3;

class Logovanje extends BaseController
{
    protected function prikaz($page, $data){
        $data['controller']='Logovanje';
         echo view('header/headerLogReg');
         echo view ("stranice/$page", $data);
    }
    
    public function index($poruka=null, $poruka1=null, $poruka2=null)
    {
        $this->prikaz('index', ['poruka'=>$poruka,'poruka1'=> $poruka1, 'poruka2'=>$poruka2]);
    }
    
    public function loginSubmit(){
        
        $korisnikModel=new KorisnikModel3();
        $korisnik=$korisnikModel->find($this->request->getVar("korisnickoIme"));
     
        if ($korisnik == null) {
          return  $this->index("Korisnicko ime ne postoji.", null, null);
       }
       
        if ($korisnik->lozinka != $this->request->getVar("lozinka")) {
           return $this->index(null, "Lozinka nije dobra.", null);
       }
       
       if($korisnik->odobreno==0){
            return  $this->index(null, null, "Moderator vas jos nije odobrio.");
       }
       
       $this->session->set('korisnik', $korisnik);
       switch ($korisnik->tipKorisnika){
            case 1: return redirect()->to(site_url('Proizvodjac'));
            case 2: return redirect()->to(site_url('Potrosac'));
            case 3: return redirect()->to(site_url('Potrosac'));
            case 4: return redirect()->to(site_url('Moderator'));
            case 5: return redirect()->to(site_url('Admin'));
        }
    }
    
    public function noviKorisnik(){
        return redirect()->to(site_url('Registracija'));
    }
    
     public function zaboravljenaLozinka(){
        return redirect()->to(site_url('PromenaLozinke'));
    }
}

