<?php
    // session_start();
    include_once '../../validation-pages.php';

    echo $_SESSION['idCliente'];

    require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Local.php';
    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';
    require_once '/xampp/htdocs/yourParty/Classes/OrcamentoEvento.php';
    require_once '/xampp/htdocs/yourParty/Classes/Cliente.php';

    header("Location: ./carrinho.php");

    $itemOrcamento = new ItemOrcamento();

    $buffet = new Buffet();
    $decoracao = new Decoracao();
    $local = new Local();
    $seguranca = new Seguranca();

    $orcamentoEvento = new OrcamentoEvento();
    $cliente = new Cliente();

    if(isset($_POST['cliqueiAqui'])){
        if(isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])){

            $itemOrcamento->setAvaliacaoBuffet(0);
            $itemOrcamento->setAvaliacaoDecoracao(0);
            $itemOrcamento->setAvaliacaoLocal(0);
            $itemOrcamento->setAvaliacaoSeguranca(0);

            $itemOrcamento->setConfirmaBuffet(0);
            $itemOrcamento->setConmfirmaDecoracao(0);
            $itemOrcamento->setConfirmaLocal(0);
            $itemOrcamento->setConfirmaSeguranca(0);


            // PARTE QUE VERIFICA SE EXISTE ID DE CADA SERVIÇO
            // SE NÃO EXISTIR, ELE DEIXA COMO NULO
        
            if(isset($_SESSION['carrinho']['buffet'])){
                $id = $_SESSION['carrinho']['buffet']['id'];
                $itemOrcamento->setIdBuffet($id);

            }else if(!isset($_SESSION['carrinho']['buffet'])){
                $itemOrcamento->setIdBuffet(NULL);

            }


            if(isset($_SESSION['carrinho']['local'])){
                $id1 = $_SESSION['carrinho']['local']['id'];
                $itemOrcamento->setIdLocal($id1);

            }else if(!isset($_SESSION['carrinho']['local'])){
                $itemOrcamento->setIdLocal(NULL);
            }


            if(isset($_SESSION['carrinho']['decoracao'])){
                $id = $_SESSION['carrinho']['decoracao']['id'];
                $itemOrcamento->setIdDecoracao($id);

            }else if(!isset($_SESSION['carrinho']['decoracao'])){
                $itemOrcamento->setIdDecoracao(NULL);
            }


            if(isset($_SESSION['carrinho']['seguranca'])){
                $id = $_SESSION['carrinho']['seguranca']['id'];
                $itemOrcamento->setIdSeguranca($id);

            }else if(!isset($_SESSION['carrinho']['seguranca'])){
                $itemOrcamento->setIdSeguranca(NULL);
            }




            if(isset($_SESSION['idCliente']) && !empty($_SESSION['idCliente'])){

                $idCliente = $_SESSION['idCliente'];
                $cliente->setIdCliente($idCliente);
                $orcamentoEvento->setCliente($cliente);

                $valor = $_POST['valorTotal'];
                $orcamentoEvento->setValorTotalOrcamento($valor);

                //Registrar data do orcamento.
                $today = getdate();
                $date = $today['year'] ."/".$today['mon']."/".$today['mday'];

                $orcamentoEvento->setDataOrcamento($date);



                if($orcamentoEvento->cadastrar($orcamentoEvento) == true){

                    $id = $orcamentoEvento->lastId($orcamentoEvento);
                    $itemOrcamento->setIdOrcamentoEvento($id);

                    if($itemOrcamento->cadastrar($itemOrcamento) == true){
                        unset($_SESSION['carrinho']);
                        $_SESSION['compra_finalizada'] = 1;
        
                    }else{
                        $_SESSION['compra_finalizada'] = 2;

                    }
                }
            }



        }else if(isset($_SESSION['carrinho']) && empty($_SESSION['carrinho'])){

            $_SESSION['compra_finalizada'] = 2;
        }

    }

        

    



