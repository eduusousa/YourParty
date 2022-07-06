<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';

    $buffet = new Buffet();

    if(isset($_POST['excIdBuffet'])){

        $id = $_POST['excIdBuffet'];

        if(isset($id)){


            if( $buffet->delete($id) == true){
                $retorna = ['error' => false, 'title' => 'Excluído com Sucesso!','msg' => 'Recarregando a página para salvar as alterações.'];
    
            }else if( $buffet->delete($id) == false){
                $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha...<br>Tente novamente mais tarde!'];
    
            }
        }

        echo json_encode($retorna);
    }
    


    if(isset($_POST['excItemBuffet'])){

        // header("Location: ../form-item-buffet-2.php");

        $id = $_POST['excItemBuffet'];

        if(isset($id)){

            if($buffet->deleteItem($id) == true){
                $retorna1 = ['error' => false, 'title' => 'Excluído com Sucesso!','msg' => 'Recarregando a página para salvar as alterações.'];
                
            }else if( $buffet->deleteItem($id) == false){
                $retorna1 = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha...<br>Tente novamente mais tarde!'];
            }

        }

        echo json_encode($retorna1);

    }
  
?>