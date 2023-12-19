<?php namespace App\Controllers;
use App\Models\KorisnikModel3;
use App\Models\ProizvodjacModel3;
use App\Models\PravnoLiceModel;
use App\Models\FizickoLiceModel;


class Registracija extends BaseController
{
    protected function prikaz($page, $data){
        $data['controller']='Registracija';
         echo view('header/headerLogReg');
         echo view ("stranice/$page", $data);
    }
    
    public function index($poruka=null, $poruka1=null,$poruka2=null)
    {
        $this->prikaz('registracija', ['poruka'=>$poruka,'poruka1'=> $poruka1,
            'poruka2'=>$poruka2,]);
    }
    
     public function registracija($poruka=null)
    {
       $this->prikaz('registracija',['poruka'=>$poruka]);
    }
   
    public  function  dodajProizvodjaca(){
        
          $korisnikModel=new KorisnikModel3();
          $proizvodjacModel = new ProizvodjacModel3();
          
          $korisnikModel->insert([
            "korisnickoIme" =>$this->request->getVar("korisnickoIme1"),
            "lozinka" =>$this->request->getVar("lozinka1"),
            "tipKorisnika"=> 1,     
             "odobreno"=> 0
        ]);
        
        $proizvodjacModel->insert([
            'IdKorP'=> $korisnikModel->dohvatiID(),
            'nazivFirme'=> $this->request->getVar('nazivFirmeP'),
            'telefon'=> $this->request->getVar('telefonP'),
            'email'=> $this->request->getVar('emailP'),
            'odobreno'=>0
        ]);
         return redirect()->to(site_url("index.php"));
    }
    
    public function dodajFL(){
        $korisnikModel=new KorisnikModel3();
        $fizickoLiceModel = new FizickoLiceModel();
        $korisnikModel->insert([
            "korisnickoIme" =>$this->request->getVar("korisnickoIme2"),
            "lozinka" =>$this->request->getVar("lozinka2"),
            "tipKorisnika"=> 2
        ]);
    
        $fizickoLiceModel->insert([
            'IdKorFL'=> $korisnikModel->dohvatiID(),
            'ime'=> $this->request->getVar('imeFL'),
            'prezime'=> $this->request->getVar('prezimeFL'),
            'telefon'=> $this->request->getVar('telefonFL'),
            'email'=> $this->request->getVar('emailFL')
        ]);
         return redirect()->to(site_url("index.php"));
    }
    
    public function dodajPL(){
        $korisnikModel=new KorisnikModel3();
        $pravnoLiceModel = new PravnoLiceModel();
        $korisnikModel->insert([
            "korisnickoIme" =>$this->request->getVar('korisnickoIme3'),
            "lozinka" =>$this->request->getVar('lozinka3'),
            "tipKorisnika"=> 3,
            'odobreno'=>0
        ]);
            
        $pravnoLiceModel->insert([
            'IdKorPL'=> $korisnikModel->dohvatiID(),
            'nazivFirme'=> $this->request->getVar('nazivFirmePL'),
            'pib'=> $this->request->getVar('pibPL'),
            'telefon'=> $this->request->getVar('telefonPL'),
            'email'=> $this->request->getVar('emailPL'),
            'odobreno'=>0
        ]); 
         return redirect()->to(site_url("index.php"));
    }
    
    public function registrujSe(){
      if(isset($_POST['tip1'])){
            if (!$this->validate([
               'korisnickoIme1' => [
            'label'  => 'korisnickoIme',
            'rules'  => 'required|is_unique[korisnik.korisnickoIme]',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje',
                'is_unique' => 'Korisnik sa tim imenom vec postoji'
            ]
                ], 
                 'lozinka1' => [
            'label'  => 'lozinka',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],
                 'nazivFirmeP' => [
            'label'  => 'nazivFirmeP',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],
                'emailP'  => [
            'label'  => 'emailP',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],
                'telefonP' => [
            'label'  => 'telefonP',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],
                'potvrdaLozinkeP' => [
            'label'  => 'potvrdaLozinkeP',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ]])) {
                return $this->prikaz('registracija',
                                ['errors' => $this->validator->getErrors()]);
            }
            if ($this->request->getVar('lozinka1')!=$this->request->getVar('potvrdaLozinkeP')) {
                return $this->index("Lozinke se ne poklapaju.", null, null);
            }
            else {
                return $this->dodajProizvodjaca();
            }
     }else if (isset($_POST['tip2'])){
            if (!$this->validate([
                'korisnickoIme2' => [
            'label'  => 'korisnickoIme',
            'rules'  => 'required|is_unique[korisnik.korisnickoIme]',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje',
                'is_unique' => 'Korisnik sa tim imenom vec postoji'
            ]
                ],
                'lozinka2' => [
            'label'  => 'lozinka',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],
                'imeFL' => [
            'label'  => 'imeFL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],
                'prezimeFL' => [
            'label'  => 'prezimeFL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],
                'emailFL' => [
            'label'  => 'emailFL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ], 
                'telefonFL'=> [
            'label'  => 'telefonFL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ], 
                'potvrdaLozinkaFL'=> [
            'label'  => 'potvrdaLozinkaFL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]]])) {
                return $this->prikaz('registracija',
                                ['errors' => $this->validator->getErrors()]);
            }
            
            if ($this->request->getVar('lozinka2')!=$this->request->getVar('potvrdaLozinkeFL')) {
                return $this->index(null,"Lozinke se ne poklapaju.", null);
            }
            else {
            return  $this->dodajFL();}
            
     }else if(isset($_POST['tip3'])){
            if (!$this->validate([
                'korisnickoIme3' => [
            'label'  => 'korisnickoIme',
            'rules'  => 'required|is_unique[korisnik.korisnickoIme]',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje',
                'is_unique' => 'Korisnik sa tim imenom vec postoji'
            ]
                ],
                'lozinka3' => [
            'label'  => 'lozinka',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ], 
                'nazivFirmePL'  => [
            'label'  => 'nazivFirmePL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ], 
                'pibPL' => [
            'label'  => 'pibPL',
            'rules'  => 'required|is_unique[pravno_lice.pib]',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje',
                'is_unique' => 'Taj pib postoji'
            ]
                ], 
                'emailPL' => [
            'label'  => 'emailPL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ],  
                'telefonPL' => [
            'label'  => 'telefonPL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ], 
                'potvrdaLozinkePL' => [
            'label'  => 'potvrdaLozinkePL',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Potrebno je da popunite ovo polje'
            ]
                ]]))
                              {
                return $this->prikaz('registracija',
                                ['errors' => $this->validator->getErrors()]);
            } 
            
            if ($this->request->getVar('lozinka3')!=$this->request->getVar('potvrdaLozinkePL')) {
                return $this->index(null, null,"Lozinke se ne poklapaju.");
            }
            else {
            return $this->dodajPL();}
        }
     
    }  
}

