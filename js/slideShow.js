
var i = 0;
var images = [];
var images2 = [];
var time = 5000;

images[0] = 'media/images/ofertas/oferta4.jpg';
images[1] = 'media/images/ofertas/oferta5.jpg';
images[2] = 'media/images/ofertas/oferta6.jpg';
images[3] = 'media/images/ofertas/oferta1.jpg';
images[4] = 'media/images/ofertas/oferta3.jpg';
images[5] = 'media/images/ofertas/oferta2.jpg';

images2[0] = '../media/images/ofertas/oferta4.jpg';
images2[1] = '../media/images/ofertas/oferta5.jpg';
images2[2] = '../media/images/ofertas/oferta6.jpg';
images2[3] = '../media/images/ofertas/oferta1.jpg';
images2[4] = '../media/images/ofertas/oferta3.jpg';
images2[5] = '../media/images/ofertas/oferta2.jpg';
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


function changeImg2() {
    var id = document.getElementById("imagenC");

    id.addEventListener("click", function () {
        window.location.href = "http://localhost//ICL-Frontend/ofertas.php";
    });

    id.src = images2[i];

    if (i < images2.length - 1) {
        i++
    } else {
        i = 0;
    }

    setTimeout("changeImg2()", time);

}