<?php

$email = $_POST['email'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];


include("../conexionBD.php");
$comprobacion = $mysqli->query("SELECT * from usuario WHERE usuario.Email='$email'");
//If email not exist
if (mysqli_num_rows($comprobacion) <= 0) {    
    //Check passwords
    if ($_POST['password'] == $_POST['ConfirmarPassword']) {
        $passwordCrypt = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = $mysqli->query("INSERT INTO usuario (Nombre,Telefono,Password,Email) VALUES ('$nombre','$telefono','$passwordCrypt','$email')");
        echo ($mysqli->error);
        //session_start();
        //$_SESSION["usuario"] = $_POST["email"];
        $mysqli->query("UPDATE usuario SET validado=1 WHERE usuario.Email ='$email'");
        echo ($mysqli->error);
        header("location:../../index.html");

        //redirect to errors/error-register.html
    } else {
        //Create local var Error type
        echo ("<div id='Div1'><span style='color: red;' > Las Contraseñas deben ser iguales</span></div> ");
    }

    //If email exist
} else {
    //redirect to errors/error-register.html
    header("location:../../errors/error-register.html");
}

echo ($mysqli->error);
$mysqli->close();
