<?php

namespace App\Controllers;
use App\Models\ProizvodjacModel3;
use App\Models\KorisnikModel3;
use App\Models\FizickoLiceModel;
use App\Models\PravnoLiceModel;

class PromenaLozinke extends BaseController
{
    protected function prikaz($page, $data){
        $data['controller']='PromenaLozinke';
         echo view('header/headerLogReg');
         echo view ("stranice/$page", $data);
    }
    
    public function index($poruka=null)
    {
        $this->prikaz('promena_lozinke', ['poruka'=>$poruka]);
    }
    
    public function nadjiKorisnika(){
        $modelK=new KorisnikModel3();
        $ModelPr= new ProizvodjacModel3();
        $modelFL= new FizickoLiceModel();
        $modelPL= new PravnoLiceModel();
        $korisnikP=  $ModelPr->where('email',$this->request->getVar('email'))->find();
        $korisnikFL= $modelFL->where('email',$this->request->getVar('email'))->find();
        $korisnikPL= $modelPL->where('email',$this->request->getVar('email'))->find();
        if($korisnikP){
          return  $korisnik1= $modelK->where('IdKor', $korisnikP[0]->IdKorP)->find();
        }
        if($korisnikFL){
          return  $korisnik1= $modelK->where('IdKor', $korisnikFL[0]->IdKorFL)->find();
        }
        
        if($korisnikPL){
          return  $korisnik1= $modelK->where('IdKor', $korisnikPL[0]->IdKorPL)->find();
        }
    }
    
    public function slanjeMejl() {
        
        if ($this->nadjiKorisnika() == null) {
            return $this->index("Email koji ste uneli ne postoji");
        }

        $email = \Config\Services::email();
    $email1=$this->request->getVar('email');
    $email->setFrom('djordje5699@gmail.com', 'Djordje Arsic');
    $email->setTo($email1);

    $email->setSubject('Email Test');
    $email->setMessage($this->nadjiKorisnika()[0]->lozinka);

        if($email->send()){
            return  $this->index("Lozinka vam je poslata na email");
        }
        else{
           return $this->index("Email koji ste uneli ne postoji");
        }
    }
}