<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
    // header("Location: ../form-item-buffet-2.php");

    $buffet = new Buffet();

    if(isset($_POST['nomeBuffet'])){

        $nome = $_POST['nomeBuffet'];
        $item = $_POST['itemBuffet'];

    }

    if(!empty($item)){

        $buffet->setIdBuffet($nome);
        $buffet->setItemBuffet($item);

        if($buffet->cadastrarItem($buffet) == true){

            $retorna = ['error' => false, 'title' => 'Item  Cadastrado!', 'msg' => 'Seus itens foram cadastrados.'];

        }else if($buffet->cadastrarItem($buffet) == false){

            $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um erro na hora do cadastro. <br> Tente novamente.'];
        }

    }

    echo json_encode($retorna);