<?php

//Connect to BD
include("../conexionBD.php");

//Get var value
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$passwordS = mysqli_real_escape_string($mysqli, $_POST['password']);
$contador = 0;
$password =  htmlspecialchars($passwordS, $flags = ENT_COMPAT | ENT_HTML401, $encoding = ini_get("default_charset"), $double_encode = true);

//Req
$comprobacion = $mysqli->query("SELECT * from usuario WHERE usuario.Email='$email'");

//If not exists
if (mysqli_num_rows($comprobacion) <= 0) {
    //Redirect to errors/not exists users    
    header("location:../../errors/error-login.html");
    
    //If it exists
} else {
    //Run all array
    $row = $comprobacion->fetch_object();

    //Chech password
    if (password_verify($password, $row->Password)) {
        $contador++;
    }
    
    //Correct password or username
    if ($contador > 0) {
        echo ("Usuario: " . $row->Nombre . " conectado");
        $RoleUsuActive = $row->ID_Role;
        //Start session and set var session
        session_start();
        $_SESSION['usuario'] = array();
        $_SESSION['usuario']['email'] = $email;
        $_SESSION['usuario']['ID_Role'] = $RoleUsuActive;
        print_r($_SESSION['usuario']);

        //change status connection
        $mysqli->query("UPDATE usuario SET Validado=1 WHERE usuario.Email ='$email'");
        echo ($mysqli->error);
        //redirect to products.html
        header("location:../../productos.html");

        //Incorrect password
    } else {
        //Redirect to errors/error-login
        header("location:../../errors/error-login.html");
    }
}

echo ($mysqli->error);
$mysqli->close();
