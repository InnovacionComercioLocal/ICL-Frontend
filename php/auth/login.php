<?php

include("../conexionBD.php");

$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$passwordS = mysqli_real_escape_string($mysqli, $_POST['password']);
$contador = 0;
$password =  htmlspecialchars($passwordS, $flags = ENT_COMPAT | ENT_HTML401, $encoding = ini_get("default_charset"), $double_encode = true);

$comprobacion = $mysqli->query("SELECT * from usuario WHERE usuario.Email='$email'");

if (mysqli_num_rows($comprobacion) <= 0) {
    echo ("Login no existe o Contraseña incorrecta");
    echo 'El email o password es incorrecto, <a href="../../index.html">vuelva a intenarlo</a>.<br/>';
} else {
    $row = $comprobacion->fetch_object();

    echo $password;


    if (password_verify($password, $row->Password)) {
        $contador++;
?>

        <script type="text/javascript">
            alert("Contraseña Correcta");
        </script>

    <?php

    }


    if ($contador > 0) {
        echo ("Usuario: " . $row->Nombre . " conectado");
        $RoleUsuActive = $row->ID_Role;
        session_start();
        $_SESSION['usuario'] = array();
        $_SESSION['usuario']['email'] = $email;
        $_SESSION['usuario']['ID_Role'] = $RoleUsuActive;
        print_r($_SESSION['usuario']);


        $mysqli->query("UPDATE usuario SET Validado=1 WHERE usuario.Email ='$email'");
        echo ($mysqli->error);
        header("location:../../menus.html");
    } else {
        echo $password;
    ?>

        <script type="text/javascript">
            alert("Contraseña incorrecta");
        </script>


<?php
        echo 'El email o password es incorrecto, <a href="../../index.html">vuelva a intenarlo</a>.<br/>';
    }
}


echo ($mysqli->error);
$mysqli->close();
?>