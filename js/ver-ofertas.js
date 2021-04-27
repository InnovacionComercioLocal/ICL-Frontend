function loadEvents() {
  loadReservas();
}

//Get ofertas

function loadReservas() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = processarReservas;
  xmlhttp.open(
    "GET",
    "http://localhost/ICL-Frontend/php/ver-ofertas/ver-ofertas.php",
    true
  );
  xmlhttp.send();
}

function processarReservas() {
    var container = document.getElementById("containerOfertas");
  if (this.readyState == 4 && this.status == 200) {
    var product = this.responseText;    
    
    container.innerHTML = product;
  }
}
