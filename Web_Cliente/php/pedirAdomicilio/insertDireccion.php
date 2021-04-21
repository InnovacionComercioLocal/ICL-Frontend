<?php
         session_start();
         if(!isset($_SESSION["usuario"])){
             header("location: http://localhost/Proyecto/Web_Cliente/php/auth/index.html");
         }
         include("../conexionBD.php");

        $userDireccion=$_GET['userDireccion'];

        
        $userEmail=$_SESSION['usuario']['email'];
        $usuarioUpdated=$mysqli->query("UPDATE usuario SET Direccion='$userDireccion' WHERE usuario.Email='$userEmail'");    
        echo ($mysqli->error);
        if(!$mysqli->error){
            header("location: ../../index.html");
        }
        
        $mysqli->close();
    ?>