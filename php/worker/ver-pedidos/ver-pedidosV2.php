<?php
include("../../conexionBD.php");
header('Access-Control-Allow-Origin: *');
$registrosPorPag = 5;

$pagina = $_GET["pagina"];

//$empezar_desde = ($pagina - 1) * $registrosPorPag;

//Consulta Linea Pedidos
$consLineaPedido = "SELECT * FROM `linea_pedido`";
$resultLineaPedido = $mysqli->query($consLineaPedido);
$rowLineaPedido = $resultLineaPedido->fetch_array();
$pedi = $rowLineaPedido['ID_Pedido'];
$prod = $rowLineaPedido['ID_Producto'];

//echo("Pedido id: ".$pedi."<br/>"."Producto id: ".$prod);

//Consulta productos
$consProducto = "SELECT * FROM `producto` WHERE ID_Producto=$prod";
$resultProducto = $mysqli->query($consLineaPedido);

//Consulta Pedidos
$consPedido = "SELECT * FROM pedido WHERE ID_Pedido=$pedi";
$resultPedido = $mysqli->query($consPedido);
$rowPedido = $resultPedido->fetch_array();
$userNameId = $rowPedido['ID_Usuario'];
$statusId = $rowPedido['ID_Estado'];
$Comentario = $rowPedido['Comentario'];
$ID_pedido = $rowPedido['ID_Pedido'];
$precioTotal = $rowPedido['PrecioTotal'];
$hora = $rowPedido['Hora'];

//echo("<br/>");
//echo("Comentario: ".$Comentario."<br/>"."Usuario Id: ".$userNameId."<br/>"."Status id: ".$statusId."<br/>"."Precio total: ".$precioTotal."<br/>"."Hora: ".$hora);

//Consulta Usuarios
$consUsuario = "SELECT * FROM usuario WHERE ID_Usuario=$userNameId";
$resultUsuario = $mysqli->query($consUsuario);
$rowUsuario = $resultUsuario->fetch_array();
$userName = $rowUsuario['Nombre'];
$Direccion = $rowUsuario['Direccion'];
$Telefono = $rowUsuario['Telefono'];

//echo("<br/>");
//echo("Usuario: ".$userName."<br/>"."Direccion: ".$Direccion."<br/>"."Telefono: ".$Telefono);

//Consulta Estado pedido
$consEstadoPedido = "SELECT * FROM estado_pedido WHERE ID_Estado=$statusId";
$resulEstadoPedido = $mysqli->query($consEstadoPedido);
$rowEstadoPedido = $resulEstadoPedido->fetch_array();
$status = $rowEstadoPedido['Estado'];

//echo("<br/>");
//echo("Estado pedido: ".$status);

//$result = $mysqli->query("");
echo ($mysqli->error);

echo ($ID_pedido . " / " . $Comentario. " / " . $userName .
     " / " . $precioTotal ."/".$hora."/".$status.
     "/".$Direccion."/".$Telefono. "//");

/*while ($row = $resultPagianado->fetch_object()) {
    echo ($ID_pedido . " / " . $Comentario. " / " . $userName .
     " / " . $precioTotal ."/".$hora."/".$status.
     "/".$Direccion."/".$Telefono. "//");
    }*/

echo ("#");
//echo ($total_paginas);

$resultProducto->free();
$resultLineaPedido->free();
$resultPedido->free();
$resultUsuario->free();
$resulEstadoPedido->free();
$mysqli->close();

?>