<?php
session_start();
unset($_SESSION['idCliente']);
header("Location: ../index.php");
?>
