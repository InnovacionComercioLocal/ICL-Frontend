<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/allPages.css">
    <link rel="stylesheet" href="../css/register.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- CSS Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>Pitzeria girona</title>
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
    </style>

</head>

<body>
    <!--Container Header and nav-->
    <div class="container ">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark mb-sl-3">
            <a href="../paginaHome.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="../uploads/logo-page.png" alt="" class="icoLogo">
            </a>

            <!--Username-->
            <ul class="nav nav-pills">
                <!--Redirect to pages-->
                <li class="nav-item"><a href="ofertas.php" class="nav-link ">Ofertas</a></li>
                <!--<li class="nav-item"><a href="menus.html" class="nav-link">Menus</a></li>-->
                <!--<li class="nav-item"><a href="reservar.html" class="nav-link active">Reservar</a></li>-->
                <li class="nav-item"><a href="productos.php" class="nav-link">Productos</a></li>
                <li class="nav-item"><a href="pedidos-domicilio.php" class="nav-link ">Pedir a domicilio</a></li>
                <li class="nav-item"><a href="about-us.php" class="nav-link">Quienes somos</a></li>
            </ul>
        </header>
    </div>
    <div class="container">
        <h1>Registrarse</h1>
        <?php
        if (isset($_POST["enviar"])) {

            $email = $_POST['email'];
            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $password = $_POST["password"];

            include("../comun/conexionBD.php");
            $comprobacion = $mysqli->query("SELECT * from usuario WHERE usuario.Email='$email'");
            if (mysqli_num_rows($comprobacion) <= 0) {
                if ($_POST['password'] == $_POST['ConfirmarPassword']) {
                    require("../comun/encryptcontra.php");
                    $result = $mysqli->query("INSERT INTO usuario (Nombre,Telefono,Password,Email) VALUES ('$nombre','$telefono','$passwordCrypt','$email')");
                    echo ($mysqli->error);
                    session_start();
                    $_SESSION['usuario'] = array();
                    $_SESSION['usuario']['email'] = $email;
                    $_SESSION['usuario']['ID_Role'] = '2';
                    $mysqli->query("UPDATE usuario SET validado=1 WHERE usuario.Email ='$email'");
                    echo ($mysqli->error);
                    echo ("<div id='Div1'>
                
            <span style='color: green;' >Usuario creado con exito!!</span>
        
            </div> ");
                    header("location:../paginaHome.php");
                } else {
                    echo ("<div id='Div1'>
                
                    <span style='color: red;' > Las Contraseñas deben ser iguales</span>
                
                </div> ");
                }
            } else {
                echo ("<div id='Div1'>
                
            <span style='color: red;' >Este email ya esta registrado</span>
        
            </div> ");
            }

            echo ($mysqli->error);
            $mysqli->close();
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="formularioSignUp" method="POST" class="ms-2 mt-3 border-bottom border-dark p-3">
            <label for="" id="labels">Nombre</label>
            <input type="text" name="nombre" id="formBorders" required>
            <br /><br />
            <label for="" id="labels">Email</label>
            <input type="email" name="email" required>
            <br /><br />
            <label for="" id="labels">Contraseña</label>
            <input type="password" id="password" name="password" required>
            <br /><br />
            <label for="" id="labels">Confirma tu Contraseña</label>
            <input type="password" id="ConfirmarPassword" name="ConfirmarPassword" required>
            <br /><br />
            <label for="" id="labels">Teléfono</label>
            <input type="text" name="telefono" required placeholder="xxx-xxx-xxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"></input>
            <span class="validity"></span>
            <span class="validity"></span>
            <br /><br /><br />
            <input type="checkbox" id="politicas" style="margin-right: 1em;" name="politicas" required></input> He leido y
            acepto la <a href="../politicasdeprivacidad.html">Políticas de Privacidad</a>
            <br />
            <span id="erroresForm" style="color: red;"></span>
            <br />
            <input type="submit" name="enviar" class="btn btn-success w-25"></input>
        </form>
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
</body>

</html>