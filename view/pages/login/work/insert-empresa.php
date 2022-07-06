<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';
    require_once '/xampp/htdocs/yourParty/Classes/Servico.php';

    // header("Location: ../login.php");

    $conexao = new Conexao();
    $empresa = new Empresa();
    $servico = new Servico();

    if(isset($_POST['nomeEmpresa'])){    

        $rand = rand(1, 6);
        $foto = "images-random/not-image($rand)";

        $nome = addslashes($_POST['nomeEmpresa']);
        $telefone = $_POST['telefone'];
        $cnpj = addslashes($_POST['cnpjEmpresa']);

        $endereco = addslashes($_POST['endEmpresa']);
        $bairro = addslashes($_POST['bairroEmpresa']);
        $cep = addslashes($_POST['cepEmpresa']);
        $cidade = addslashes($_POST['cidadeEmpresa']);
        $estado = addslashes($_POST['estadoEmpresa']);
        $numero = addslashes($_POST['numEmpresa']);

        $email = addslashes($_POST['emailEmpresa']);
        $senha = addslashes($_POST['senhaEmpresa']);
        $confirmarSenha = addslashes($_POST['confirmarSenha']);

        $catalogo = $_POST['catalogoEmpresa'];

    }


        if(!empty($nome)){
    
                if($conexao->msgErro == ""){ // tudo certo
                    if($senha == $confirmarSenha){
                        
                        $empresa->setNomeEmpresa($nome);
                        $empresa->setCnpjEmpresa($cnpj);
        
                        $empresa->setEnderecoEmpresa($endereco);
                        $empresa->setNumeroEmpresa($numero);
                        $empresa->setCidadeEmpresa($cidade);
                        $empresa->setBairroEmpresa($bairro);
                        $empresa->setEstadoEmpresa($estado);
                        $empresa->setCepEmpresa($cep);
                        $empresa->setFotoEmpresa($foto);

                        $empresa->setEmailEmpresa($email);
                        $empresa->setSenhaEmpresa(password_hash($senha, PASSWORD_DEFAULT));


                        $empresa->setCatalogoEmpresa($catalogo);

        
                        $empresa->setFoneEmpresa($telefone);
                        
                        if($empresa->cadastrar($empresa) && $empresa->cadastrarFone($empresa) && $empresa->cadastrarCatalogo($empresa)){
                            
                            $retorna = ['error' => false, 'title' => 'Usuário Cadastrado!', 'msg' => 'Faça login e aproveite a YourParty!'];
        
                        }else{

                            $retorna = ['error' => true, 'title' => 'Usuário existente', 'msg' => 'Informe um <b>EMAIL</b> ou <b>CNPJ</b> diferente para cadastrarmos sua conta.'];
                        }
        
                    }else{
                        $retorna = ['error' => false, 'title' => 'Oops!', 'msg' => 'Suas senhas são diferentes.'];
                    }
        
                }else{
                    $retorna = ['error' => false, 'title' => 'Oops!', 'msg' => $conexao->msgErro];
                }
    
            }else{
                $retorna = ['aviso' => true, 'title' => 'Cuidado...', 'msg' => 'Preencha todos os campos!'];
            }

    echo json_encode($retorna);

        
    
    





        