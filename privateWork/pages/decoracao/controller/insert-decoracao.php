<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
    // header("Location: ../form-decoracao-2.php");



    $decoracao = new Decoracao();
    $empresa = new Empresa();

    if(isset($_POST['nomeDec'])){

        $nome = $_POST['nomeDec'];
        $valor = $_POST['valorDec'];
        $desc = $_POST['descDec'];

        $tipo = $_POST['tipoDec'];
        $tema = $_POST['temaDec'];
        $foto = $_FILES['fotoDec'];



        if(isset($_SESSION['idEmpresa'])){
            $id = $_SESSION['idEmpresa'];
        }

    }


    if(!empty($tipo) && !empty($tema) && !empty($foto) && !empty($id)){

    
        if(strlen($foto['name']) == 0 && strlen($foto['type']) == 0){

            $rand = rand(1, 6);
            $path = 'images-random/not-image('.$rand.').png';
            $decoracao->setFotoDecoracao($path);
 
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
 
             $decoracao->setFotoDecoracao($path);
 
        }

        $decoracao->setNomeDecoracao($nome);
        $decoracao->setValorDecoracao($valor);
        $decoracao->setDescDecoracao($desc);
        $decoracao->setTipoDecoracao($tipo);
        $decoracao->setTemaDecoracao($tema);

        $empresa->setIdEmpresa($id);
        $decoracao->setEmpresa($empresa);

        if($decoracao->cadastrar($decoracao) == true){

            $retorna = ['error' => false, 'title' => 'Decoração Cadastrada!', 'msg' => 'Sua decoração foi cadastrada com sucesso.'];

        }else if($decoracao->cadastrar($decoracao) == false){

            $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Sua decoração não foi cadastrada.'];

        }

    }
    
    echo json_encode($retorna);
    