<?php namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
        protected $table      = 'korisnik';
        protected $primaryKey = 'korisnickoIme';
        protected $returnType = 'object';
	protected $allowedFields = ['korisnickoIme', 'lozinka','tipKorisnika']; 
   
    public function vratiId($korisnickoIme){
        $kor = $this->where('korisnickoIme',$korisnickoIme)->find();
    return $kor[0]->IdKor;
    }
}