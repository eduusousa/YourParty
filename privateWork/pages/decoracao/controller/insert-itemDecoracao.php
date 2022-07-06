<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';

    // header("Location: ../form-item-decoracao-2.php");

    $decoracao = new Decoracao();

    if(isset($_POST['itemDecoracao'])){

        $dec = $_POST['idDecoracao'];
        $itens = $_POST['itemDecoracao'];

    }

    if(!empty($itens) && !empty($dec)){

        $decoracao->setItemDecoracao($itens);
        
        $decoracao->setIdDecoracao($dec);

       if($decoracao->cadastrarItem($decoracao) == true){

            $retorna = ['error' => false, 'title' => 'Cadastrados com Sucesso!', 'msg' => 'Seus itens foram cadastrados com sucesso!'];

       }else if($decoracao->cadastrarItem($decoracao) == false){

        $retorna = ['error' => true, 'title' => 'Oop!', 'msg' => 'Ocorreu um probleminha. <br> Tente novamente.'];

       }

    }

    echo json_encode($retorna);
