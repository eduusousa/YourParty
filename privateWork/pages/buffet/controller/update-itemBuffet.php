<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';

    $buffet = new Buffet();


    if(isset($_POST['editItemBuffet'])){

        // header("Location: ../form-itemBuffet.php");

        $id = $_POST['editItemBuffet'];
        $nome = $_POST['editNomeItem'];

        $buffet->setIdItemBuffet($id);
        $buffet->setNomeItemBuffet($nome);

        if($buffet->updateItem($buffet) == true){

            $retorna = ['error' => false, 'title' => 'Alterado com Sucesso!', 'msg' => 'Recarregando página para salvar as alterações.'];

        } else if($buffet->updateItem($buffet) == false){
            $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];

        }

    }

    echo json_encode($retorna);

?>