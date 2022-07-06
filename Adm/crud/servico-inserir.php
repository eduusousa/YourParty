
<?php

$servico = $_POST['txServico'];

include("../Conexao.php");

$stmt = $pdo->prepare("insert into tbServico values(null,'$servico');");	
$stmt ->execute();

header("location:../Servicos.php");

?>