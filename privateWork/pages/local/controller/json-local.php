<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Local.php';
    $local = new Local();

    if(isset($_GET['idLocal'])){

        $id = $_GET['idLocal'];
        $list = $local->listarUpdate($id);

    }
    echo json_encode($list);
