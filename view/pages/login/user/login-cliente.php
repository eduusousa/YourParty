<?php
    session_start();
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';
    require_once '/xampp/htdocs/yourParty/Classes/Cliente.php';

    $conexao = new Conexao();
    $cliente = new Cliente();

    if (isset($_POST['logarCliente'])) {
        $email = addslashes($_POST['loginCliente']);
        $senha = addslashes($_POST['clienteSenha']);
    }
    // verificar se o campo esta vazio
    if (!empty($email) && !empty($senha)) {

        if ($conexao->msgErro == "") {

            if ($cliente->logar($email, $senha)) {

                header("location: ../../../../privateUser/index-user.php");
            } else {

                $_SESSION['message_login'] = 1;
                // EMAIL E SENHAS ERRADAS
                header("location: ../login.php");
            }
        } else {
            $_SESSION['message_login'] = 2;
            // BANCO
            header("location: ../login.php");
        }
    } else {
        $_SESSION['message_login'] = 3;
        // CAMPOS VAZIOS
        header("location: ../login.php");
    }

    


?>
