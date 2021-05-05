<?php

if (isset($_POST['reset-password-submit'])) {

    $selector =  $_POST['selector'];
    $validator =  $_POST['validator'];
    $pwd =  $_POST['pwd'];
    $pwdR =  $_POST['pwd-repeat'];

    if (empty($pwd) || empty($pwdR)) {
        // header("location: crear-nueva-pass.php");
        header("Location: crear-nueva-pass.php?selector=" . $selector . "&validator=" . $validator);
        exit();
    } else if ($pwd != $pwdR) {
        header("Location: crear-nueva-pass.php?selector=" . $selector . "&validator=" . $validator);
        exit();
    }


    $currenDate = date("U");

    require("../conexionBD.php");
    include("../permissons.php");

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >=?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // echo "Ha habido un error";
        //exit();
        die("Ha habido un error");
    } else {
        //aqui le decimos en que convertiremos el ? en la variable $sql
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currenDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Vuelve a intentarlo";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if (!$tokenCheck) {
                echo "Vuelve a intentarlo";
                exit();
            } else if ($tokenCheck) {

                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE emailUsers=?";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    die("Ha habido un error");
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "Ha habido un error";
                        exit();
                    } else {

                        $sql = "UPDATE usuario SET Password=? WHERE Email=?";

                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            // echo "Ha habido un error";
                            //exit();
                            die("Ha habido un error");
                        } else {

                            $newpwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                            //aqui le decimos en que convertiremos el ? en la variable $sql
                            mysqli_stmt_bind_param($stmt, "ss", $newpwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE pwdReset WHERE pwdResetEmail=?";

                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                die("Ha habido un error");
                            } else {

                                //aqui le decimos en que convertiremos el ? en la variable $sql
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../../index.php?newpwd=passwordupdated");
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("location:../../index.html");
}
