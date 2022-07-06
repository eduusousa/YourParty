<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Local.php';

    $local = new Local();

    if(isset($_POST['excIdLocal'])){
        // header("Location: ../form-local.php");
        $id = $_POST['excIdLocal'];

        if(isset($id)){

            if($local->delete($id) == true){
                $retorna = ['error' => false, 'title' => 'Excluído com Sucesso!', 'msg' => 'Recarregando a página para salvar as alterações.'];
    
            }else if($local->delete($id) == false){

                $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];
            }
        }
    }
    
    echo json_encode($retorna);