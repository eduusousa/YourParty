<?php
    $id = $_GET['id'];
    
    include("../Conexao.php");

    $stmt = $pdo->prepare("DELETE FROM tbServico WHERE idServico=".$id);	
	$stmt ->execute();

    header("location:../Servicos.php");
?>
