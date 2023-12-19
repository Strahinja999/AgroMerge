<?php

namespace App\Controllers;

use App\Models\ProizvodModel;

class Potrosac extends BaseController
{
    
    protected function prikaz($page, $data) {
        $data['controller']='Potrosac';
        echo view('headers/potrosac_header');
        echo view("stranice/$page",$data);
    }
    public function index()
    {
        $this->prikaziProizvode();
    }
    
    public function prikaziProizvode() {
        $proizvodModel = new ProizvodModel();
        $proizvodi = $proizvodModel->dohvatiProizvode();
        $this->prikaz('potrosac', ['proizvodi' => $proizvodi,'tip'=>$this->session->get('korisnik')->tipKorisnika]);
    }
    public function filtriraj(){
        $kategorija = $this->request->getVar('kategorija');
        if($kategorija == null) return;
        if($kategorija == 'Sve'){
            return $this->prikaziProizvode();
            
        }
        $proizvodModel = new ProizvodModel();
        $proizvodi = $proizvodModel->dohvatiProizvodeKategorija($kategorija);
        $this->prikaz('potrosac', ['proizvodi' => $proizvodi,'tip'=>$this->session->get('korisnik')->tipKorisnika]);
    }
    
    public function izlogujSe(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
    
    public function dodajUKorpu() {
        
    }
}
