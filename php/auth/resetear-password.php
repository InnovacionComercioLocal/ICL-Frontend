<?php


    if(isset($_POST['reset-password-submit'])){

        $selector =  $_POST['selector'];
        $validator =  $_POST['validator'];
        $pwd =  $_POST['pwd'];
        $pwdR =  $_POST['pwd-repeat'];

        if (empty($pwd) || empty($pwdR)) {
           // header("location: crear-nueva-pass.php");
           header("Location: crear-nueva-pass.php?selector=" . $selector . "&validator=" . $validator);
        }
    
    }else{
        header("location:../../index.html");
    }
