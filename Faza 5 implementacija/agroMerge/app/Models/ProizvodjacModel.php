<?php

namespace App\Models;

use CodeIgniter\Model;

class ProizvodjacModel extends Model
{
    protected $table      = 'proizvodjac';
    protected $primaryKey = 'IdKorP';

    protected $returnType     = 'object';

    protected $allowedFields = ['odobreno'];
    


}



