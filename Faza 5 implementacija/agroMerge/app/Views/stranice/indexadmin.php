<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
    <script src="<?php echo base_url('./js/script.js');?> "></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/proizvodjac.css');?> ">
   

    <title>AgroMerge</title>
    <link rel = "icon" href ="slike/logo.png" >
</head>
<body id='admin'>

      <div class="container">
        <div class="row" >
            <div class="col-sm-3"></div>
            <div class="col-sm-6 card" id='forma'>
                <br>
                <div style="text-align: center;" > 
                    <h1>Dodaj moderatora</h1>
                </div>
                
                <br>
                <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
                <form name="formaAdmin" action="<?= site_url("Admin/dodajMod")?>" method="post" >
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Korisničko ime:</label>
                      <input type="text" class="form-control" name="korIme" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Molimo unesite korisničko ime moderatora">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Lozinka:</label>
                      <input type="password" name="loz" class="form-control" id="exampleInputPassword1" placeholder="Molimo unesite lozinku moderatora">
                    </div>
                    <div class="d-flex justify-content-evenly" >
                    <button type="submit" id="dugmePrijava">Dodaj moderatora</button>
                    
                    </div>
                  </form>
                  <br>
            </div>
            <div class="col-sm-3"></div>
            
        </div>
    </div>
</body>
</html>

