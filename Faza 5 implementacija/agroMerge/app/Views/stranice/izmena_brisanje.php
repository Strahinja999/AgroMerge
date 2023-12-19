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
          <form action='<?=site_url("Proizvodjac/izmeniPonudu/{$id}")?>' method='post'>
           <div class="row">
               <div class="col-sm-3"></div>
               <div class="col-sm-6"  id="forma">
                <div class="mb-3">
                                    
                    <font color='red'>
                      <?php  if(!empty($error))
                          echo $error;
                              ?>
                    </font>
                    
                    <br>
                    <label for="exampleInputPassword1" class="form-label">Količina mesečne proizvodnje:</label>
                    <input type="number" class="form-control" name="k" id="exampleInputPassword1" placeholder="Molimo unesite količinu u kilogramima">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cena po kilogramu-fizička lica:</label>
                    <input type="number" class="form-control" name="fizi" id="exampleInputPassword1" placeholder="Molimo unesite cenu u RSD">
                   
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cena po kilogramu-pravna lica:</label>
                    <input type="number" class="form-control" name="pr" id="exampleInputPassword1" placeholder="Molimo unesite cenu u RSD">
       
                  </div>
                   
                  <div class='d-flex justify-content-evenly'>
                  
                        <input type='submit' value='Izmeni' id="dugmePrijava">
                    
                    
                       <a id="dugmePrijava1" href='<?=site_url("Proizvodjac/izmeniObrisi")?>'>Odustani</a>
                    
                    </div>;
                       
               </div>
               <div class="col-sm-3"></div>
           </div>
              </form>
      </div>
</body>
</html>