
<?php
//incluir archivor necesarios
require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
require '../../phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    header('Access-Control-Allow-Origin: *');

    $userEmail = $_POST['email'];

    //borra el token de la bd si hay alguno, de manera que no tengamos 2 tokens activados
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";

    //statement
    $stmt = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("Ha habido un error borrando tokens");
    } else {
        //aqui le decimos en que convertiremos el ? en la variable $sql
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //  echo "Ha habido un error";
        //exit();
        die("Ha habido un error el insertar");
    }

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    //aqui le decimos en que convertiremos el ? en la variable $sql
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
    //  $mysqli->close();

    //instancia phpmailer
    $mail = new PHPMailer();

    // try {

    $mail->isSMTP();

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->Host = "smtp.gmail.com";

    $mail->SMTPAuth = "true";

    $mail->SMTPSecure = "tls";

    $mail->Port = "587";

    $mail->Username = "innovacioncomerciolocal@gmail.com";

    $mail->Password = "qibt fwnd wpny dgko";

    $mail->CharSet = 'UTF-8';


    //quién enviará el correo
    $mail->setFrom("innovacioncomerciolocal@gmail.com", "ICL");


    $mail->addAddress($userEmail);

    $mail->addReplyTo("innovacioncomerciolocal@gmail.com");


    $mail->isHTML(true);


    $mail->Subject = "Resetea tu contraseña";


    $mail->Body = '<p>Hemos recibido una petición para resetar tu contraseña</p>
                    <p>Aqui tienes el link para resetear tu contraseña : <br>
                    <a href="' . $url3 . '">' . $url3 . '</a></p>';

    // $mail->Body = 'Hemos recibido una petición para resetar tu contraseña
    //                 Aqui tienes el link para resetear tu contraseña
    //                 <a href="' . $url3 . '">' . $url3 . '</a></p>';



    if (!$mail->send()) {
        echo "error al enviar correo";
        echo $mail->ErrorInfo;
    } else {
        echo "Enviado";
        header("location:../../recuperarPass.php?reset=success");
    }

    // } catch (Exception $e) {
    //     /* PHPMailer exception. */
    //     echo "hola";
    //     echo $e->errorMessage();
    // } catch (\Exception $e) {
    //     echo "adios";
    //     /* PHP exception (note the backslash to select the global namespace Exception class). */
    //     echo $e->getMessage();
    // }


    // //a quien le enviamos el email
    // $to = $userEmail;

    // //mensaje que se ve al recibir el email
    // $subject = "Resetea tu contraseña";

    // $message = '<p>Hemos recibido una petición para resetar tu contraseña</p>';

    // $message .= '<p>Aqui tienes el link para resetear tu contraseña : <br>';

    // $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    // //cabecera del email
    // $headers = "From:  icl <icl@gmail.com>\r\n";
    // $headers .= "Reply to: icl@gmail.com\r\n";
    // $headers .= "Content-type: text/html\r\n";

    // $mail($to, $subject, $message, $headers);

} else {
    header("location:../../index.html");
}
