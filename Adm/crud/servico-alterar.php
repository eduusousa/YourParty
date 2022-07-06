<?php
    $idServico = $_POST['txIdServico'];
    $servico = $_POST['txServico']; 

    include("../Conexao.php");

    try{
        $stmt = $pdo->prepare("UPDATE tbServico SET nomeServico = ? where idServico = ?");	
        $stmt->bindValue(1, $servico);
        $stmt->bindValue(2, $idServico);
        $stmt->execute();

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    header("location:../Servicos.php");
    ?>