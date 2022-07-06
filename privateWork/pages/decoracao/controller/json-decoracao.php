<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';

    $decoracao = new Decoracao();

    if(isset($_GET['idDecoracao'])){

        $id = $_GET['idDecoracao'];
        $list = $decoracao->listarUpdate($id);

    }

    echo json_encode($list);