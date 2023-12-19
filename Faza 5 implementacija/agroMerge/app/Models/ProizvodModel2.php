<?php namespace App\Models;

use CodeIgniter\Model;

class ProizvodModel2 extends Model
{
        protected $table      = 'proizvod';
        protected $primaryKey = 'IdPro';
        protected $returnType = 'object';
        protected $allowedFields = ['kategorija', 'naziv', 'slika',
        'opis','cenaFizicko','cenaPravno','kolicina','IdProizv'];
        
        public function dohvatiProizvodeProizvodjaca($id) {
            return $this->where('IdProizv', $id)->findAll();      
        }
    
}