<?php
    session_start();

    if(!isset($_SESSION['idEmpresa'])){
        
        unset($_SESSION['idEmpresa']);
        
        $_SESSION['message_session'] = 1;
        header("Location: ../../../view/pages/login/login.php");
    }

?>


    