<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Local.php';

    $local = new Local();

    if (isset($_POST['idLocal'])) {


        $id = $_POST['idLocal'];
        $nome = $_POST['nomeLocal'];
        $valor = $_POST['valorLocal'];

        $cep = $_POST['cepLocal'];
        $end = $_POST['endLocal'];
        $num = $_POST['numLocal'];
        $bairro = $_POST['bairroLocal'];
        $cidade = $_POST['cidadeLocal'];
        $estado = $_POST['estadoLocal'];

        $local->setIdLocal($id);
        $local->setNomeLocal($nome);
        $local->setValorLocal($valor);
        $local->setCepLocal($cep);
        $local->setEnderecoLocal($end);
        $local->setNumeroLocal($num);
        $local->setBairroLocal($bairro);
        $local->setEstadoLocal($estado);
        $local->setCidadeLocal($cidade);


        if($local->update($local) == true){
            $retorna = ['error' => false, 'title' => 'Alterado com Sucesso!', 'msg' => 'Recarregando a página para salvar as alterações.'];

        } else{
            $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];
        }
        
    }

    echo json_encode($retorna);
