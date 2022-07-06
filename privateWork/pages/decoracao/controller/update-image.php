<?php  
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';

    $decoracao = new Decoracao();

    if(isset($_POST['editIdImage'])){
        $id = $_POST['editIdImage'];
        $atual = $_POST['pathAtual'];
        $foto = $_FILES['editImage'];

        $decoracao->setIdDecoracao($id);

        if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){

            $decoracao->setFotoDecoracao($atual);
            if($decoracao->updateImage($decoracao) == true){
                $retorna = ['aviso' => true, 'title' => 'Cuidado...', 'msg' => 'Você não colocou nenhum arquivo.'];
            }
    
    
        } else if (strlen($foto['name']) > 0 && strlen($foto['type']) > 0) {
    
            if ($foto['error']) {
                $retorna = ['error' => true, 'msg' => 'Erro no arquivo'];
            }
    
            $nomeArquivo = $foto['name'];
    
            //Colocando o nome da foto aleatória para não dar conflito no BD & pegando a extensão do arquivo//
            $nomeId = uniqid();
            $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
            $path = "images-db/" . $nomeId . "." . $ext;
    
            move_uploaded_file($foto['tmp_name'], '../../../'.$path);
    
            $decoracao->setFotoDecoracao($path);
    
            if($decoracao->updateImage($decoracao) == true){
                $retorna = ['error' => false, 'title' => 'Atualizada com Sucesso!', 'msg' => 'Recarregando a página para salvar as alterações.'];
    
            }else if($decoracao->updateImage($decoracao) == false){
                $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];
    
            }
        }


        echo json_encode($retorna);

    }
    


    