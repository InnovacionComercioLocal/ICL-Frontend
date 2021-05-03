<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/allPages.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="js/init.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- CSS Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>Pitzeria Girona</title>
</head>

<body onload="init()">
  <!--Container Header and nav-->
  <div class="container ">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark mb-sl-3">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="media/images/logo-page.png" alt="" class="icoLogo">
      </a>

      <!--Username-->
      <ul class="nav nav-pills">
        <li class="nav-item "><a href="" class="nav-link text-reset">
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
        <li class="nav-item"><a href="about-us.php" class="nav-link">Quienes somos</a></li>
        <li class="nav-item"><a href="carrito.php" class="nav-link"><img src="" alt=""><i class="bi bi-cart4"></i></a>
        </li>
        <?php        
        if (!isset($_SESSION["usuario"])) {
          //include("components/login.html");        
        } else {
          include("components/logout.html");
        }
        ?>
        <!--<li class="nav-item"><a href="php/auth/logout.php" class="nav-link">Cerrar sesion</a></li>-->
      </ul>
    </header>
  </div>

  <!--Content page-->
  <div class="container border border-dark  w-100 mx-15 d-flex mt-4 py-4">

    <!--Contenedor ofertas-->
    <div class="container w-100 mx-1 border border-dark p-0">
      <div class="container border-bottom border-dark">
        <h2>Ofertas</h2>
      </div>

      <div id="carouselExampleSlidesOnly" class="carousel slide mx-0 mt-5" data-ride="carousel">
        <div class="carousel-inner h-100">
          <!--Contenido 1-->
          <div class="carousel-item active">
            <img src="media/images/noImage.svg" class="d-block w-100" alt="1 image">
          </div>
          <!--Contenido 2-->
          <div class="carousel-item">
            <img src="media/images/noImage.svg" class="d-block w-100" alt="2 image">
          </div>
          <!--Contenido 3-->
          <div class="carousel-item">
            <img src="media/images/noImage.svg" class="d-block w-100" alt="3 image">
          </div>
        </div>

        <!--Controls-->
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Prev</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>

      </div>

    </div>

    <!--Flotant container for Login-->
    <?php
    //session_start();
    if (!isset($_SESSION["usuario"])) {
      include("components/login.html");
    } else {
    }
    ?>

  </div>

  <!--Container foooter -->
  <div class="container mt-1">
    <footer class="d-flex flex-wrap justify-content-start mx-0 mt-3 w-100 h-50">
      <!--Container tab -->
      <div class="d-flex border-top border-start border-end w-50 mt-2 mx-0">
        <a href="" class="nav-link  w-100 text-center">Tab 1</a>
        <a href="" class="nav-link  w-100 text-center">Tab 2</a>
        <a href="" class="nav-link  w-100 text-center">Tab 3</a>
      </div>
      <!--Container images -->
      <div class="container border border-2 w-100 h-50 d-flex mt-0 p-2">
        <img src="media/images/exampleP.jpg" class="img imgOferta mx-5" alt="">
        <img src="media/images/exampleP.jpg" class="img imgOferta mx-5" alt="">
        <img src="media/images/exampleP.jpg" class="img imgOferta mx-5" alt="">
      </div>
    </footer>
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