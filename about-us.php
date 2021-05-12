<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/allPages.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- CSS Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>Pitzeria girona</title>
</head>

<body>
  <!--Container Header and nav-->
  <div class="container w-100">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark mb-sl-3">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="media/images/logo-page.png" alt="" class="icoLogo">
      </a>

      <!--Username-->
      <ul class="nav nav-pills">
        <li class="nav-item "><a href="editarPerfil.php" class="nav-link text-reset">
            <?php
            session_start();
            if (!isset($_SESSION["usuario"])) {
              //include("components/login.html");        
            } else {
              include("components/username.php");
            }
            ?>

          </a></li>
        <!--Redirect to pages-->
        <li class="nav-item"><a href="ofertas.php" class="nav-link ">Ofertas</a></li>
        <!--<li class="nav-item"><a href="menus.html" class="nav-link">Menus</a></li>-->
        <!--<li class="nav-item"><a href="reservar.html" class="nav-link active">Reservar</a></li>-->
        <li class="nav-item"><a href="productos.php" class="nav-link">Productos</a></li>
        <li class="nav-item"><a href="pedidos-domicilio.php" class="nav-link ">Pedir a domicilio</a></li>
        <li class="nav-item"><a href="about-us.php" class="nav-link active">Quienes somos</a></li>
        <!--Link carrito-->
        <?php
        if (!isset($_SESSION["usuario"])) {
        } else {
          include("components/carrito.html");
        }
        ?>
        <!--Link logout-->
        <?php
        if (!isset($_SESSION["usuario"])) {
          //include("components/login.html");        
        } else {
          include("components/logout.html");
        }
        ?>
      </ul>
    </header>
  </div>

  <!--Content page-->
  <div class="container border border-dark p-4">
    <h2 class="mt-2 mb-5">Quienes Somos</h2>
    <!-- <img src="media/images/exampleP.jpg" alt="">
    <p>holaa</p> -->
    <div class="container">

      <div class="row p-1">
        <div class="container d-flex w-100">
          <div class="col-sm-6">

            <div class="text-start mx-2">
              <p class="fs-5">Somos una pizzería con mucha experiencia, nuestros productos llevan una gran cantidad de condimentos
                de la mejor calidad a un buen precio. Los clientes tienen una gran variedad de pizzas a elegir, si
                alguien tiene alguna necesidad también será escuchada.</p>
              <p class="fs-5">Disponemos de servicio de entrega y recogida en la tienda, solo es necesario unos cuantos clics
                y listo, solo falta esperar, preparar una buena película y disfrutar.</p>
              <p class="fs-4 fw-bolder">¡¡ Buon Appetito. !!</p>
            </div>
          </div>
          <div class="container mx-2 w-100 border p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d808.7520014860046!2d2.8199317716150887!3d41.96774236011738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12bae7b0432f1b0d%3A0x42986cf1a64dfb08!2sLuciopizza!5e0!3m2!1ses!2ses!4v1620843692157!5m2!1ses!2ses" class="w-100 h-100" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>

        <a href="http://icl2021.epizy.com/" target="_blank" class="text-dark fw-bold text-decoration-none mt-5">Creada por ICL</a>
      </div>
    </div>

  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
</body>

</html>