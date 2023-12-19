
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/proizvodjac.css');?> ">
    <script src="./script.js"></script>

    <title>AgroMerge</title>
    <link rel = "icon" href ="../slike/logo.png" >
    
</head>
<body id='potrosac'>
          <div class="container">
              <form  id="forma" name="filtrirajForma" action="<?= site_url("Potrosac/filtriraj") ?>" method="post">
          <div class="row d-flex justify-content-evenly">
              <div class="col-sm-1"></div>
              <div class="col-sm-4">
                  <h4 class='form-label'>Filtriraj po kategoriji:</h4>
                  <br>
                </div>
              <br>
                  <div class="col-sm-3">
                      <select class="form-select form-select-lg" name="kategorija">
                    <option value="Voće">Voće</option>
                    <option value="Povrće">Povrće</option>
                    <option value="Žitarice">Žitarice</option>
                    <option value="Mesne prerađevine">Mesne prerađevine</option>
                    <option value="Mlečni proizvodi">Mlečni proizvodi</option>
                    <option value ="Sve">Svi proizvodi</option>
                </select>
                <br>
              </div>
              <div class="col-sm-3">
                <button class="btn btn-success btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                  </svg>Filtriraj</button>
               </div>
              <div class="col-sm-1"></div>
          </div> 
 
                  </form>
              <div class='row row-cols-1 row-cols-md-3 g-4' >
                    
          <?php
            foreach ($proizvodi as $proizvod){
                
                if($tip == 2){
                        $cena1 = $proizvod->cenaFizicko;
                    }else if($tip == 3){
                        $cena1 = $proizvod->cenaPravno;
                    }
                echo"
                 <div class='col ponuda' >
                         <div class='card' id='forma'>
                             <img src='{$proizvod->slika}' class='card-img-top' alt='...' width='100px' height='300px'>
                             <div class='card-body' >
                              <h5 class='card-title' id='tekst'>{$proizvod->kategorija}-{$proizvod->naziv}</h5>
                                <div>
                                  <p id='tekst'>Količina:{$proizvod->kolicina}</p>
                                  <p id='tekst'>Cena: {$cena1} DIN</p>
                              </div>
                              <div>
                              <form action='".site_url("Korpa/dodajUKorpu/{$proizvod->IdPro}")."' method='post'>
                                <label id='tekst'>Količina:</label>
                                <input name='kolicina{$proizvod->IdPro}' type='text' placeholder='Unesite količinu'>
                                <br>
                                <br>
                                <button class='btn btn-sm btn-primary'>Dodaj u korpu</button>
                               </form>
                            </div>
                            </div>
                          </div>
                        
                </div>";
            }
            ?>
        </div>   
          </div>
          
         
          
            
</body>
</html>