<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Girona</title>
</head>

<body>
    <?php
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:login.html");
        }
    ?>
    
    <h1>Bienvenidos a la mejor Pizzeria</h1>

    <p>Si estas aqui es porqué ya estas registrado</p>
    <p><a href="auth/logout.php">Cerrar Sessión</a></p>
</body>

</html>