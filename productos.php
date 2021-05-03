<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/allPages.css">
  <script src="js/init.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- CSS Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>Pitzeria girona</title>
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

  <!--Page content-->  
    <div id="containerProducts" class="container border border-dark w-100 my-5">
        <h1 class="h2 mt-2">Productos</h1>
        <!--Fila 1-->
        <div id="containerUp" class="container border border-dark d-flex text-center my-3">  
            <div id="producto" class="container border my-3 w-50 p-2 mx-1 d-flex text-start">
                <img src="media/images/exampleP.jpg" alt="" class="w-25 border border-dark my-3 mx-3">
                <div class="container my-4 mx-3 w-50 border border-dark">
                    <p>Nombre: </p>
                    <p>Precio: </p>         
                    <button class="btn btn-success mb-1">Añadir a la cesta</button>
                </div>
            </div>                                                                                               
        </div>
        <hr>
        <!--Fila 2-->
        <div class="container border border-dark d-flex text-center my-3">
            <div id="producto" class="container border my-3 w-50 p-2 mx-1 d-flex text-start">
                <img src="media/images/exampleP.jpg" alt="" class="w-25 border border-dark my-3 mx-3">
                <div class="container my-4 mx-3 w-50 border border-dark">
                    <p>Nombre: </p>
                    <p>Precio: </p>
                    <button class="btn btn-success mb-1">Añadir a la cesta</button>
                </div>
            </div>                   
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
  integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
  integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="js/javascriptProductos.js">
    window.addEventListener("load",loadEvents);          
</script> 
</body>

</html>