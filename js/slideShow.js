
var i = 0;
var images = [];
var time = 5000;

images[0] = 'media/images/ofertas/oferta4.jpg';
images[1] = 'media/images/ofertas/oferta5.jpg';
images[2] = 'media/images/ofertas/oferta6.jpg';
//images[3] = 'media/images/ofertas/Florentina.jpg';

function changeImg() {
    var id = document.getElementById("imagenC");

    id.addEventListener("click", function () {
        window.location.href = "http://localhost//ICL-Frontend/ofertas.php";
    });

    id.src = images[i];

    if (i < images.length - 1) {
        i++
    } else {
        i = 0;
    }

    setTimeout("changeImg()", time);

}