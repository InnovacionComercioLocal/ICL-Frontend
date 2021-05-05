<?php

if (isset($_POST["boton-peticion-reset"])) {

    //token del usuario que se guardara en la bd
    $selector = bin2hex(random_bytes(8));

    //identifica al usuario después de volver a la pagina comparando en la bd
    $token = random_bytes(32);

    //url de la pagina
    // $url2 = "www.icl.net/php/auth/crear-nueva-pass.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $url3 = "https://pizzeriagirona.000webhostapp.com/php/auth/crear-nueva-pass.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $url = "localhost/php/auth/crear-nueva-pass.php?selector=" . $selector . "&validator=" . bin2hex($token);

    //tiempo de expiracion del token
    $expires = date("U") + 1800;

    require '../conexionBD.php';

    $userEmail = $_POST['email'];

    //borra el token de la bd si hay alguno, de manera que no tengamos 2 tokens activados
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";

    //statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("Ha habido un error");
    } else {
        //aqui le decimos en que convertiremos el ? en la variable $sql
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //  echo "Ha habido un error";
        //exit();
        die("Ha habido un error");
    }

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    //aqui le decimos en que convertiremos el ? en la variable $sql
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    //  $mysqli->close();

    //a quien le enviamos el email
    $to = $userEmail;

    //mensaje que se ve al recibir el email
    $subject = "Resetea tu contraseña";

    $message = '<p>Hemos recibido una petición para resetar tu contraseña</p>';

    $message .= '<p>Aqui tienes el link para resetear tu contraseña : <br>';

    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    //cabecera del email
    $headers = "From:  icl <icl@gmail.com>\r\n";
    $headers .= "Reply to: icl@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    $mail($to, $subject, $message, $headers);

    header("location:../../recuperarPass.php?reset=success");
} else {
    header("location:../../index.html");
}
