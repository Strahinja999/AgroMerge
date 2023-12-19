<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'IdKor';

    protected $returnType     = 'object';

    protected $allowedFields = ['korisnickoIme','lozinka','tipKorisnika','odobreno'];

}