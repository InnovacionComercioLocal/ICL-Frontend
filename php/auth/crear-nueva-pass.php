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
    <title>Pitzeria girona</title>
</head>

<body>

    <!--Container Header and nav-->
    <div class="container ">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark mb-sl-3">
            <a href="../../index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="media/images/logo-page.png" alt="" class="icoLogo">
            </a>

            <!--Username-->
            <ul class="nav nav-pills">
                <li class="nav-item "><a href="" class="nav-link text-reset">
                        <p class="username">Username:<p id=""></p>
                        </p>
                        <!-- caso php'.$_SESSION["usuario"].'-->
                    </a></li>
                <!--Redirect to pages-->
                <li class="nav-item"><a href="ofertas.html" class="nav-link ">Ofertas</a></li>
                <li class="nav-item"><a href="menus.html" class="nav-link">Menus</a></li>
                <li class="nav-item"><a href="reservar.html" class="nav-link">Reservar</a></li>
                <li class="nav-item"><a href="productos.html" class="nav-link">Productos</a></li>
                <li class="nav-item"><a href="pedidos-domicilio.php" class="nav-link active">Pedir a domicilio</a></li>
                <li class="nav-item"><a href="about-us.html" class="nav-link">Quienes somos</a></li>
                <li class="nav-item"><a href="carrito.html" class="nav-link"><img src="" alt=""><i class="bi bi-cart4"></i></a>
                </li>
                <li class="nav-item"><a href="php/auth/logout.php" class="nav-link">Cerrar sesion</a></li>
            </ul>
        </header>
    </div>

    <!--Page content-->
    <div class="container h-auto w-auto p-3">
        <main>
            <div class="wrapper main">
                <section>

                    <?php
                    $selector = $_GET['selector'];
                    $validator = $_GET['validator'];

                    if (empty($selector) || empty($validator)) {
                        echo "could not validate your request";
                    } else {
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                    ?>

                            <form action="resetear-password.php" method="POST">
                                <input type="hidden" name="selector" value=" <?php echo $selector; ?>">
                                <input type="hidden" name="validator" value=" <?php echo $validator; ?>">
                                <input type="password" name="pwd" placeholder="Enter a new password">
                                <input type="password" name="pwd-repeat" placeholder="Repeat new password">
                                <button type="submit" name="reset-password-submit">Reset password</button>
                            </form>

                    <?php
                        }
                    }
                    ?>


                </section>
            </div>
        </main>

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