<?php

namespace App\Controllers;

use App\Models\ProizvodModel1;
use App\Models\KorpaModel1;
use App\Models\AdminModel;
use App\Models\ProizvodjacModel;
use App\Models\PravnoModel;

class Moderator extends BaseController
{
    protected function prikaz($page,$poruka){
        echo view ("heder/moderator_heder");
        echo view ("stranice/$page", $poruka);
    }

    public function izlogujSe(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }

    
    public function index($poruka=null)
    {
        $ponude= new ProizvodModel1;
        $proizvodi= $ponude->findAll();
        $this->prikaz("uklanjanjeponuda", ['proizvodi'=>$proizvodi]);
    }
    
      public function ukloni($id)
    {
        $k= new KorpaModel1();
        $k->where('IdPro', $id)->delete();
        $proiz = new ProizvodModel1;
        $proiz->where('IdPro', $id)->delete();
        
        return redirect()->back()->withInput();
    }
    
    public function odobravanje($poruka=null)
    {   
      
       
         $p= new ProizvodjacModel();
         $pr= new PravnoModel();
         $adm= new AdminModel();
         $korisnik = $p->where('odobreno', 0)->orderBy('IdKorP','asc')->findAll();
      
         $korisnik2 = $pr->where('odobreno', 0)->orderBy('IdKorPL','asc')->findAll();
         $korisnik4 = $adm->where('odobreno', 0)->where('tipKorisnika', 1)->orderBy('IdKor','asc')->findAll();     
         $korisnik6 = $adm->where('odobreno', 0)->where('tipKorisnika', 3)->orderBy('IdKor','asc')->findAll();
         
          
        
         
        return $this->prikaz("odobravanjekorisnika", ['korisnik'=>$korisnik,'korisnik2'=>$korisnik2, 'korisnik4'=>$korisnik4,'korisnik6'=>$korisnik6]);
    }
    
    public function ukloniK($id){
         $p= new ProizvodjacModel();
         $pr= new PravnoModel();
         $adm= new AdminModel();
         
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
         $p->delete($id);
         $pr->delete($id);
         $adm->delete($id);
        
         return redirect()->back()->withInput();
         
         
    }
    public function prihvati($id){
        
       $data=[
         'odobreno'=>1,  
       ];
       $p= new ProizvodjacModel();
       $pr= new PravnoModel();
       $adm= new AdminModel(); 
       $adm->update($id,$data);
       $p->update($id,$data);
       $pr->update($id,$data);
       
       return redirect()->back()->withInput();
        
    }
}
