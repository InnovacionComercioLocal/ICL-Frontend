function loadEvents() {
    loadCategorias();
}


function loadCategorias() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = procesarCategorias;
    xmlhttp.open("GET", "http://localhost/ICL-Frontend/php/worker/getCategoria.php", true);
    //xmlhttp.open("GET", "https://pizzeriagirona.000webhostapp.com/php/worker/getCategoria.php", true);
    xmlhttp.send();
}

//conseguir los diferentes tipos de categorias de producto
function procesarCategorias() {
    var selectorCat = document.getElementById("Categoria");

    if (this.readyState == 4 && this.status == 200) {

        var stringCat = this.responseText;

        //se separa el mensaje que nos llega y le quitamos la última posicion porque sobra
        var arrayliCat = stringCat.split("/");
        arrayliCat.length = arrayliCat.length - 1;

        for (let index = 0; index < arrayliCat.length; index++) {
            selectorCat.innerHTML += "<option>" + arrayliCat[index] + "</option>" + "\n";
            //console.log("Contiene: "+arrayliCat[index]);
        }

    }

    //Llama mostrar ofertas
}