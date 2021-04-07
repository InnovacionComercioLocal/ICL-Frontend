<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Login</title>
</head>

<body>
    <?php

    $email = $_POST['email'];
    $password = $_POST['password'];
   

    $mysqli = new mysqli("localhost", "root", "", "icl");

    if ($mysqli->connect_errno) {
        echo ("Connect failed: " . $mysqli->connect_error);
        exit();
    }
    $comprobacion = $mysqli->query("SELECT * from usuario WHERE usuario.Email='$email'");
    if (mysqli_num_rows($comprobacion) <= 0) {
        echo("Login no existe");
        header("location:login.html");
    }else{
        
        $comprobacionPasw = $mysqli->query("SELECT * from usuario WHERE  usuario.Email='$email' AND usuario.Password='$password'");
        if (mysqli_num_rows($comprobacionPasw) <= 0) {
            echo("Contraseña incorrecta");
            header("location:login.html");
        } else {
            session_start();
            $_SESSION["usuario"]=$_POST["email"];
            $row = $comprobacionPasw->fetch_object(); 
            echo("Usuario: ".$row->Nombre." conectado");
            $mysqli->query("UPDATE usuario SET Validado=1 WHERE usuario.Email ='$email'");
            header("location:paginaHome.php");
           
        }
         
        
    }
    echo ($mysqli->error);
    $mysqli->close();
    ?>
    
</body>

</html>