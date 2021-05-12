<?php
$Titular = $_POST['titu'];
$NumCard = $_POST['numtar'];
$Hora = $_POST['hora'];
$comment = $_POST['coment'];
$CodSec = $_POST['codeS'];

echo ("Titular: ".$Titular."<br/>"."Numero targeta: ".
$NumCard."<br/>"."Hora de entrega: ".
$Hora."<br/>"."Comentario: ".$comment."<br/>"."Codigo secreto: ".$CodSec);


?>