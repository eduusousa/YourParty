<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';

    $buffet = new Buffet();

    if(isset($_POST['editIdImage'])){
        $id = $_POST['editIdImage'];
        $atual = $_POST['pathAtual'];
        $foto = $_FILES['editImage'];

        if(isset($id)){

            $buffet->setIdBuffet($id);

            if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){
                
                $buffet->setFotoBuffet($atual);

                if($buffet->updateImage($buffet) == true){
                    $retorna = ['aviso' => true, 'title' => 'Cuidado...','msg' => 'Você não colocou nenhum arquivo'];
                }
    
            } else if(strlen($foto['name']) > 0 && strlen($foto['type']) > 0){
    
                //- - - | IF PARA VER SE O ARQUIVO DEU ERRO |- - -//
                if($foto['error']){
                    $retorna = ['error' => true, 'title' => 'Oops!!', 'msg' => 'Ocorreu um erro.<br>Tente novamente.'];
                }
                        
                $nomeArquivo = $foto['name'];
        
                //Colocando o nome da foto aleatória para não dar conflito no BD & pegando a extensão do arquivo//
                $nomeId = uniqid();
                $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
                $path = "images-db/" . $nomeId . "." . $ext;
                        
                move_uploaded_file($foto['tmp_name'], '../../../'.$path);
    
                $buffet->setFotoBuffet($path);

                if($buffet->updateImage($buffet)){
                    $retorna = ['error' => false, 'title' => 'Atualizada com sucesso!', 'msg' => 'Recarregando a página para salvar as alterações.'];

                }else if($buffet->updateImage($buffet) == false){
                    $retorna = ['error' => true, 'title' => 'Oops!!', 'msg' => 'Ocorreu um erro.<br>Tente novamente.'];
                }
    
            }

            echo json_encode($retorna);

        }

    }