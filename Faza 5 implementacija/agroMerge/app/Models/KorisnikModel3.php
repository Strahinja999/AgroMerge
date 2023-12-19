<?php

namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel3 extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'korisnickoIme';
    protected $returnType = 'object';
    protected $allowedFields = ['korisnickoIme', 'lozinka','tipKorisnika','odobreno']; 
   
    
   public function dohvatiID(){
       return $this->getInsertID();
  }
  

}
