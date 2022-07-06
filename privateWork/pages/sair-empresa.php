<?php

    session_start();
    unset($_SESSION['idEmpresa']);

    header("location: ../../view/pages/login/login.php");

?>