<?php  
    session_start();
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

    require_once '/xampp/htdocs/yourParty/Classes/Local.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

    $local = new Local();
    $buffet = new Buffet();
    $decoracao = new Decoracao();
    $seguranca = new Seguranca();
    $retorna = '';

    $idOrcamento = $_POST['idOrcamento'];


    if(isset($_POST['fecharLocal']) && $_POST['fecharLocal'] == 1){

        $local->fecharContrato($idOrcamento, 1);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];
    }

    if(isset($_POST['fecharLocal']) && $_POST['fecharLocal'] == 2){

        $local->fecharContrato($idOrcamento, 2);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];
    }


    
    if(isset($_POST['fecharBuffet']) && $_POST['fecharBuffet'] == 1){

        $buffet->fecharContrato($idOrcamento, 1);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];

    }

    if(isset($_POST['fecharBuffet']) && $_POST['fecharBuffet'] == 2){

        $buffet->fecharContrato($idOrcamento, 2);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];

    }



    if(isset($_POST['fecharDecoracao']) && $_POST['fecharDecoracao'] == 1){

        $decoracao->fecharContrato($idOrcamento, 1);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];

    }

      if(isset($_POST['fecharDecoracao']) && $_POST['fecharDecoracao'] == 2){

        $decoracao->fecharContrato($idOrcamento, 2);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];

    }


    if(isset($_POST['fecharSeguranca']) && $_POST['fecharSeguranca'] == 1){

        $seguranca->fecharContrato($idOrcamento, 1);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];
    }

      if(isset($_POST['fecharSeguranca']) && $_POST['fecharSeguranca'] == 2){

        $seguranca->fecharContrato($idOrcamento, 2);

        $retorna = ['msg' => 'Serviço movido para <b>Orcamentos Concluídos</b>', 'title' => 'Sucesso!'];
    }

    // header("Location: ./index.php");
    echo json_encode($retorna);

?>