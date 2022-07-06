<?php
    session_start();
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';

    $conexao = new Conexao();
    $empresa = new Empresa();

    // Verificar se clicou o botão
    if (isset($_POST['logarEmpresa'])) {

        $email = addslashes($_POST['loginEmpresa']);
        $senha = addslashes($_POST['empresaSenha']);

        // verificar se o campo esta vazio
        if (!empty($email) && !empty($senha)) {

            if ($conexao->msgErro == "") {
                if ($empresa->logar($email, $senha)) {

                    header("location: ../../../../privateWork/pages/dashboard/dashboard2.php");

                } else {
                    $_SESSION['message_login'] = 1;
                    header("location: ../login.php");
                    // EMAIL E SENHAS ERRADAS
                }
            } else {
                $_SESSION['message_login'] = 2;
                header("location: ../login.php");
                    // BRANCO
            }
        } else {
            $_SESSION['message_login'] = 3;
            // algums campo vazio
            header("location: ../login.php");
        }
     
        

    }

?>
