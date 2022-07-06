<?php
    include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
    $decoracao = new Decoracao();

    // header("Location: ../form-decoracao.php");

    if(isset($_POST['editIdDec'])){

        $id = $_POST['editIdDec'];
        $nome = $_POST['editNomeDec'];
        $valor = $_POST['editValorDec'];
        $desc = $_POST['editDescDec'];

        $tipo = $_POST['editTipoDec'];
        $tema = $_POST['editTemaDec'];


        $decoracao->setIdDecoracao($id);

        $decoracao->setNomeDecoracao($nome);
        $decoracao->setValorDecoracao($valor);
        $decoracao->setDescDecoracao($desc);
        $decoracao->setTipoDecoracao($tipo);
        $decoracao->setTemaDecoracao($tema);

        if($decoracao->update($decoracao) == true){
            $retorna = ['error' => false, 'title' => 'Atualizado com Sucesso!','msg' => 'Recarregando a página para salvar as alterações.'];

        }else if($decoracao->update($decoracao) == false){
            $retorna = ['error' => true, 'Oops!' => 'Ocorreu um probleminha.<br>Tente novamente.', 'msg' => $error_toast];

        }

    }

    echo json_encode($retorna);

?>

