<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';

    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';

    // header("Location: ../form-buffet-2.php");

    $buffet = new Buffet();
    $empresa = new Empresa();

    if(isset($_POST['nomeBuffet'])){
        $nome  = $_POST['nomeBuffet'];
        $desc  = $_POST['descBuffet'];
        $valor = $_POST['valorBuffet'];

        $foto  = $_FILES['fotoBuffet'];
    }

    if(isset($_SESSION['idEmpresa'])){
        $id = $_SESSION['idEmpresa'];
    }


    if(!empty($nome) && !empty($valor)){

        if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){

            $rand = rand(1, 6);
            $path = 'images-random/not-image('.$rand.').png';
            $buffet->setFotoBuffet($path);

        } else if(strlen($foto['name']) > 0 && strlen($foto['type']) > 0){

            //- - - | IF PARA VER SE O ARQUIVO DEU ERRO |- - -//
            if($foto['error']){
                die("error");
            }
                    
            $nomeArquivo = $foto['name'];
    
            //Colocando o nome da foto aleatória para não dar conflito no BD & pegando a extensão do arquivo//
            $nomeId = uniqid();
            $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
            $path = "images-db/" . $nomeId . "." . $ext;
                    
            move_uploaded_file($foto['tmp_name'], '../../../'.$path);

            $buffet->setFotoBuffet($path);

        }

    
        
        $empresa->setIdEmpresa($id);
        $buffet->setEmpresa($empresa);

        $buffet->setNomeBuffet($nome);
        $buffet->setDescricaoBuffet($desc);
        $buffet->setValorBuffet($valor);
    
        if($buffet->cadastrar($buffet) == true){

            $retorna = ['error' => false, 'title' => 'Cadastrado com Sucesso!', 'msg' => 'O Buffet foi cadastrado com sucesso!'];

        } else if($buffet->cadastrar($buffet) == false){
            $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];
        }
        
    }

    
    echo json_encode($retorna);
?>
