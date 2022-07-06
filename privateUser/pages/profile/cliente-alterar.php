<?php 
    include_once '../../validation-pages.php';

    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';

    $id= $_POST['cxId'];
    $nome= $_POST['cxNome'];
    $email= $_POST['cxEmail'];
    $telefone= $_POST['cxTelefone'];
    $foto = $_FILES['arquivo'];

    if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){

        $imagem = $_POST['foto1'];

    } else if(strlen($foto['name']) > 0 && strlen($foto['type']) > 0){

        //- - - | IF PARA VER SE O ARQUIVO DEU ERRO |- - -//
        if($foto['error']){
            die("error");
        }
                
        $nomeArquivo = $foto['name'];

        //Colocando o nome da foto aleatória para não dar conflito no BD & pegando a extensão do arquivo//
        $nomeId = uniqid();
        $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $path = "images-db/" . $nomeId . "." . $ext;
                
        move_uploaded_file($foto['tmp_name'], '../../'.$path);

        $imagem = $path;

    }


try{
    $conexao = Conexao::conectar();
   $stmt = $conexao -> prepare ("update tbCliente set nomeCliente='$nome', emailCliente='$email', fotoCliente='$imagem'   where idCliente='$id'");
   $stmt -> execute();



   // echo "<script> alert ('Dados alterados com sucesso'); </script>";
    echo "<script> window.location = 'perfil-cliente.php'</script>";
}
catch(PDOException $e){
     echo"Erro " . $e -> getMessage();

     
}

try{
    $conexao = Conexao::conectar();
   $stmt = $conexao -> prepare ("update tbFoneCliente set numeroFoneCliente='$telefone' where idCliente='$id'");
    $stmt -> execute();



    echo "<script> alert ('Dados alterados com sucesso'); </script>";
    echo "<script> window.location = 'perfil-cliente.php'</script>";
}
catch(PDOException $e){
     echo"Erro " . $e -> getMessage();

     
}




?>