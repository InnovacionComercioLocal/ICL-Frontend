function loadEvents() {
  //carga los productos por defecto
  loadProductos();
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

//Check
function test() {
  alert("Is working!!!");
}

//--------------Eventos pagina-----------------//

function primera() {
  pagina = 1;
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadProductos();
}

function anterior() {
  if (pagina === 1) {
    pagina = 1;
  } else {
    pagina--;
  }
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadProductos();
}

function siguiente() {
  if (pagina === totalPag) {
    pagina = totalPag;
  } else {
    pagina++;
  }
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadProductos();
}

function ultima() {
  pagina = totalPag;
  console.log("pagina" + pagina);
  limpiarContenidoLista();
  loadProductos();
}

function añadirAlCarro() {
  console.log(
    "hola soy el btnEdit " + document.getElementById("add").innerText
  );
  console.log(
    "El valor es deci id es: " + document.getElementById("add").value
  );
  
}

//--------------Limpia el contenido a mostrado-----------------//

function limpiarContenidoLista() {
  containerGeneral.innerHTML = "";
}

//--------------Cargar los productos-----------------//

function loadProductos() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = procesarProductos;
  xmlhttp.open(
    "GET",
    "https://pizzeriagirona.000webhostapp.com/php/Products/getProductos.php?pagina=" +
      pagina,
    true
  );
  xmlhttp.send();
}

function procesarProductos() {
  if (this.readyState == 4 && this.status == 200) {
    var string = this.responseText;
    console.log("string: " + string);

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
      var divProducto = document.createElement("div");
      var divImg = document.createElement("div");
      var img = document.createElement("img");
      var divNombre = document.createElement("div");
      var name = document.createElement("p");
      var divPrecio = document.createElement("div");
      var price = document.createElement("p");
      var divBtn = document.createElement("div");
      var btnAdd = document.createElement("button");

      //Establece los estilos
      divProducto.classList =
        "container border border-dark rounded-4 color-White-6 my-3 w-80 h-25 p-2 mx-1 d-flex text-start";
      divImg.classList =
        "container w-100 h-100 p-1 color-White-5 rounded-4 text-center mx-5 my-2";
      divNombre.classList =
        "container w-100 h-100 p-4 color-White-5 rounded-4 text-center mx-5 my-2";
      divPrecio.classList =
        "container w-100 h-100 p-4 color-White-5 rounded-4 text-center mx-5 my-2";
      divBtn.classList =
        "container w-100 h-100 p-4 color-White-5 rounded-4 text-center mr-5 my-2";
      btnAdd.classList = "btn btn-success";
      img.style = "width: 200px; height: 100px;";      
      //Asigna los valores
      //Contenedor
      divProducto.id = "Producto";
      //boton
      btnAdd.innerText = "Añadir a la cesta";
      //----Obten el id del producto
      btnAdd.value = arrayCadaProducto[0];
      btnAdd.id = "add";
      //Imagen
      img.src = rutaImagen(arrayCadaProducto[1]);
      //---Añade la descripcion del producto
      img.alt = arrayCadaProducto[2];
      //Nombre
      name.innerText = "Nombre: " + arrayCadaProducto[2];
      //Precio
      price.innerText = "Precio: " + arrayCadaProducto[3] + " €";

      //Monta la caja
      divImg.appendChild(img);
      divNombre.appendChild(name);
      divPrecio.appendChild(price);
      divBtn.appendChild(btnAdd);
      divProducto.appendChild(divImg);
      divProducto.appendChild(divNombre);
      divProducto.appendChild(divPrecio);
      divProducto.appendChild(divBtn);

      //Muestra los resultados
      containerGeneral.appendChild(divProducto);

      //Muestra la pagina actual y el total de paginas        

      document.getElementById("contador").innerText = totalPag;
      document.getElementById("contadorActual").innerText = pagina;
    });
  }
}

//-------------Ruta imagen------------------//

function rutaImagen(imgName) {
  console.log("Ruta imagen, Nombre: " + imgName);
  var rutaImgTemp = "/pizzeriagirona.000webhostapp.com/media/images/products/" + imgName+".jpg";

  var rutaImg = rutaImgTemp.split(" ").join("");
  return rutaImg;
}

//-------------var------------------//
var pagina = 1;
var totalPag;
var containerGeneral = document.getElementById("containerUp");
