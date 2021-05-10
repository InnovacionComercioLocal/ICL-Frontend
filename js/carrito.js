function loadEvents() {
    document.getElementById(idFinalizarPago).addEventListener("click", () =>{
        pay();
    });
}

function pay() {
    window.open("./metodos-de-pago.php","_self");
 }

 var idFinalizarPago = "pagar";