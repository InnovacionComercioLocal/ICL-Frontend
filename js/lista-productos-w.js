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

function cargarBorrar() {
  try {
    document.getElementById("add1").addEventListener("click", () => {
      var idProduct = document.getElementById("Producto1").innerHTML;
      window.location =
        "../php/worker/crearProducto/eliminarProducto.php?idProd=" + idProduct;
    });
    document.getElementById("add2").addEventListener("click", () => {
      var idProduct = document.getElementById("Producto2").innerHTML;
      window.location =
        "../php/worker/crearProducto/eliminarProducto.php?idProd=" + idProduct;
    });
    document.getElementById("add3").addEventListener("click", () => {
      var idProduct = document.getElementById("Producto3").innerHTML;
      window.location =
        "../php/worker/crearProducto/eliminarProducto.php?idProd=" + idProduct;
    });
    document.getElementById("add4").addEventListener("click", () => {
      var idProduct = document.getElementById("Producto4").innerHTML;
      window.location =
        "../php/worker/crearProducto/eliminarProducto.php?idProd=" + idProduct;
    });
  } catch (error) {
    console.log("¡Alerta en generar las referencias de btnDel!");
  }
}

//--------------Limpia el contenido a mostrado-----------------//

function limpiarContenidoLista() {
  document.getElementById("containerProductos").innerHTML = "";
}

//--------------Cargar los productos-----------------//

function loadProductos() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = procesarProductos;
  //xmlhttp.open(    "GET",    "https://pizzeriagirona.000webhostapp.com/php/Products/getProductos.php?pagina=" +      pagina,    true  );
  xmlhttp.open("GET", "http://localhost/ICL-Frontend/php/Products/getProductos.php?pagina=" + pagina, true);
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
    var conj = 1;
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
      var contenedorID = document.createElement("p");
      var divBtn = document.createElement("div");
      var btnDel = document.createElement("button");
      var icoBtn = document.createElement("i");

      //Establece los estilos
      divProducto.classList = "container border-bottom border-dark d-flex p-1";
      divImg.classList = "container w-100 h-25 text-start p-1";
      divNombre.classList = "container w-100 h-25 text-start p-1";
      divPrecio.classList = "container w-100 h-25 text-start p-1";
      contenedorID.classList = "hide";
      divBtn.classList = "container w-100 h-25 text-end p-1";
      btnDel.classList = "btn btn-danger";
      img.style = "width: 100px; height: 50px;";
      name.classList = "h5";
      price.classList = "h5";
      icoBtn.classList = "bi bi-dash-square";
      //Asigna los valores
      //Contenedor
      divProducto.id = "Producto";
      contenedorID.id = "Producto" + conj;
      //boton
      //----Obten el id del producto
      contenedorID.innerText = arrayCadaProducto[0];
      btnDel.id = "add" + conj;
      conj++;
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
      btnDel.appendChild(icoBtn);
      divBtn.appendChild(btnDel);
      divProducto.appendChild(divImg);
      divProducto.appendChild(divNombre);
      divProducto.appendChild(contenedorID);
      divProducto.appendChild(divPrecio);
      divProducto.appendChild(divBtn);

      //Muestra los resultados
      //containerGeneral.appendChild(divProducto);
      document.getElementById("containerProductos").appendChild(divProducto);

      //Muestra la pagina actual y el total de paginas

      document.getElementById("contador").innerText = totalPag;
      document.getElementById("contadorActual").innerText = pagina;
    });
  }

  cargarBorrar();
}

//-------------Ruta imagen------------------//

function rutaImagen(imgName) {
  console.log("Ruta imagen, Nombre: " + imgName);
  var rutaImgTemp = "http://localhost/ICL-Frontend/media/images/products/" + imgName + ".jpg";
  //var rutaImgTemp = "https://pizzeriagirona.000webhostapp.com/media/images/products/" + imgName + ".jpg";

  var rutaImg = rutaImgTemp.split(" ").join("");
  return rutaImg;
}

//-------------var------------------//
var pagina = 1;
var totalPag;
var containerGeneral = document.getElementById("containerProductos");
