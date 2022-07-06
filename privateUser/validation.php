<?php
    session_start();

    if(!isset($_SESSION['idCliente'])){
        unset($_SESSION['idCliente']);
        session_destroy();

        header("Location: ../../view/pages/login/login.php");
    }