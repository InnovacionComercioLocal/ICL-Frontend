function init() {
   idRegister.addEventListener('click',pay);
   idLogin.addEventListener('click',login);
   idFinalizarPago.addEventListener('click',login);
}

function printCarrito() {
    test();
}

function pay() {
   window.open("./metodos-de-pago.html","_self");
}

function login(email, password) {
   alert("Is working");
}

//https://www.w3schools.com/jsref/prop_text_value.asp

var idLogin = document.getElementById("login");
var idRegister = document.getElementById("register");
var idFinalizarPago = document.getElementById("pagar");