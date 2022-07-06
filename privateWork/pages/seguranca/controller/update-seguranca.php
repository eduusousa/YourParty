<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

    $seg = new Seguranca();

    if(isset($_POST['editIdSeg'])){

        $id = $_POST['editIdSeg'];
        $nome = $_POST['editNomeSeg'];
        $valor = $_POST['editValorSeg'];
        $qtde = $_POST['editQtdeSeg'];

        if(!empty($nome)){

            $seg->setIdSeguranca($id);
            $seg->setDescSeguranca($nome);
            $seg->setValorSeguranca($valor);
            $seg->setQuantidade($qtde);


            if($seg->update($seg) == true){

                $retorna = ['error' => false, 'title' => 'Atualizado com Sucesso', 'msg' => 'Recarregando a página para salvar as alterações.'];
                
            } else if($seg->update($seg) == false){
                
                $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Ocorreu um probleminha.<br>Tente novamente.'];
                
            }

        }
    }

    echo json_encode($retorna);
?>