<?php

namespace App\Models;

use CodeIgniter\Model;

class PravnoLiceModel extends Model
{
    protected $table      = 'pravno_lice';
    protected $returnType = 'object';
    protected $allowedFields = ['IdKorPL','nazivFirme', 'pib','telefon', 'email', 'odobreno']; 
   
}

