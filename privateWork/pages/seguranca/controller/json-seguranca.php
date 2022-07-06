<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';

    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

    $seguranca = new Seguranca();

    if(isset($_GET['idSeguranca'])){

        $id = $_GET['idSeguranca'];
        $list = $seguranca->listarUpdate($id);
    }
    echo json_encode($list);



?>