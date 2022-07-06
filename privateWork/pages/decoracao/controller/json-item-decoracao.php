<?php 
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';

    // header("Location: ../form-itemDecoracao.php");

    $decoracao = new Decoracao();

    if(isset($_GET['idItem'])){

        $id= $_GET['idItem'];

        $list = $decoracao->item($id);

    }

    echo json_encode($list);

