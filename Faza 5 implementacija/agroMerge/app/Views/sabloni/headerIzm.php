<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/stilNavBar.css');?> ">
    <script src="./script.js"></script>

    <title>AgroMerge</title>
    <link rel = "icon" href ="slike/logo.png" >
</head>
<body>
    <nav class="navbar">
        <div class="container ">
           <img id='slika'src="<?php echo base_url('./slike/logo.png');?>" width="80px" height="80px">
            
            <h1> &nbsp; &nbsp; &nbsp;  AgroMerge</h1>
            
                <ul class="navbar-nav d-flex flex-row" >
                    <li class="nav-item">
                      <a class="nav-link link-light" aria-current="page" href="<?=site_url("Proizvodjac/mojiProizvodi")?>">Prikaz ponuda</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link link-light" aria-current="page" href="<?=site_url("Proizvodjac/dodavanjePonuda")?>">Dodavanje ponuda</a>
                      
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link active link-light " aria-current="page" href="<?=site_url("Proizvodjac/izmeniObrisi")?>">Izmeni ponude</a>
                      
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link link-light" aria-current="page" href="<?=site_url("Proizvodjac/izlogujSe")?>">Izloguj se</a>
                      
                    </li>
                    </ul>
            </nav>  
      <div class="container">
          <div class="row">
            <table class="table" id="red">
                <thead>
                  <tr class='form-label'>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Količina</th>
                    <th scope="col">Cena za fizička lica</th>
                    <th scope="col">Cena za pravna lica</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                       <?php
                       
            foreach ($proizvodi as $proizvod){
                echo "
                    <form action='post'>
                    <tr class='form-label'>
                         <th scope='row'>{$proizvod->kategorija}</th>
                             <td>{$proizvod->naziv}</td>
                             <td>{$proizvod->opis}</td>
                             <td>{$proizvod->kolicina}</td>
                             <td >{$proizvod->cenaFizicko}</td>
                             <td >{$proizvod->cenaPravno}</td> 
                             <td><a class='btn btn-sm btn-success' href='".site_url("Proizvodjac/izmeni/{$proizvod->IdPro}")."'>Izmeni ponudu</a></td>
                             <td><a class='btn btn-sm btn-danger' href='".site_url("Proizvodjac/obrisi/{$proizvod->IdPro}")."'>Obrisi ponudu</a></td> 
                             </tr>   
                             </form>" ;
            }
          ?>
           </table>         
          </div>
            
             
        </div>
    </body>
    </html>