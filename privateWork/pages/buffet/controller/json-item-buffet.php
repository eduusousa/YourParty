<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';

    $buffet = new Buffet();

    if(isset($_GET['idItem'])){

        $id = $_GET['idItem'];
        $list = $buffet->item($id);

    }

    echo json_encode($list);