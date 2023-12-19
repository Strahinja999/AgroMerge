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
<body id='moderator'>
   
      <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" id='forma2'>
                <br>
                <div style="text-align: center;" > 
                    <h1 >Zahtevi korisnika za registraciju</h1>
                </div>
            </div>
                <br>
                <br>
                <form>
                    
                     <h3 id='forma' class='form-label'> Proizvodjači </h3>
                    <table class="table" id='forma'>
                        <thead>
                          <tr id='tekst'>
                            <th scope="col">Id</th>
                            <th scope="col">Korisničko ime</th>
                    
                            <th scope="col">E-mail</th>
                            <th scope="col">Kontakt telefon</th>
                            <th scope="col">Naziv firme</th>
                           
                            <th colspan="2" scope="col">Zahtev</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            $i=0;
                            if($korisnik4!=null){
                            foreach( $korisnik as $p){
                                echo "<tr id='tekst'>
                            <th scope='row' >{$p->IdKorP}</th>
                            <td>{$korisnik4[$i]->korisnickoIme}</td>
                                
                            <td>{$p->email}</td>
                            <td>{$p->telefon}</td>
                            <td>{$p->nazivFirme}</td>
                            
                            <td><a class='btn btn-sm btn-success' href='".site_url("Moderator/prihvati/{$p->IdKorP}")."'>Prihvati</a>"." </td>
                                 <td><a class='btn btn-sm btn-danger' href='".site_url("Moderator/ukloniK/{$p->IdKorP}")."'>Odbij</a>"." </td>
                          </tr>";
                            $i++;
                            }
                            }
                            ?>
                             
                        </tbody>
                      </table>
                     
                      <h3 id='forma' class='form-label'>Pravna lica </h3>
                     <table class="table" id='forma'>
                        <thead>
                          <tr id='tekst'>
                            <th scope="col">Id</th>
                            <th scope="col">Korisničko ime</th>
                            
                            <th scope="col">E-mail</th>
                            <th scope="col">Kontakt telefon</th>
                            <th scope="col">Naziv firme</th>
                            <th scope="col">PIB</th>
                            <th colspan="2" scope="col">Zahtev</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                         
                             <?php 
                            $i=0;
                            if($korisnik6!=null){
                            foreach( $korisnik2 as $p){
                                echo "<tr id='tekst'>
                            <th scope='row' >{$p->IdKorPL}</th>
                                
                            <td>{$korisnik6[$i]->korisnickoIme}</td>
                            
                            <td>{$p->email}</td>
                            <td>{$p->telefon}</td>
                            <td>{$p->nazivFirme}</td>
                            <td>{$p->pib}</td>
                            <td><a class='btn btn-sm btn-success' href='".site_url("Moderator/prihvati/{$p->IdKorPL}")."'>Prihvati</a>"." </td>
                                 <td><a class='btn btn-sm btn-danger' href='".site_url("Moderator/ukloniK/{$p->IdKorPL}")."'>Odbij</a>"." </td>
                          </tr>";
                             $i++;
                            }
                            }
                           
                            ?>
                             
                        </tbody>
                      </table>
                   
                   
                </form>
            
        </div>
    </div>
</body>
</html>