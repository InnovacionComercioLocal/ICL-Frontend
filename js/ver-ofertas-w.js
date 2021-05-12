function loadEvents() {
  //carga los productos por defecto
  loadOfertas();
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

  //esta función coge el id del elemento que se clica, solo los botones tienen el id add+número
  //de esa manera solo funcionará con los botones
  // document.body.addEventListener("click", function (event) {
  //   var contentPanelId = event.target.id;
  //   if (contentPanelId.includes("add")) {
  //     var valor = event.target.value;

  //     window.location.href = "../workers/borrarOferta.php?valor=" + valor;
  //   }
  // });
}

//--------------Eventos pagina-----------------//

function primera() {
  pagina = 1;
  // console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadOfertas();
}

function anterior() {
  if (pagina === 1) {
    pagina = 1;
  } else {
    pagina--;
  }
  // console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadOfertas();
}

function siguiente() {
  if (pagina === totalPag) {
    pagina = totalPag;
  } else {
    pagina++;
  }
  // console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadOfertas();
}

function ultima() {
  pagina = totalPag;
  // console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadOfertas();
}

//coge el id del producto para borrarlo
function cargarBorrar() {
  document.getElementById("add1").addEventListener("click", () => {
    var idOferta = document.getElementById("Producto1").innerHTML;
    window.location = "../php/worker/crearOferta/borrarOferta.php?idOferta=" + idOferta;
    //alert("id " + idOferta);
  });
  document.getElementById("add2").addEventListener("click", () => {
    var idOferta = document.getElementById("Producto2").innerHTML;
    window.location = "../php/worker/crearOferta/borrarOferta.php?idOferta=" + idOferta;
    //alert("id " + idOferta);
  });
  document.getElementById("add3").addEventListener("click", () => {
    var idOferta = document.getElementById("Producto3").innerHTML;
    window.location = "../php/worker/crearOferta/borrarOferta.php?idOferta=" + idOferta;
    //alert("id " + idOferta);
  });
  document.getElementById("add4").addEventListener("click", () => {
    var idOferta = document.getElementById("Producto4").innerHTML;
    // alert("id " + idOferta);
    window.location = "../php/worker/crearOferta/borrarOferta.php?idOferta=" + idOferta;
  });
}

//--------------Test-----------------------//

function test() {
  alert("Is working!!!!");
}

//--------------Limpia el contenido a mostrado-----------------//

function limpiarContenidoLista() {
  document.getElementById("containerOfertas").innerHTML = "";
}

//------------Get ofertas--------------------//

function loadOfertas() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = processarOfertas;
  // xmlhttp.open("GET", "https://pizzeriagirona.000webhostapp.com/php/ver-ofertas/ver-ofertas.php?pagina=" + pagina, true);
  xmlhttp.open(
    "GET",
    "http://localhost/ICL-Frontend/php/ver-ofertas/ver-ofertas.php?pagina=" +
    pagina,
    true
  );
  xmlhttp.send();
}

function processarOfertas() {
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

    var manejarId = 1;
    //Genera los elementos por cantidad
    arrayliProductos.forEach((element) => {
      var arrayCadaProducto = element.split("/");

      //Crea los elementos
      var divOferta = document.createElement("div");
      var divImg = document.createElement("div");
      var img = document.createElement("img");
      var divNombre = document.createElement("div");
      var name = document.createElement("p");
      var divPrecio = document.createElement("div");
      var price = document.createElement("p");
      var divBtn = document.createElement("div");
      var btnDel = document.createElement("a");
      var icoBtn = document.createElement("i");
      var contenedorID = document.createElement("p");

      var tr = document.createElement("tr");
      var td = document.createElement("td");
      var td1 = document.createElement("td");
      var td2 = document.createElement("td");
      var td3 = document.createElement("td");

      //Establece los estilos
      divOferta.classList = "container border-bottom border-dark d-flex p-1";
      divImg.classList = "container w-100 h-25 text-start p-1";
      divNombre.classList = "container w-100 h-25 text-start p-1";
      divPrecio.classList = "container w-100 h-25 text-start p-1";
      divBtn.classList = "container w-100 h-25 text-end p-1";
      btnDel.classList = "btn btn-danger ms-2";
      img.style = "width: 100px; height: 50px;";
      name.classList = "h5";
      price.classList = "h5";
      icoBtn.classList = "bi bi-dash-square";
      contenedorID.classList = "hide";
      //Asigna los valores
      //Contenedor
      divOferta.id = "Producto";
      //boton
      //----Obten el id del producto
      btnDel.value = arrayCadaProducto[0];
      btnDel.id = "add" + manejarId;
      contenedorID.id = "Producto" + manejarId;
      //Imagen
      img.src = rutaImagen(arrayCadaProducto[1]);
      //---Añade la descripcion del producto
      img.alt = arrayCadaProducto[2];
      //Nombre
      name.innerText = "Nombre: " + arrayCadaProducto[2];
      //Precio
      price.innerText = "Precio: " + arrayCadaProducto[3] + " €";
      //id oferta
      contenedorID.innerText = arrayCadaProducto[0];

      //Monta la caja
      td.appendChild(img);
      td1.appendChild(name);
      td2.appendChild(price);
      btnDel.appendChild(icoBtn);
      divBtn.appendChild(btnDel);
      td3.appendChild(btnDel);
      tr.appendChild(contenedorID);
      tr.appendChild(td);
      tr.appendChild(td1);
      tr.appendChild(td2);
      tr.appendChild(td3);

      //Muestra los resultados
      //document.getElementById("containerOfertas").appendChild(divOferta);
      document.getElementById("containerOfertas").appendChild(tr);

      //Muestra la pagina actual y el total de paginas

      document.getElementById("contador").innerText = totalPag;
      document.getElementById("contadorActual").innerText = pagina;

      manejarId++;
    });
  }
  cargarBorrar();
}

//-------------Ruta imagen------------------//

function rutaImagen(imgName) {
  console.log("Ruta imagen, Nombre: " + imgName);
  // var rutaImgTemp = "https://pizzeriagirona.000webhostapp.com/media/images/ofertas/" + imgName + ".jpg";
  var rutaImgTemp = "http://localhost/ICL-Frontend/media/images/ofertas/" + imgName + ".jpg";

  var rutaImg = rutaImgTemp.split(" ").join("");
  return rutaImg;
}

//-------------var------------------//
var pagina = 1;
var totalPag;
var containerGeneral = document.getElementById("containerOfertas");
idd = "";
