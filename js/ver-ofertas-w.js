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
  loadOfertas();
}

function anterior() {
  if (pagina === 1) {
    pagina = 1;
  } else {
    pagina--;
  }
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadOfertas();
}

function siguiente() {
  if (pagina === totalPag) {
    pagina = totalPag;
  } else {
    pagina++;
  }
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadOfertas();
}

function ultima() {
  pagina = totalPag;
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadOfertas();
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
  document.getElementById("containerOfertas").innerHTML = "";
}

//------------Get ofertas--------------------//

function loadOfertas() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = processarOfertas;
  xmlhttp.open(    "GET",    "https://pizzeriagirona.000webhostapp.com/php/ver-ofertas/ver-ofertas.php?pagina=" +      pagina,    true  );
  //xmlhttp.open(    "GET",    "http://localhost/ICL-Frontend/php/ver-ofertas/ver-ofertas.php?pagina=" +      pagina,    true  );
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
      var btnDel = document.createElement("button");
      var btnEdit = document.createElement("a");
      var icoBtn = document.createElement("i");

      var tr = document.createElement("tr");
      var td = document.createElement("td");
      var td1 = document.createElement("td");
      var td2 = document.createElement("td");
      var td3 = document.createElement("td");      

      //Establece los estilos
      divOferta.classList =
        "container border-bottom border-dark d-flex p-1";
      divImg.classList =
        "container w-100 h-25 text-start p-1";
      divNombre.classList =
        "container w-100 h-25 text-start p-1";
      divPrecio.classList =
        "container w-100 h-25 text-start p-1";
      divBtn.classList =
        "container w-100 h-25 text-end p-1";
      btnDel.classList = "btn btn-danger ms-2";
      btnEdit.classList ="btn btn-primary";
      img.style = "width: 100px; height: 50px;";
      name.classList = "h5";
      price.classList = "h5";
      icoBtn.classList = "bi bi-dash-square";      
      //Asigna los valores
      //Contenedor
      divOferta.id = "Producto";
      //boton      
      //----Obten el id del producto
      btnDel.value = arrayCadaProducto[0];
      btnDel.id = "add";
      btnEdit.innerHTML ="Editar";
      //Imagen
      img.src = rutaImagen(arrayCadaProducto[1]);
      //---Añade la descripcion del producto
      img.alt = arrayCadaProducto[2];
      //Nombre
      name.innerText = "Nombre: " + arrayCadaProducto[2];
      //Precio
      price.innerText = "Precio: " + arrayCadaProducto[3] + " €";

      //Monta la caja      
      td.appendChild(img);      
      td1.appendChild(name);      
      td2.appendChild(price);
      btnDel.appendChild(icoBtn);
      divBtn.appendChild(btnDel);
      td3.appendChild(btnEdit);      
      td3.appendChild(btnDel);      
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
    });
  }
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
var containerGeneral = document.getElementById("containerOfertas");
