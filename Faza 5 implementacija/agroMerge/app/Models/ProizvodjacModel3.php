<?php

namespace App\Models;

use CodeIgniter\Model;

class ProizvodjacModel3 extends Model
{
    protected $table      = 'proizvodjac';
    protected $returnType = 'object';
    protected $allowedFields = ['IdKorP','nazivFirme','telefon', 'email', 'odobreno']; 
    
     
   
}

