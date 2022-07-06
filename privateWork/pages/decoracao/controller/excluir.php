<?php
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';

    $decoracao = new Decoracao();

    if(isset($_POST['excDecoracao'])){
        $id = $_POST['excDecoracao'];

        if(isset($id)){

            if($decoracao->delete($id) == true){
                $retorna = ['error' => false, 'title' => 'Excluído com Sucesso!', 'msg' => 'Recarregando página para salvar as alterações.'];

            }else if($decoracao->delete($id) == false){
                $retorna = ['error' => true, 'title' => 'Oops!','msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];
            }

        }

        echo json_encode($retorna);
    }

    
    if(isset($_POST['excItem'])){

        $id = $_POST['excItem'];

        if(isset($id)){
            if($decoracao->deleteItem($id) == true){
                $retorna1 = ['error' => false, 'title' => 'Excluído com Sucesso' , 'msg' => 'Recarregando página para salvar as alterações.'];

            } else if($decoracao->deleteItem($id) == false){
                $retorna1 = ['error' => true, 'title' => 'Oops!','msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];

            }
        }
        echo json_encode($retorna1);
    }