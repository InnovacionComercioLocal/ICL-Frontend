<?php
header('Access-Control-Allow-Origin: *');

if (isset($_POST['reset-password-submit'])) {

    $selector =  $_POST['selector'];
    $validator =  $_POST['validator'];
    $pwd =  $_POST['pwd'];
    $pwdR =  $_POST['pwd-repeat'];

    $currentDate = date("U");


    echo $currentDate . "<br>";
    echo $selector . "<br>";
    echo $validator . "<br>";
    echo $pwd . "<br>";
    echo $pwdR . "<br>";

    if (empty($pwd) || empty($pwdR)) {
        // header("location: crear-nueva-pass.php");
        header("Location: crear-nueva-pass.php?selector=" . $selector . "&validator=" . $validator);
        exit();
    } else if ($pwd != $pwdR) {
        header("Location: crear-nueva-pass.php?selector=" . $selector . "&validator=" . $validator);
        exit();
    }


    require '../conexionBD.php';


    $sq = "SELECT * FROM pwdReset WHERE pwdReset.pwdResetExpires >= ?;";


    $stmt = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($stmt, $sq)) {
        die("Ha habido un error 1");
    } else {

        //aqui le decimos en que convertiremos el ? en la variable $sql
        mysqli_stmt_bind_param($stmt, "s", $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);


        if (!$row = mysqli_fetch_assoc($result)) {
            echo $currentDate . "<br>";
            echo $row["pwdResetToken"];
            echo "Vuelve a enviar la peticion para cambiar la contraseña";
            exit();
        } else {
            echo  $row["pwdResetToken"];
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === true) {
                echo "token incorrecto";
                exit();
            } else if ($tokenCheck === false) {

                //a partir del token buscamos al usuario que quiere resetear la contraseña
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM usuario WHERE Email=?";

                $stmt = mysqli_stmt_init($mysqli);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    die("Ha habido un error");
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "correo no encontrado";
                        exit();
                    } else {

                        $sql = "UPDATE usuario SET Password=? WHERE Email=?";

                        $stmt = mysqli_stmt_init($mysqli);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            die("Ha habido un error aa");
                        } else {

                            $newpwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                            //aqui le decimos en que convertiremos el ? en la variable $sql
                            mysqli_stmt_bind_param($stmt, "ss", $newpwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            //$sql = "DELETE pwdReset WHERE pwdReset.pwdResetEmail=?;";
                            $sql2 = $mysqli->query("DELETE pwdReset WHERE pwdReset.pwdResetEmail='$tokenEmail';");
                            if (!$sql2) {
                                die("Ha habido un error, no se ha podido borrar '$tokenEmail'");
                                echo $mysqli->error;
                            } else {
                                header("Location: ../../index.php");
                            }

                            // $stmt = mysqli_stmt_init($mysqli);

                            // if (!mysqli_stmt_prepare($stmt, $sql)) {
                            //     die("Ha habido un error, no se ha podido borrar '$tokenEmail'");
                            //     echo $mysqli->error;
                            // } else {

                            //     //aqui le decimos en que convertiremos el ? en la variable $sql
                            //     mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            //     mysqli_stmt_execute($stmt);
                            //     header("Location: ../../index.php");
                            // }
                        }
                    }
                }
            }
        }
    }
} else {
    header("location:../../index.html");
}
