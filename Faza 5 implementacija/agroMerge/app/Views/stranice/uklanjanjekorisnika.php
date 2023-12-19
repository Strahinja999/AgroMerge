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
    <skript src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></skript>
    <skript src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js "> </skript>>
"

    <script src="<?php echo base_url('./js/script.js');?> "></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/proizvodjac.css');?> ">

    <title>AgroMerge</title>
    <link rel = "icon" href ="slike/logo.png" >
</head>
<body id='admin'>

      <div class="container"   >
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" id='forma2'>
                <br>
                <div style="text-align: center;" > 
                    <h1>Uklanjanje korisnika</h1>
                </div>
            </div>
                <br>
                <br>
                <form>
                   
                    <h3 id='forma' class='form-label'>Proizvodjači </h3>
                    <table class="table" id='forma'>
                        <thead>
                          <tr id='tekst'>
                            <th scope="col">Id</th>
                            <th scope="col">Korisničko ime</th>
                    
                            <th scope="col">E-mail</th>
                            <th scope="col">Kontakt telefon</th>
                            <th scope="col">Naziv firme</th>
                           
                            <th scope="col">Zahtev</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            $i=0;
                            foreach( $korisnik as $p){
                                echo "<tr id='tekst'>
                            <th scope='row' >{$p->IdKorP}</th>
                            <td>{$korisnik4[$i]->korisnickoIme}</td>
                                
                            <td>{$p->email}</td>
                            <td>{$p->telefon}</td>
                            <td>{$p->nazivFirme}</td>
                            
                            <td><a class='btn btn-sm btn-primary' href='".site_url("Admin/ukloni/{$p->IdKorP}")."'>Ukloni</a>"." </td>
                          </tr>";
                            $i++;
                            }
                            ?>
                             
                    
                         
                          
                        </tbody>
                      </table>
                    <h3 id='forma' class='form-label'>Fizicka lica </h3>
                     <table class="table" id='forma'>
                        <thead>
                          <tr id='tekst'>
                            <th scope="col">Id</th>
                            <th scope="col">Korisničko ime</th>
                            
                            <th scope="col">E-mail</th>
                            <th scope="col">Kontakt telefon</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Zahtev</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                         
                             <?php 
                            $i=0;
                            foreach( $korisnik1 as $p){
                                echo "<tr id='tekst' >
                            <th scope='row' >{$p->IdKorFL}</th>
                            <td>{$korisnik5[$i]->korisnickoIme}</td>
                            
                            <td>{$p->email}</td>
                            <td>{$p->telefon}</td>
                            <td>{$p->ime}</td>
                            <td>{$p->prezime}</td>
                            <td><a class='btn btn-sm btn-primary' href='".site_url("Admin/ukloni/{$p->IdKorFL}")."'>Ukloni</a>"." </td>
                          </tr>";
                            $i++;
                            }
                            
                            ?>
                             
                          
                        </tbody>
                      </table>
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
                            <th scope="col">Zahtev</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                         
                             <?php 
                            $i=0;
                            foreach( $korisnik2 as $p){
                                echo "<tr  id='tekst'>
                            <th scope='row' >{$p->IdKorPL}</th>
                                
                            <td>{$korisnik6[$i]->korisnickoIme}</td>
                            
                            <td>{$p->email}</td>
                            <td>{$p->telefon}</td>
                            <td>{$p->nazivFirme}</td>
                            <td>{$p->pib}</td>
                            <td> <a class='btn btn-sm btn-primary' href='".site_url("Admin/ukloni/{$p->IdKorPL}")."'>Ukloni</a>"." 
                            </td>
                          </tr>";
                             $i++;
                            }
                           
                            ?>
                             
                          
                        </tbody>
                      </table>
                     <h3 id='forma' class='form-label'>Moderatori </h3>
                     <table class="table" id='forma'>
                        <thead>
                          <tr id='tekst'>
                            <th scope="col">Id</th>
                            <th scope="col">Korisničko ime</th>
                            <th scope="col">Zahtev</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                         
                             <?php 
                            
                            foreach( $korisnik3 as $p){
                                echo "<tr  id='tekst'>
                            <th scope='row' >{$p->IdKor}</th>
                            <td>{$p->korisnickoIme}</td>
                            
                            
                            <td><a class='btn btn-sm btn-primary' href='".site_url("Admin/ukloni/{$p->IdKor}")."'>Ukloni</a>"." </td>
                          </tr>";
                            }
                            ?>
                             
                            
                          
                         
                         
                          
                        </tbody>
                      </table>
                </form>
            
        </div>
    </div>
</body>

</html>
