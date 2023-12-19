<?php

namespace App\Models;

use CodeIgniter\Model;

class FizickoModel extends Model
{
    protected $table      = 'fizicko_lice';
    protected $primaryKey = 'IdKorFL';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['korisnickoIme'];



}

