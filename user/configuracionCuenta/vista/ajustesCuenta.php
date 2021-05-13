<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/allPages.css">
    <link rel="stylesheet" href="../../../css/index.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- CSS Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>Pitzeria Girona</title>
    <script type="text/javascript" src="../controlador/perfilusuario.js"></script>
    <style>
        input:invalid+span:after {
            position: absolute;
            content: '✖';
            padding-left: 5px;
            color: #8b0000;
        }

        input:valid+span:after {
            position: absolute;
            content: '✓';
            padding-left: 5px;
            color: #009000;
        }

        #erroresForm {
            color: #8b0000;
        }

        body {
            margin-top: 5%;
            text-align: center;
        }

        #checkboxButton {
            display: none;
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
                <li class="nav-item "><a href="ajustesCuenta.php" class="nav-link active">
                        <?php
                        session_start();
                        echo ($_SESSION["usuario"]["email"]);
                        ?>
                    </a></li>
                <!--Redirect to pages-->
                <li class="nav-item"><a href="ofertas.php" class="nav-link ">Ofertas</a></li>
                <!--<li class="nav-item"><a href="menus.html" class="nav-link">Menus</a></li>-->
                <!--<li class="nav-item"><a href="reservar.html" class="nav-link active">Reservar</a></li>-->
                <li class="nav-item"><a href="../../../Productos/vista/listaProductos.php" class="nav-link">Productos</a></li>
                <li class="nav-item"><a href="user/pedirAdomicilio/direccion.php" class="nav-link ">Pedir a domicilio</a></li>
                <li class="nav-item"><a href="../../../about-us.php" class="nav-link">Quienes somos</a></li>
                <?php
                if ($_SESSION['usuario']['ID_Role'] == 2) {
                    echo ('<li class="nav-item"><a href="carrito.php" class="nav-link"><img src="" alt=""><i class="bi bi-cart4"></i></a>');
                }
                ?>
                <?php
                if ($_SESSION['usuario']['ID_Role'] == 1 || $_SESSION['usuario']['ID_Role'] == 3) {
                    echo ('<li class="nav-item"><a href="../../../admin/Usuarios/vista/listaUsuarios.php" class="nav-link">Lista de usuarios</a></li>');
                }
                ?>
                <li class="nav-item"><a href="../../../comun/logout.php" class="nav-link">Cerrar sesion</a></li>
            </ul>
        </header>
    </div>
    <!--Content page-->
    <div class="container h-auto w-auto p-3">
        <h1 class="h3">Configuración del perfil</h1>
        <form action="" method="POST" id="formAjustesCuenta" class="container border border-dark w-100 h-75 p-4 m-3">
            <div class="container border">

            </div>
        </form>
    </div>

    <script type="text/javascript">
        window.addEventListener("load", loadEvents);
    </script>
    <form action="" method="POST" id="formAjustesCuenta">
        <input type="number" name="iduser" id="iduser" class="">
        Nombre: <input type="text" name="nombre" id="nombre" required></input>
        </br>
        </br>
        <input type="text" name="contraDefinitiva" id="contraDefinitiva">
        <br>
        <br>
        <div id="divContra">
            Contraseña: <input type="password" value="********" disabled id="password"></input>
            <br>
            <br>
            <label><input type="checkbox" id="checkboxButton" onchange="cbChecked()" class="btn btn-secondary mt-3">Cambiar Contraseña</label>

        </div>
        <div id="nuevaContra" style="display: none;">
            <h3>Nueva Contraseña</h3>

            Contraseña: <input type="password" id="nuevaPassword"></input>
            </br>
            </br>
            Confirmar contraseña: <input type="password" id="ConfirmarPassword"></input>
            </br>
            </br>
            <div id="diverr">
                <span id="spanErr"></span>
            </div>
            <button type="reset" id="guardarContra">Guardar</button>
        </div>
        </br>

        <!--Email: <input type="email" id="email" name="email" required></input>-->
        </br>
        Teléfono: <input type="text" id="telefono" name="telefono" required placeholder="xxx-xxx-xxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"></input>
        <span class="validity"></span>
        </br>
        <span id="erroresForm" style="color: red;"></span>
        </br>
        <input type="button" id="btnEnviar" value="Enviar"></input>
    </form>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>