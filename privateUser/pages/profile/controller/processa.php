<?php 
    session_start();
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

    $item = new ItemOrcamento();

    if(isset($_POST['avaliarLocal'])){

        if (!empty($_POST['estrela'])) {
            $estrela = $_POST['estrela'];
            $idOrcamento = $_POST['idOrcamento'];

            if($item->localAvaliation($idOrcamento, $estrela) == true){

                $_SESSION['avaliacao'] = 1;

            }else{

                $_SESSION['avaliacao'] = 2;

            }
        
        }else {

            // Avisar que as estrelas estão vazias
            $_SESSION['avaliacao'] = 3;

        }

        header("Location: ../perfil-cliente.php");
    }


    if(isset($_POST['avaliarBuffet'])){

        if(!empty($_POST['estrela'])){
            $estrela = $_POST['estrela'];
            $idOrcamento = $_POST['idOrcamento'];

            if($item->buffetAvaliation($idOrcamento, $estrela) == true){
                $_SESSION['avaliacao'] = 1;

            }else{
                $_SESSION['avaliacao'] = 2;

            }

        }else {
            $_SESSION['avaliacao'] = 3;

        }

        header("Location: ../perfil-cliente.php");

    }


    if(isset($_POST['avaliarDecoracao'])){

        if(!empty($_POST['estrela'])){
            $estrela = $_POST['estrela'];
            $idOrcamento = $_POST['idOrcamento'];

            if($item->decoracaoAvaliation($idOrcamento, $estrela) == true){
                $_SESSION['avaliacao'] = 1;

            }else{
                $_SESSION['avaliacao'] = 2;

            }

        }else {
            $_SESSION['avaliacao'] = 3;
        }

        header("Location: ../perfil-cliente.php");

    }


    if(isset($_POST['avaliarSeguranca'])){

        if(!empty($_POST['estrela'])){
            $estrela = $_POST['estrela'];
            $idOrcamento = $_POST['idOrcamento'];

            if($item->segurancaAvaliation($idOrcamento, $estrela) == true){
                $_SESSION['avaliacao'] = 1;

            }else{
                $_SESSION['avaliacao'] = 2;

            }

        }else {
            $_SESSION['avaliacao'] = 3;

        }
        
        header("Location: ../perfil-cliente.php");
    }

?>