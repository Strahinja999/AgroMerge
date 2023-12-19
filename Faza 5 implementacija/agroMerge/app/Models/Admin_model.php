<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'korisnickoIme';

    protected $returnType     = 'object';

    protected $allowedFields = ['korisnickoIme','lozinka','tipKorisnika'];

}
