<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';
   
    $seguranca = new Seguranca();

    if(isset($_POST['editIdSeguranca'])){

        $id = $_POST['editIdSeguranca'];
        $atual = $_POST['pathAtual'];
        $foto = $_FILES['editFotoSeguranca'];

        $seguranca->setIdSeguranca($id);

        if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){
            $seguranca->setFotoSeguranca($atual);
            if($seguranca->updateImage($seguranca) == true){
                $retorna = ['aviso' => true, 'title' => 'Cuidado...', 'msg' => 'Você esqueceu de colocar um arquivo.'];
            }

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
                    
            move_uploaded_file($foto['tmp_name'], '../../../'.$path);

            $seguranca->setFotoSeguranca($path);

            if($seguranca->updateImage($seguranca) == true){
                $retorna = ['error' => false, 'title' => 'Atualizada com Sucesso!', 'msg' => 'Recarregando a página para salvar as alterações.'];

            }else{
                $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];

            }
        }

    }

    echo json_encode($retorna);

?>