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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/stilNavBar.css');?> ">

    <title>AgroMerge</title>
    <link rel = "icon" href ="slike/logo.png" >
    
</head>
<body>
    <nav class="navbar">
        <div class="container ">
            <img id='slika'src="<?php echo base_url('/slike/logo.png');?>" width="80px" height="80px" alt="">
            
            <h1> &nbsp; &nbsp; &nbsp;  AgroMerge</h1>
            
                <ul class="navbar-nav d-flex flex-row" >
                    <li class="nav-item">
                        <a class="nav-link link-light" href="<?php echo site_url("Moderator/index") ?>">Brisanje neprimerenih ponuda</a>
                      </li>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <li class="nav-item">
                        <a class="nav-link link-light active" aria-current="page" href="<?php echo site_url("Moderator/odobravanje") ?>">Lista odobravanja korisnika</a>
                      </li>
                      &nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a class="nav-link link-light" aria-current="page" href="<?=site_url("Potrosac/izlogujSe")?>">Izloguj se</a>
              </li>
                      </ul>
                  
        </div>
      </nav>

</body>
</html>