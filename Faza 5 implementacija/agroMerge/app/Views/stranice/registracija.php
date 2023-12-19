<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php link_tag('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');?>
    <script src="<?= base_url('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js')?>"></script>
    <script src="<?= base_url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('./js/script.js');?> "></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/style.css');?> ">

    <title>AgroMerge</title>
    <link rel = "icon" href ="slike/logo.png" >
</head>
<body onload="inicijalizujPromenljive()" id='registracija'>
    
      <div class="container">
          <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-6 card" id="forma"><br>
                <div style="text-align: center;" > 
                    <h1>Registracija</h1>
                    <br>
                   
                         <form action="<?= site_url("$controller/registrujSe") ?>"  method="post">
                   
                    <h3 class="form-label">Izaberite tip korisnika</h3>
                    <br>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tip1"
                               id="proizvodjacCB" onchange="prikaziProizvodjaca(); " value="1" <?php echo set_checkbox('tip1', '1'); ?> >
                        <label class="form-label" for="flexRadioDefault1">
                          Proizvodjač
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="potrosacCB"
                        onchange="prikaziPotrosaca();">
                        <label class="form-label" for="flexRadioDefault1">
                          Potrošač
                        </label>
                      </div>
                </div>
                <div id="proizvodjac">
                    <br>
                    
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Naziv firme:</label>
                          <input name="nazivFirmeP" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Molimo unesite naziv">
                        <font color='red'>                       
                <?php if(!empty($errors['nazivFirmeP'])) 
                               echo $errors['nazivFirmeP'];
                           ?></font>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Korisničko ime:</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite korisničko ime" name="korisnickoIme1">
                         <font color='red'>
                <?php if(!empty($errors['korisnickoIme1'])) 
                                 echo $errors['korisnickoIme1'];
                           ?></font>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Lozinka:</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite lozinku" name="lozinka1">
                             <font color='red'>                       
                <?php if(!empty($errors['lozinka1'])) 
                               echo $errors['lozinka1'];
                           ?></font>
                        </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Potvrda lozinke</label>
                            <input name="potvrdaLozinkeP" type="password" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite lozinku">
                          <font color='red'>                       
                <?php if(!empty($errors['potvrdaLozinkeP'])) 
                               echo $errors['potvrdaLozinkeP'];
                           ?></font>
                           <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">E-mail:</label>
                            <input name="emailP" type="email" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite E-mail">
                         <font color='red'>                       
                <?php if(!empty($errors['emailP'])) 
                               echo $errors['emailP'];
                           ?></font>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kontakt telefon</label>
                            <input name="telefonP" type="text" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite kontakt telefon">
                        <font color='red'>                       
                <?php if(!empty($errors['telefonP'])) 
                               echo $errors['telefonP'];
                           ?></font>
                          </div>
                        <div class="d-flex justify-content-evenly">
                        <button type="submit"  id="dugmePrijava">Registruj se</button>
                        </div>
                     
                </div>
                <div id="potrosac">
                    <br>
                    <div>
                        <div style="text-align: center;" > 
                            <h3 class="form-label">Izaberite tip potrosaca</h3>
                            <br>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tip2"
                                       id="fizickoLiceCB" onclick="prikaziFizickoLice();" value="2"  <?php echo set_checkbox('tip2', '2'); ?> >
                                <label class="form-label" for="flexRadioDefault1">
                                  Fizičko lice
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="tip3" 
                                       id="pravnoLiceCB" onchange="prikaziPravnoLice();" value="3"  <?php echo set_checkbox('tip3', '3'); ?> >
                                <label class="form-label" for="flexRadioDefault1">
                                  Pravno lice
                                </label>
                              </div>
                        </div>
                    </div>
                    
                    <br>
                    <div id="fizickoLice">
                        
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Ime:</label>
                              <input name="imeFL" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Molimo unesite ime">
                           <font color='red'>                       
                <?php if(!empty($errors['imeFL'])) 
                               echo $errors['imeFL'];
                           ?></font>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Prezime:</label>
                              <input name="prezimeFL" type="text" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite prezime">
                          <font color='red'>                       
                <?php if(!empty($errors['prezimeFL'])) 
                               echo $errors['prezimeFL'];
                           ?></font>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Korisničko ime:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite korisničko ime" name="korisnickoIme2">
                             <font color='red'>                       
                <?php if(!empty($errors['korisnickoIme2'])) 
                               echo $errors['korisnickoIme2'];
                           ?></font>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Lozinka:</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite lozinku" name="lozinka2">
                              <font color='red'>                       
                <?php if(!empty($errors['lozinka2'])) 
                               echo $errors['lozinka2'];
                           ?></font>
                            </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Potvrda lozinke:</label>
                                <input name="potvrdaLozinkaFL" type="password" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite lozinku">
                             <font color='red'>                       
                <?php if(!empty($errors['potvrdaLozinkaFL'])) 
                               echo $errors['potvrdaLozinkaFL'];
                           ?></font>
                              <?php if(isset($poruka1)) echo "<font color='red'>$poruka1</font><br>"; ?>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">E-mail:</label>
                                <input name="emailFL" type="email" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite E-mail">
                             <font color='red'>                       
                <?php if(!empty($errors['emailFL'])) 
                               echo $errors['emailFL'];
                           ?></font>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kontakt telefon:</label>
                                <input name='telefonFL' type="twxt" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite kontakt telefon">
                              <font color='red'>                       
                <?php if(!empty($errors['telefonFL'])) 
                               echo $errors['telefonFL'];
                           ?></font>
                              </div>
                      
                            <div class="d-flex justify-content-evenly">
                            
                                <button type="submit"   id="dugmePrijava" >Registruj se</button>
                             
                            </div>
                         
                    </div>
                    <div id="pravnoLice">
                 
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Naziv firme:</label>
                              <input name="nazivFirmePL" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Molimo unesite naziv firme">
                            <font color='red'>                       
                <?php if(!empty($errors['nazivFirmePL'])) 
                               echo $errors['nazivFirmePL'];
                           ?></font>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">PIB:</label>
                              <input name="pibPL" type="text" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite PIB">
                           <font color='red'>                       
                <?php if(!empty($errors['pibPL'])) 
                               echo $errors['pibPL'];
                           ?></font>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Korisničko ime:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite korisničko ime" name="korisnickoIme3">
                             <font color='red'>                       
                <?php if(!empty($errors['korisnickoIme3'])) 
                               echo $errors['korisnickoIme3'];
                           ?></font> 
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Lozinka:</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite lozinku" name="lozinka3">
                             <font color='red'>                       
                <?php if(!empty($errors['lozinka3'])) 
                               echo $errors['lozinka3'];
                           ?></font>
                            </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Potvrda lozinke:</label>
                                <input name="potvrdaLozinkePL" type="password" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite lozinku">
                                <font color='red'>                       
                <?php if(!empty($errors['potvrdaLozinkePL'])) 
                               echo $errors['potvrdaLozinkePL'];
                           ?></font>
                              </div>
                           <?php if(isset($poruka2)) echo "<font color='red'>$poruka2</font><br>"; ?>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">E-mail:</label>
                                <input name='emailPL' type="email" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite E-mail">
                             <font color='red'>                       
                <?php if(!empty($errors['emailPL'])) 
                               echo $errors['emailPL'];
                           ?></font>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kontakt telefon:</label>
                                <input name="telefonPL" type="text" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite kontakt telefon">
                              <font color='red'>                       
                <?php if(!empty($errors['telefonPL'])) 
                               echo $errors['telefonPL'];
                           ?></font>
                              </div>
                            <div class="d-flex justify-content-evenly">
                            <button type="submit" id="dugmePrijava">Registruj se</button>
                            </div>
                          
                    </div>
                    
                </div>
              </form>
              </div>
              <div class="col-sm-3"></div>
          </div>
      </div>
</body>
</html>