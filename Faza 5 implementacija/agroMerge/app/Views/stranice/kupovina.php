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
                  <tr id='tekst'>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Količina</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Ukupna cena</th>
                    <th scope="col">Za plaćanje</th>
                  </tr>
                </thead>
                <?php
                $br = count($kolicine);
                $br1 = count($proizvodi);
                $cenaUk=0;
           
                for($i=0;$i<$br1;$i++){
                    if($tip == 2){
                        $cena1 = $proizvodi[$i]->cenaFizicko;
                    }else if($tip == 3){
                        $cena1 = $proizvodi[$i]->cenaPravno;
                    }
                    $cena = $kolicine[$i]->kolicina*$cena1;
                    echo "<tbody>
                    <tr id='tekst'>
                      <th scope='row'>{$proizvodi[$i]->kategorija}</th>
                      <td>{$proizvodi[$i]->naziv}</td>
                      <td>{$proizvodi[$i]->opis}</td>
                      <td>{$kolicine[$i]->kolicina}</td>
                      <td>{$cena1}</td>
                      <td>{$cena}</td>
                      <td></td>
                    </tr>
                  </tbody>";
                      $cenaUk=$cenaUk+$cena;
                      
                }
                echo "<tbody>
                    <tr id='tekst'>
                      <th scope='row'></th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{$cenaUk}</td>
                    </tr>
                  </tbody>";
             
             /*foreach ($pro as $p){
                 echo var_dump($p);
             }*/
            ?>
              </table>
          </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" id="forma">
                <h3 id='tekst'>Podaci o kartici:</h3>
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Ime i prezime</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Broj kartice</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <label class="form-label" for="">Datum isteka kartice</label>
                    <div class="mb-3 d-flex">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="mesec">
                        &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="godina">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Sigurnosni kod</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" >
                    </div>
                  </form>
                  <div class="d-flex justify-content-evenly">
                      <form action="<?= site_url("Korpa/isprazniKorpu") ?>" method="post">
                          <button id='dugmePrijava'>Završi kupovinu</button>
                      </form>
                      <form action="<?= site_url("Potrosac/prikaziProizvode") ?>" method="post">
                          <button type="submit"  id='dugmePrijava1' >Odustani</button>
                      </form>
                    
                  </div>
                  
            </div>
            <div class="col-sm-3"></div>
        </div>
      </div>
</body>
</html>