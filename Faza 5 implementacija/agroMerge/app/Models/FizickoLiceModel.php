<?php

namespace App\Models;

use CodeIgniter\Model;

class FizickoLiceModel extends Model
{
    protected $table      = 'fizicko_lice';
    protected $returnType = 'object';
    protected $allowedFields = ['IdKorFL','ime', 'prezime','telefon', 'email']; 
   
}

