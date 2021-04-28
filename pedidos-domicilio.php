<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/allPages.css">
  <script src="js/init.js"></script>
  <script type="text/javascript" src="js/javascriptDireccion.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- CSS Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>Pitzeria girona</title>
</head>

<body>  
<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {        
        header("location:http://localhost/ICL-Frontend/index.php");
    }
    
    ?> 

     <!--Container Header and nav-->
  <div class="container ">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark mb-sl-3">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="media/images/logo-page.png" alt="" class="icoLogo">        
      </a>

      <!--Username-->
      <ul class="nav nav-pills">
        <li class="nav-item "><a href="" class="nav-link text-reset">
            <p class="username">Username:<p id=""></p></p>
            <!-- caso php'.$_SESSION["usuario"].'-->
          </a></li>
        <!--Redirect to pages-->
        <li class="nav-item"><a href="ofertas.php" class="nav-link ">Ofertas</a></li>
        <!--<li class="nav-item"><a href="menus.html" class="nav-link">Menus</a></li>-->
        <!--<li class="nav-item"><a href="reservar.html" class="nav-link active">Reservar</a></li>-->
        <li class="nav-item"><a href="productos.html" class="nav-link">Productos</a></li>
        <li class="nav-item"><a href="pedidos-domicilio.php" class="nav-link active">Pedir a domicilio</a></li>
        <li class="nav-item"><a href="about-us.html" class="nav-link">Quienes somos</a></li>
        <li class="nav-item"><a href="carrito.html" class="nav-link"><img src="" alt=""><i
              class="bi bi-cart4"></i></a>
        </li>
        <li class="nav-item"><a href="php/auth/logout.php" class="nav-link">Cerrar sesion</a></li>
      </ul>
    </header>
  </div>

  <!--Page content-->
    <div class="container h-auto w-auto p-3">
        <h1>Pedidos a domicilio</h1>
        <div class="container border border-dark w-100 h-75 p-4"> 
            <h2>Dirección</h2> <p id="errormsg"></p>
            <form method="get" id="pedidos" class="border-top border-dark h-100">
                <div class="container border my-4 h-50 p-4 text-center">
                  <!--Provincia-->
                  <label for="provincia">Provincia*: </label>
                  <select id="provincia" required>
                      <option id="optProv">Selecione una provincia</option>
                  </select>
                    <!--Municipio-->
                    <label for="municipio">Municipio*: </label>
                    <select id="municipio" required>
                        <option id="optMun" value="">Selecione un municipio</option>
                    </select>                    
                    <!--CP-->
                    <label for="cp">Cp*: </label>
                    <select id="cp" required>
                        <option id="optCp" value="">Selecione un código postal</option>
                    </select>
                </div>                
                <div class="container border my-4 p-4 text-center">                                        
                  <!--Direccion-->
                  <label for="Direccion">Dirección*: </label>
                  <input id="Direccion" type="text" placeholder="Ej:c/Ramón turró"></input>
                  <!--Número-->
                  <label for="Numero">Número: </label>
                  <input type="text" name="Numero" id="Numero" placeholder="Número" required>
                  <!--Piso-->
                  <label for="Piso">Piso: </label>
                  <input id="Piso" type="text" placeholder=""></input>
                </div>
                <div class="container border my-4 p-4 text-center">
                  <!--Bloque-->
                  <label for="Bloque">Bloque: </label>
                  <input id="Bloque"  type="text" placeholder=""></input>
                  <!--Bloque-->
                  <label for="Puerta">Puerta: </label>
                  <input id="Puerta" type="text" placeholder=""></input>             
                  <!--Bloque-->
                  <label for="Escalera">Escalera: </label>
                  <input id="Escalera" type="text" placeholder=""></input>                                    
                </div>                               
                <div class="container text-center border my-4 p-4">
                    <input type="button" value="Comprobar Dirección" id="botonEnviar" class="btn btn-success">
                </div>
            </form>
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