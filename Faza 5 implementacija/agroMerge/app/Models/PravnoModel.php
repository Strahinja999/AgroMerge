<?php

namespace App\Models;

use CodeIgniter\Model;

class PravnoModel extends Model
{
    protected $table      = 'pravno_lice';
    protected $primaryKey = 'IdKorPL';

    protected $returnType     = 'object';

    protected $allowedFields = ['odobreno'];
    


}

