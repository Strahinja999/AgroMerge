function inicijalizujPromenljive(){

    let proizvodjac=document.getElementById("proizvodjac")
    let potrosac = document.getElementById("potrosac")
   
    
}

function prikaziProizvodjaca(){
    potrosac.style.display="none"
    proizvodjac.style.display = "block"; 
}
function prikaziPotrosaca(){
    proizvodjac.style.display="none"
    potrosac.style.display="block"
}
function prikaziFizickoLice(){
    let fizikoLice = document.getElementById("fizickoLice")
    pravnoLice.style.display="none"
    fizickoLice.style.display="block"
}
function prikaziPravnoLice(){
    let pravnoLice = document.getElementById("pravnoLice")
    fizickoLice.style.display="none"
    pravnoLice.style.display="block"

}

function odobreno(id){

    document.getElementById(id).value="Odobreno"
    if(document.getElementById(id).id=="myButton1")document.getElementById("myButton4").style.display="none"
    if(document.getElementById(id).id=="myButton2")document.getElementById("myButton5").style.display="none"
    if(document.getElementById(id).id=="myButton3")document.getElementById("myButton6").style.display="none"
}


function odbijeno(id){
   
    if(document.getElementById(id).id=="myButton4")document.getElementById("row1").remove();
    if(document.getElementById(id).id=="myButton5")document.getElementById("row2").remove();
    if(document.getElementById(id).id=="myButton6")document.getElementById("row3").remove();
}


function ukloni(){
  let pom=  document.getElementById("card")
  pom.style.display="none"
}

function izbrisi(id){

    if (confirm("Da li ste sigurni da želite da uklonite korisnika?")){
        let pom=document.getElementById(id)
        pom.style.display='none'
    }

}

function prikaziIzmeni(){
    let izmeni = document.getElementById("izmeni")
    izmeni.style.display="block"
}
function odustani(){
    if(confirm("Da li ste sigurni da želite da odusanete?"))
    window.location.href="proizvodjac.html"
}

function odustani_Izmeni(){
    if(confirm("Da li ste sigurni da želite da odusanete?")){
        let izmeni = document.getElementById("izmeni")
    izmeni.style.display="none"
    }
    
}
function potvrdi(){
    confirm("Da li ste sigurni da želite da potvrdite izmene?")
}
function obrisi(){
    confirm("Da li ste sigurni da želite da obrišete ponudu?")
}
function uspesno(){
    alert("Uspešno ste dodali moderatora")
}

function uspesno2(){
    alert("Vas zahtev za registraciju je poslat")

}



function odustaniKorpa(){
    window.location.href="potrazioc.html"
}

function isprazniKorpu(){
    confirm("Da li ste sigurni da želite da ispraznite korpu?")
}

function kupovina(){
    window.location.href="kupovina.html"
}

function kupi(){
    let kartica = document.getElementById("kartica")
    kartica.style.display="block"
}

