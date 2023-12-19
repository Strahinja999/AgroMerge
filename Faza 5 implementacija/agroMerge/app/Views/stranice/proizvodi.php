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
    

    <title>AgroMerge</title>
    <link rel = "icon" href ="slike/logo.png" >
    
</head>
<body id='prikazProizvoda'>
      <br>
      <div class="container">
          
            <div class="row row-cols-1 row-cols-md-3 g-4">
               <?php
            foreach ($proizvodi as $proizvod){
                echo " <div class='col ponuda' >
                         <div class='card'id='forma'>
                           <img src='{$proizvod->slika}' class='card-img-top' alt='...' width='100px' height='300px'>
                             <div class='card-body' id='tekst'>
                              <h5 class='card-title'>{$proizvod->kategorija}-{$proizvod->naziv}</h5>
                                <div>
                                  <p>Količina:{$proizvod->kolicina}</p>
                                  <p>Fizička lica:{$proizvod->cenaFizicko}</p>
                                  <p>Pravna lica:{$proizvod->cenaPravno}</p>
                              </div>
                          </div>
                          </div>

                </div> " ;
            }
          ?>
        </div>
         </div>   
</body>
</html>