function loadEvents() {
  //carga los productos por defecto
  loadPedidos();
  //btn actions
  document.getElementById("primera").addEventListener("click", () => {
    primera();
  });

  document.getElementById("anterior").addEventListener("click", () => {
    anterior();
  });

  document.getElementById("siguiente").addEventListener("click", () => {
    siguiente();
  });

  document.getElementById("ultima").addEventListener("click", () => {
    ultima();
  });

  /*document.getElementById("add").addEventListener("click", () => {
    test();
  });*/
  //test();
}

//--------------Eventos pagina-----------------//

function primera() {  
  pagina = 1;
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadPedidos();
}

function anterior() {  
  if (pagina === 1) {
    pagina = 1;
  } else {
    pagina--;
  }
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadPedidos();
}

function siguiente() {  
  if (pagina === totalPag) {
    pagina = totalPag;
  } else {
    pagina++;
  }
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadPedidos();
}

function ultima() {  
  pagina = totalPag;
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadPedidos();
}

function añadirAlCarro() {  
  console.log(
    "hola soy el btnEdit " + document.getElementById("add").innerText
  );
  console.log(
    "El valor es deci id es: " + document.getElementById("add").value
  );
}

//--------------Test-----------------------//

function test() {
  alert("Is working!!!!");
}

//--------------Limpia el contenido a mostrado-----------------//

function limpiarContenidoLista() {
  document.getElementById("Pedido").innerHTML = "";
}

//------------Get ofertas--------------------//

function loadPedidos() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = processarPedidos;
  //xmlhttp.open(    "GET",    "https://pizzeriagirona.000webhostapp.com/php/ver-ofertas/ver-ofertas.php?pagina=" +      pagina,    true  );
  xmlhttp.open(    "GET",    "http://localhost/ICL-Frontend/php/worker/ver-pedidos/ver-pedidosV2.php?pagina=" +      pagina,    true  );
  xmlhttp.send();
}

function processarPedidos() {  
  if (this.readyState == 4 && this.status == 200) {
    //Conten toda la respuesta
    var string = this.responseText;
    console.log("Respuesta de server string: " + string);

    var k = string.indexOf("#");
    console.log("k" + k);

    //Establece el maximo de paginas ref var pagina
    var paginacion = string.slice(k + 1, string.length);
    totalPag = parseInt(paginacion);
    console.log("pag:" + paginacion);

    var stringProductos = string.slice(0, k);

    console.log("string" + stringProductos);
    var arrayliProductos = stringProductos.split("//").filter(Boolean);

    //Genera los elementos por cantidad
    arrayliProductos.forEach((element) => {
      var arrayCadaProducto = element.split("/");

      //Crea los elementos
      var tr = document.createElement("tr");
      var td = document.createElement("td");
      var td1 = document.createElement("td");
      var td2 = document.createElement("td");
      var td3 = document.createElement("td");
      var td4 = document.createElement("td");
      var td5 = document.createElement("td");
      var td6 = document.createElement("td");
      var td7 = document.createElement("td");
      var td8 = document.createElement("td");
      var btn = document.createElement("button");
      var btn1 = document.createElement("button");      
      var ico1 = document.createElement("i");
      

      //Establece los estilos
      tr.classList = setTrStyle();
      td.classList = setTdStyle();
      td1.classList = setTdStyle();
      td2.classList = setTdStyle();
      td3.classList = setTdStyle();
      td4.classList = setTdStyle();
      td5.classList = setTdStyle();
      td6.classList = setTdStyle();
      td7.classList = setTdStyle();
      td8.classList = setTdStyle();
      btn.classList = setBtnStyle();
      btn1.classList = setBtn1Style();
      ico1.classList = setIco1Style();
      //Asigna los valores
      //id
      td.innerHTML = arrayCadaProducto[0]; 
      //Nombre cliente
      td1.innerHTML = arrayCadaProducto[2];
      //Comentario
      td2.innerHTML = arrayCadaProducto[1];
      //Telefono
      td3.innerHTML = arrayCadaProducto[7];
      //Hora
      td4.innerHTML = arrayCadaProducto[4];
      //Direccion
      td5.innerHTML = arrayCadaProducto[6];
      //Precio
      td6.innerHTML = arrayCadaProducto[3];
      //Estado
      td7.innerHTML = arrayCadaProducto[5];
      
      //btn
      btn.innerHTML = "Enviar";

      //Monta la caja
      btn1.appendChild(ico1);
      td8.appendChild(btn);
      td8.appendChild(btn1);
      tr.appendChild(td);
      tr.appendChild(td1);
      tr.appendChild(td2);
      tr.appendChild(td3);
      tr.appendChild(td4);
      tr.appendChild(td5);
      tr.appendChild(td6);
      tr.appendChild(td7);
      tr.appendChild(td8);

      //Muestra los resultados      
      document.getElementById("Pedido").appendChild(tr);      

      //Muestra la pagina actual y el total de paginas

      document.getElementById("contador").innerText = totalPag;
      document.getElementById("contadorActual").innerText = pagina;
    });
  }
}

//-------------Set styles------------------//

function setTdStyle() {
  var s = "text-center p-2";
  return s;
}

function setBtnStyle() {
  var s = "btn btn-primary";
  return s;
}

function setBtn1Style() {
  var s = "btn btn-danger";
  return s;
}

function setIco1Style() {
  var s = "bi bi-dash-square";
  return s;
}

function setTrStyle() {
  var s = "border-bottom border-dark";
  return s;
}
//-------------Ruta imagen------------------//

function rutaImagen(imgName) {
  console.log("Ruta imagen, Nombre: " + imgName);
  var rutaImgTemp = "https://pizzeriagirona.000webhostapp.com/media/images/ofertas/" + imgName + ".jpg";
  //var rutaImgTemp = "http://localhost/ICL-Frontend/media/images/ofertas/" + imgName + ".jpg";

  var rutaImg = rutaImgTemp.split(" ").join("");
  return rutaImg;
}

//-------------var------------------//
var pagina = 1;
var totalPag;
var containerGeneral = document.getElementById("Pedido");

//http://localhost/ICL-Frontend
//https://pizzeriagirona.000webhostapp.com