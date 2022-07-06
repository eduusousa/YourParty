<?php

    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php'; 
    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';
    // header("Location: ../form-segurança-2.php");

    if(isset($_SESSION['idEmpresa'])){
        $id = $_SESSION['idEmpresa'];
    }
    
    $seguranca = new Seguranca();
    $empresa = new Empresa();
    

    if(isset($_POST['nomeSeg'])){
        $nome = $_POST['nomeSeg'];
        $valor = $_POST['valorSeg'];
        $qtde = $_POST['qtdeSeg'];

        $foto = $_FILES['fotoSeg'];

        if(!empty($nome)){

            if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){
                $rand = rand(1, 6);
                $path = 'images-random/not-image('.$rand.').png';
                $seguranca->setFotoSeguranca($path);
    
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
    
                $seguranca->setFotoSeguranca($path);
    
            }


            $seguranca->setDescSeguranca($nome);
            $seguranca->setValorSeguranca($valor);
            $seguranca->setQuantidade($qtde);
            $seguranca->setFotoSeguranca($path);

            $empresa->setIdEmpresa($id);
            $seguranca->setEmpresa($empresa);

            if($seguranca->cadastrar($seguranca) == true){

                $retorna = ['error' => false, 'title' => 'Cadastrado com Sucesso!', 'msg' => 'Sua equipe foi cadastrada com sucesso!'];

            }else if($seguranca->cadastrar($seguranca) == false){

                $retorna = ['error' => true, 'title' => 'Error', 'msg' => 'Sua equipe não foi cadastrada.'];
            }

        }


    }
        
    echo json_encode($retorna);




?>