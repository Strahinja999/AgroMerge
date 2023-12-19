<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/style.css');?> ">
    <title>AgroMerge</title>
    <link rel = "icon" href ="slike/logo.png" >
</head>
<body id='logovanje'>
    
    <div class="container">
    
        <div class="row ">
      
            <div class="col-sm-3 "></div>
            <div class="col-sm-6 card" id="forma">
                <br>
                <div style="text-align: center;" > 
                 <h1 id="prijava">Prijavljivanje</h1>
                </div>
               
                <br>
            
                <form name="loginForma" action="<?= site_url("$controller/loginSubmit") ?>"  method="post">
                    <div class="mb-3">
                          
                      <label for="exampleInputEmail1" class="form-label">Korisničko ime:</label>
                      <input name="korisnickoIme" type="text" class="form-control" value="<?= set_value('korisnickoIme') ?>" placeholder="Unesite svoje korisničko ime">
                    <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Lozinka:</label>
                      <input name="lozinka" type="password" class="form-control" id="exampleInputPassword1" placeholder="Unesite svoju lozinku">
                    <?php if(isset($poruka1)) echo "<font color='red'>$poruka1</font><br>"; ?>
                    </div>
                    <p class="form-label">Ukoliko još uvek nemate nalog <a class="form-label1" href="<?= site_url("$controller/noviKorisnik") ?>">registrujte se!</a></p>
                   
                    <div class="d-flex justify-content-evenly">
                        <button type="submit" id="dugmePrijava">Prijavi se</button>
                              
                    </div>
                    <?php if(isset($poruka2)) echo "<font color='red'>$poruka2</font><br>"; ?> 
                    <a class="form-label1" href="<?= site_url("$controller/zaboravljenaLozinka") ?>">Zaboravili ste lozinku? </a>  
                  </form>
                  
                  <br>
            </div>
            <div class="col-sm-3"></div>
            
        </div>
    
    </div>
</body>
</html>