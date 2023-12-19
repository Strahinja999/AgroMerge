<?php namespace App\Models;

use CodeIgniter\Model;

class KorpaModel extends Model
{
        protected $table      = 'korpa';
        protected $primaryKey = 'IdKorpa';
        protected $returnType = 'object';
        protected $allowedFields = ['IdPro', 'kolicina','IdKorisnik'];
   
    public function dohvatiProizvodeProizvodjaca($id) {
        return $this->where('IdKorisnik', $id)->findAll();
    }
    public function dohvatiSveIzKorpe(){
        return $this->findAll();
    }
    
    public function dohvatiIDKorpe($id){
        return $this->where('IdPro',$id)->findAll();
        
    }
    public function dohvatiProizvodeSaIDProizvoda($id) {
        return $this->where('IdPro',$id)->findAll();
    }
}
