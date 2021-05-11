function loadEvents() {
    loadReservas();      
}

//Get ofertas

function loadReservas() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = processarReservas;
  xmlhttp.open(    "GET",    "https://pizzeriagirona.000webhostapp.com/php/worker/ver-reservas/ver-reservas.php",    true  );
  //xmlhttp.open(    "GET",    "https://pizzeriagirona.000webhostapp.com/php/worker/ver-reservas/ver-reservas.php",    true  );
  xmlhttp.send();
}

function processarReservas() {
    var container = document.getElementById("containerOferta");
  if (this.readyState == 4 && this.status == 200) {
    var product = this.responseText;    
    
    container.innerHTML = product;
  }
}

//https://pizzeriagirona.000webhostapp.com