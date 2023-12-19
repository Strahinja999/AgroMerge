<?php

namespace App\Models;

use CodeIgniter\Model;

class ProizvodModel extends Model
{
    protected $table      = 'proizvod';
    protected $primaryKey = 'IdPro';


    protected $returnType     = 'object';

    protected $allowedFields = ['kategorija', 'naziv', 'slika', 'cenaFizicko','cenaPravno','kolicina' ];

    public function dohvatiProizvode(){
        return $this->findAll();
    }
    
    public function dohvatiProizvodeKategorija($kategorija){
        return $this->where('kategorija',$kategorija)->findAll();
    }
    
    public function dohvatiProizvodeSaID($id){
        return $this->find($id);
    }
    
}