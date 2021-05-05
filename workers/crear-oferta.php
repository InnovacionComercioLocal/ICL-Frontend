<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/allPages.css">
  <link rel="stylesheet" href="../css/crear-oferta.css">  
  <script src="../js/ver-ofertas-w.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- CSS Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>Pitzeria girona</title>
</head>

<body>
  <!--Container Header and nav-->
  <div class="container w-100">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark mb-sl-3">
      <a href="crear-oferta.php"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="../media/images/logo-page.png" alt="" class="icoLogo">
      </a>

      <!--Username-->
      <ul class="nav nav-pills">
      <li class="nav-item "><a href="" class="nav-link text-reset">
        <?php
        session_start();
        if (!isset($_SESSION["usuario"])) {
          //include("components/login.html");         
        } else {
          include("../components/username.php");
        }
        ?>
            
          </a></li>
        <!--Redirect to pages-->
        <!--<li class="nav-item"><a href="ver-reservas.php" class="nav-link ">Reservas</a></li>-->
        <li class="nav-item"><a href="crear-oferta.php" class="nav-link active">Crear oferta</a></li>
        <li class="nav-item"><a href="crear-producto.php" class="nav-link">Crear producto</a></li>
        <li class="nav-item"><a href="ver-pedidos.php" class="nav-link">Ver pedidos</a></li>
        <?php               
        if (!isset($_SESSION["usuario"])) {
          //include("components/login.html");        
        } else {
          include("../components/logout2.html");
        }
        ?>
      </ul>
    </header>
  </div>

  <!--Content page-->
  <div class="container border border-dark p-3">
    <h1>Crear Oferta</h1>
    <hr>

    <!--Container Product-->
    <div class="container">
      <p class="h4">Oferta</p>
      <form action="../php/worker/crearOferta/crearOferta.php" method="POST">
        <div class="container rounded-4 d-flex w-auto color-White-6">
          <!--Image-->
          <div class="container border-start border-dark mx-2 my-2 w-25 text-center">
            <img src="../media/images/exampleP.jpg" alt="" class="imgProduct">
          </div>

          <!--Container img-->
          <div class="container border-start border-dark mx-2 my-2 w-50 text-center">
            <!--  DESPLEGABLE
            <select name="" id="" class="my-5 w-100">
              <option value=""> - </option>
            </select> 
          -->
            <input type="text" name="img" id="img" class="my-5 w-100" placeholder="Imagen">
          </div>

          <!--Container select-->
          <div class="container border-start border-dark mx-2 my-2 w-50 text-center">
            <!--  DESPLEGABLE
            <select name="" id="" class="my-5 w-100">
              <option value=""> - </option>
            </select> 
          -->
            <input type="text" name="nombre" id="nombre" class="my-5 w-100" placeholder="Nombre">
          </div>

          <!--Container Precio-->
          <div class="container border-start border-dark mx-2 my-2 w-50 text-center">
            <input type="text" name="precio" id="precio" class="my-5 w-100" placeholder="Precio">
          </div>

          <!--Container btn-->
          <div class="container border-start border-end border-dark text-center mx-2 my-2 w-50">            
            <input type="submit" value="Agregar producto" class="btn btn-success my-5">
          </div>

      </form>

    </div>
  </div>

  <!--Container oferta-->
  <div class="container mt-4 border border-dark p-2">
    <!--Title-->
    <div class="container w-100 text-center border border-dark">
      <p class="h4">Oferta</p>
    </div>

    <!--Container items-->
    <div class="container border border-dark mt-2 w-100 p-1" id="containerOfertas">
      <!--Se mostraran todos los products-->  

    </div>

    <div class="container p-2 mb-3 text-center">
        <button class="btn btn-primary" id="primera">Primera</button>
        <button class="btn btn-primary" id="anterior">Anterior</button>
        <!--Total de paginas-->
        <button class="btn btn-primary disabled" id="contadorActual"></button>
        <button class="btn btn-primary disabled" id="contador"></button>
        <!---->
        <button class="btn btn-primary" id="siguiente">Siguiente</button>
        <button class="btn btn-primary" id="ultima">Última</button>
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
    <script type="text/javascript">
      window.addEventListener("load", loadEvents);
    </script>
</body>

</html>