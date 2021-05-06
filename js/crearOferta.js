function loadEvents() {
  crearOfertas();
}

function crearOfertas() {
  var name = document.getElementById("nombre").value;
  var cost = document.getElementById("precio").value;
  
  name.innerHTML = "";
  cost.innerHTML = "";

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = processarCrearOfertas;
  xmlhttp.open(
    "GET",
    "https://pizzeriagirona.000webhostapp.com/php/worker/crearOferta/crearOferta.php?nombre=" +
      name +
      "&" +
      "precio=" +
      cost,
    true
  );
  xmlhttp.send();

}

function processarCrearOfertas() {
  var a = document.getElementById("here");
  if (this.readyState == 4 && this.status == 200) {
    var stringOfer = this.responseText;

    if (stringOfer == 1) {
      a.className = "container border border-dark h-25 p-3 my-2 text-center text-danger see";
      a.innerHTML = "Esa oferta ya existe";
    } else if (stringOfer == 0) {
        loadOfertas();
    }
  }
}

//Get ofertas

function loadOfertas() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = processarOfertas;
  xmlhttp.open(
    "GET",
    "https://pizzeriagirona.000webhostapp.com/php/worker/crearOferta/getOferta.php",
    true
  );
  xmlhttp.send();
}

function processarOfertas() {
    var container = document.getElementById("containerOferta");
  if (this.readyState == 4 && this.status == 200) {
    var product = this.responseText;    
    
    container.innerHTML = product;
  }
}
