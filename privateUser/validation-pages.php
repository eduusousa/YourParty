<?php
    session_start();

    if(!isset($_SESSION['idCliente'])){
        unset($_SESSION['idCliente']);

        $_SESSION['message_session'] = 1;
        header("Location: ../../../view/pages/login/login.php");
    }