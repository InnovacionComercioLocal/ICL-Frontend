function loadEvents() {
  var containerGeneral = document.getElementById("containerUp");
  createElements(containerGeneral);
  //test();
}

function createElements(containerGeneral) {
    //Array de conmtenido get de la consulta
var a = 4;
for (let index = 0; index < a; index++) {
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
      "container border border-danger my-3 w-100 h-25 p-2 mx-1 d-flex text-center";
    divImg.classList =
      "container w-auto h-50 border border-success p-4 border text-center";
    divNombre.classList =
      "container w-auto border border-success p-4 border text-center";
    divPrecio.classList =
      "container w-auto border border-success p-4 border text-center";
    divBtn.classList =
      "container w-auto border border-success p-4 border text-center";
    btnAdd.classList = "btn btn-success";

    //Asigna los valores
    btnAdd.innerText = "Añadir a la cesta";
    img.style = "width: 200; height: 50px;";
    img.src = "media/images/example.jpeg";
    name.innerText = "Nombre: ";
    price.innerText = "Precio: ";

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
  }
}

function test() {
  alert("Is working!!!");
}
