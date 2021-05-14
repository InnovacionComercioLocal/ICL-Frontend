<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/allPages.css">
    <link rel="stylesheet" href="../../../css/crear-producto.css">    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- CSS Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>Pitzeria girona</title>    
    <style>
        body {
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <!--Container Header and nav-->
    <div class="container ">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark mb-sl-3">
            <a href="../../../paginaHome.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="../../../uploads/logo-page.png" alt="" class="icoLogo">
            </a>

            <ul class="nav nav-pills">
                <!--Username-->
                <li class="nav-item "><a href="../../../user/configuracionCuenta/vista/ajustesCuenta.php" class="nav-link text-reset">
                        <?php
                        session_start();
                        echo ($_SESSION["usuario"]["email"]);
                        ?>
                    </a></li>
                <!--Redirect to pages-->
                <li class="nav-item"><a href="../../../Ofertas/vista/listaOfertas.php" class="nav-link active">Ofertas</a></li>
                <!--<li class="nav-item"><a href="menus.html" class="nav-link">Menus</a></li>-->
                <!--<li class="nav-item"><a href="reservar.html" class="nav-link active">Reservar</a></li>-->
                <li class="nav-item"><a href="../../../Productos/vista/listaProductos.php" class="nav-link ">Productos</a></li>
                <li class="nav-item"><a href="../../../user/pedirAdomicilio/direccion.php" class="nav-link ">Pedir a domicilio</a></li>
                <?php
                if ($_SESSION['usuario']['ID_Role'] == 1 || $_SESSION['usuario']['ID_Role'] == 3) {
                    echo ('<li class="nav-item"><a href="../../../admin/Usuarios/vista/listaUsuarios.php" class="nav-link">Lista de usuarios</a></li>');
                }
                ?>
                <li class="nav-item"><a href="../../../about-us.php" class="nav-link">Quienes somos</a></li>
                <li class="nav-item"><a href="../../../comun/logout.php" class="nav-link">Cerrar sesion</a></li>
            </ul>
        </header>
    </div>

    <!--Content page-->
    <div class="container border border-dark w-100 h-100 p-4 my-5">
        <h1>Editar oferta</h1>
        <hr>
        <div class="container my-2 d-flex color-White-6 rounded-4">
            <form class="form-check p-3 " action="../../../comun/datosImagen.php" method="POST" enctype="multipart/form-data">
                <div class="container my-2 p-0 d-flex color-White-6 rounded-4">
                    <div class="container mx-2">
                        <input type="number" hidden id="idProduct" name="idProducto">
                    </div>
                    <!--Conf img-->
                    <div class="container mx-2">
                        <div id="imagenFoto">
                        </div>
                    </div>
                    <div class="container mx-2">
                        <input class="my-5 w-auto" type="file" name="imagen" size="20" required></td>
                    </div>
                    <!--Conf data-->
                    <div class="container border-start border-dark mx-2 text-center">
                        <input class="btn btn-success my-5" type="submit" id="botonEnviar" value="Cambiar Imagen">
                    </div>
                </div>
            </form>
        </div>

        <div class="container my-2 d-flex color-White-6 rounded-4">
            <form action="../modelo/editarOferta.php" id="formularioProducto" method="POST">
                <div class="container my-2 p-0 d-flex color-White-6 rounded-4">
                    <div class="container mx-2 ">
                        <label for="nombreProducto">Nombre del Producto:</label>
                        <input class="my-5 w-auto" type="text" id="nombreProducto" name="nombreProducto" required></input>
                    </div>
                    <div class="container border-start border-dark mx-2">
                        <label for="precioProducto">Precio del Producto en €</label>
                        <input class="my-5 w-100" type="number" id="precioProducto" name="precioProducto" required></input>
                    </div>
                    <div>
                    <input type="number" hidden id="idProduct1" name="idProducto1">
                        <input type="text" style="display: none;" name="imagen" id="imagen">
                        <input type="text" style="display: none;" name="IDcategoria" id="IDcategoria">
                    </div>
                    <div class="container border-start border-dark mx-2">
                        <button type="submit" class="btn btn-success mt-5 w-auto">Guardar</button>
                        <button id="eliminar" class="btn btn-danger  mt-5 w-auto">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="../controlador/editarOferta.js"></script>
    <script type="text/javascript">
        window.addEventListener("load", loadEvents);
    </script>

</body>

</html>