<?php
include("../../conexionBD.php");
header('Access-Control-Allow-Origin: *');
$registrosPorPag = 5;

$pagina = $_GET["pagina"];

$empezar_desde = ($pagina - 1) * $registrosPorPag;

//$result = $mysqli->query("SELECT * from pedido");
//$result = $mysqli->query("SELECT 'p.ID_Pedido',p.Comentario,u.Nombre,p.PrecioTotal,p.Hora,e.Estado,u.Direccion,u.Telefono FROM pedido p, usuario u, estado_pedido e WHERE p.ID_Usuario=u.ID_Usuario AND p.ID_Estado=e.ID_Estado");
$result = $mysqli->query("SELECT `linea_pedido`.`ID_Producto`, `linea_pedido`.`Cantidad`, `pedido`.`ID_Pedido`, `pedido`.`Comentario`, `pedido`.`Hora`, `pedido`.`PrecioTotal`, `usuario`.`Nombre`, `estado_pedido`.`Estado`, `usuario`.`Direccion`, `usuario`.`Telefono`
FROM `linea_pedido` 
	LEFT JOIN `pedido` ON `linea_pedido`.`ID_Pedido` = `pedido`.`ID_Pedido` 
	LEFT JOIN `usuario` ON `pedido`.`ID_Usuario` = `usuario`.`ID_Usuario` 
	LEFT JOIN `estado_pedido` ON `pedido`.`ID_Estado` = `estado_pedido`.`ID_Estado`;");
echo ($mysqli->error);

$numRegistros = mysqli_num_rows($result);

$total_paginas = ceil($numRegistros / $registrosPorPag);

//$resultPagianado = $mysqli->query("SELECT * from pedido,usuario, estado_pedido LIMIT $empezar_desde,$registrosPorPag");
while ($row = $result->fetch_object()) {
    echo ($row->ID_Pedido . " | " . $row->Comentario. " | " . $row->Nombre .
     " | " . $row->PrecioTotal ."|".$row->Hora."|".$row->Estado.
     "|".$row->Direccion."|".$row->Telefono. "||");
}
echo ("#");
echo ($total_paginas);

$result->free();
$mysqli->close();

?>