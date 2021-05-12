<?php
        session_start();
        if(!isset($_SESSION["usuario"])||($_SESSION['usuario']['ID_Role'] =='2')){
             header("location: http://localhost/workers/crear-producto.php");
        }
        include("../../../php/conexionBD.php");

        $id=$_GET['idProd'];

        

        $userEmail=$_SESSION['usuario'];
        $usuarioUpdated=$mysqli->query("DELETE FROM producto WHERE producto.ID_Producto=$id");    
        echo ($mysqli->error);
        if(!$mysqli->error){
            header("location: ../../../workers/crear-producto.php");
        }
        $mysqli->close();
?>