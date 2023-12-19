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
<body id='prikazProizvoda'>

      <div class="container">
          <div class="row">
              <div class="col-sm-3">

              </div>
              <div class="col-sm-6 card" id="forma"><br>
                <div style="text-align: center;" > 
                    <h1>Dodavanje nove ponude</h1>
                    <br>
                </div>
                <div>
                    <br>
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategorija proizvoda:
                            </label><br>
                            <select class="form-select" name="kategorija">
                                <option value="Voće">Voće</option>
                                <option value="Povrće">Povrće</option>
                                <option value="Mesne prerađevine">Mesne prerađevine</option>
                                <option value="Mlečni proizvodi">Mlečni proizvodi</option>
                                <option value="Ostalo">Ostalo</option>
                            </select>
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Naziv proizvoda:</label>
                          <input type="text" class="form-control" name="naziv" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Molimo unesite naziv proizvoda">
                    <font color='red'>
                      <?php  if(!empty($errors['naziv']))
                          echo $errors['naziv'];
                              ?>
                    </font>
                          
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Slika:</label><br>
                            <input type="txt" class="form-control" placeholder="Unesite url slike"  name="slika" accept="image/png, image/jpeg">
                          <font color='red'>
                      <?php  if(!empty($errors['slika']))
                          echo $errors['slika'];
                              ?>
                    </font>  
                          
                            
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Opis proizvoda:</label>
                          <textarea class="form-control"  name="opis" placeholder="Unesite opis proizvoda"></textarea>
                          <font color='red'>
                      <?php  if(!empty($errors['opis']))
                          echo $errors['opis'];
                              ?>
                    </font>
                          
              </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Količina mesečne proizvodnje:</label>
                            <input type="number" class="form-control"  name="kolicina" id="exampleInputPassword1" placeholder="Unesite količinu u kilogramima">
                            <font color='red'>
                      <?php  if(!empty($errors['kolicina']))
                          echo $errors['kolicina'];
                              ?>
                    </font>
                           
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Cena po kilogramu-fizička lica:</label>
                            <input type="number" class="form-control"  name="cenaFizicko" id="exampleInputPassword1" placeholder="Unesite cenu u RSD">
                    
                            <font color='red'>
                      <?php  if(!empty($errors['cenaFizicko']))
                          echo $errors['cenaFizicko'];
                              ?>
                    </font>
                            
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Cena po kilogramu-pravna lica:</label>
                            <input type="number" class="form-control"  name="cenaPravno" id="exampleInputPassword1" placeholder="Unesite cenu u RSD">
                         <font color='red'>
                      <?php  if(!empty($errors['cenaPravno']))
                          echo $errors['cenaPravno'];
                              ?>
                    </font>
                        
                          </div>
                          <div class="d-flex justify-content-evenly">
                           
                            <input type="submit" value="Dodaj ponudu"id="dugmePrijava" formaction="<?= site_url('Proizvodjac/novaPonuda') ?>">
                            <input type="submit" value="Odustani" id="dugmePrijava1" formaction="<?= site_url('Proizvodjac/mojiProizvodi') ?>">
                     
         
                            
                            </div>
                      </form>
                </div>
              </div>
              <div class="col-sm-3">

              </div>
          </div>
      </div>
</body>
</html>