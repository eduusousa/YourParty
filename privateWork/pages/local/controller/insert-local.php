<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Local.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';

    // header("Location: ../form-local-2.php");

    if(isset($_SESSION['idEmpresa'])){
        $idEmp = $_SESSION['idEmpresa'];
    }


    $local = new Local();
    $empresa = new Empresa();

    if(isset($_POST['nomeLocal'])){
        $nome = $_POST['nomeLocal'];
        $valor = $_POST['valorLocal'];
        $foto = $_FILES['fotoLocal'];

        $cep = $_POST['cepLocal'];
        $end = $_POST['endLocal'];
        $num = $_POST['numLocal'];
        $bairro = $_POST['bairroLocal'];
        $cidade = $_POST['cidadeLocal'];
        $estado = $_POST['estadoLocal'];
    }

    if(!empty($nome) && !empty($valor) && !empty($cep)
    && !empty($foto) && !empty($end) && !empty($num) && !empty($bairro) 
    && !empty($cidade) && !empty($estado))
    {

        if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){
            $rand = rand(1, 6);
            $path = 'images-random/not-image('.$rand.').png';
            $local->setFotoLocal($path);
 
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
 
             $local->setFotoLocal($path);
 
        }

        $local->setNomeLocal($nome);
        $local->setValorLocal($valor);
        $local->setCepLocal($cep);
        $local->setEnderecoLocal($end);
        $local->setNumeroLocal($num);
        $local->setBairroLocal($bairro);
        $local->setEstadoLocal($estado);
        $local->setCidadeLocal($cidade);

        $local->setFotoLocal($path);

        $empresa->setIdEmpresa($idEmp);
        $local->setEmpresa($empresa);


        if($local->cadastrar($local) == true){

            $retorna = ['error' => false, 'title' => 'Cadastrado com Sucesso!', 'msg' => 'Seu local foi cadastrado com sucesso!'];
        }else if($local->cadastrar($local) == false){

            $retorna = ['error' => true, 'title' => 'Error', 'msg' => 'Seu local não foi cadastrado!'];
        }

        echo json_encode($retorna);
    }
