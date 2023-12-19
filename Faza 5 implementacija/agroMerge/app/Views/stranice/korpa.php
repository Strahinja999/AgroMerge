<!DOCTYPE html>
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
    <link rel = "icon" href ="slike/logo.png" >
</head>
<body>
    
      <div class="container">
          <div class="row">
            <table class="table" id='forma'>
                <thead>
                  <tr  id='tekst'>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Količina</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Ukupna cena</th>
                    <th scope="col">Ukloni</th>
                  </tr>
                </thead>
               
                <?php
                $br = count($kolicine);
                $br1 = count($proizvodi);
           
                for($i=0;$i<$br1;$i++){
                    if($tip == 2){
                        $cena1 = $proizvodi[$i]->cenaFizicko;
                    }else if($tip == 3){
                        $cena1 = $proizvodi[$i]->cenaPravno;
                    }
                    $cena = $kolicine[$i]->kolicina*$cena1;
                    echo "<tbody>
                    <tr  id='tekst'>
                      <th scope='row'>{$proizvodi[$i]->kategorija}</th>
                      <td>{$proizvodi[$i]->naziv}</td>
                      <td>{$proizvodi[$i]->opis}</td>
                      <td>{$kolicine[$i]->kolicina}</td>
                      <td>{$cena1}</td>
                      <td>{$cena}</td>
                      <td>
                      <form action='".site_url("Korpa/ukloni/{$proizvodi[$i]->IdPro}")."' method='post'>
                        <button class='btn btn-secondary'>Ukloni</button>
                       </form>
                        </td>
                    </tr>
                  </tbody>";
                }
             
             /*foreach ($pro as $p){
                 echo var_dump($p);
             }*/
              ?>
           
              </table>
              
              
          </div>
          <?php if(isset($poruka)) echo "<font color='red'><b>$poruka</b></font><br>"; ?>
          <div class="row">
            <div class="d-flex justify-content-evenly">
                <form action="<?= site_url("korpa/nastaviKupovinu") ?>" method="post">
                    <button type="submit" id="dugmePrijava">Nastavi na kupovinu</button>
                </form>
                <form action="<?= site_url("Potrosac/prikaziProizvode") ?>" method="post">
                    <button type="submit" id="dugmePrijava2">Odustani</button>
                </form>
                <form action="<?= site_url("Korpa/isprazniKorpu") ?>" method="post">
                    <button type="submit" id="dugmePrijava1">Isprazni korpu</button>
                </form>
             
            </div>
        </div>
      </div>
</body>
</html>