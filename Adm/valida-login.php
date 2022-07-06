<?php
    $login = $_GET['txLogin'];
    $password = $_GET['txSenha'];
    
    if($login=="adm" && $password=="123"){
        header("Location:index-adm.php");
    } 
    else{
        header("Location:../index.php");
    }
?>