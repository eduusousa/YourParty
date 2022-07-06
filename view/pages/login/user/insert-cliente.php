<?php
  require_once '/xampp/htdocs/yourParty/Classes/Conexao.php'; 
  require_once '/xampp/htdocs/yourParty/Classes/Cliente.php';


  $cliente = new Cliente();
  $conexao = new Conexao();


  if(isset($_POST['nomeCliente'])){ 
        
    $nome = addslashes($_POST['nomeCliente']);
    $cpf = addslashes($_POST['cpfCliente']);
    $email = addslashes($_POST['emailCliente']);
    $telefone = $_POST['telefone'];
    $senha = addslashes($_POST['senhaCliente']);
    $confirmarSenha = addslashes($_POST['confirmarSenha']);

    $foto = $_FILES['arquivo'];
  }

    // verificar se o campo esta vazio
    if(!empty($nome) && !empty($cpf)){  

        if($conexao->msgErro == ""){ // tudo certo
            if($senha == $confirmarSenha){

                $cliente->setNomeCliente($nome);
                $cliente->setCpfCliente($cpf);
                $cliente->setEmailCliente($email);
                // password_hash() é mais seguro para a criptografia de senhas.
                $cliente->setSenhaCliente(password_hash($senha, PASSWORD_DEFAULT));
                $cliente->setFoneCliente($telefone);

            if(strlen($foto['name']) > 0 && strlen($foto['type']) > 0){

                //- - - | IF PARA VER SE O ARQUIVO DEU ERRO |- - -//
                if($foto['error']){
                    die("error");
                }
                        
                $nomeArquivo = $foto['name'];
        
                //Colocando o nome da foto aleatória para não dar conflito no BD & pegando a extensão do arquivo//
                $nomeId = uniqid();
                $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
                $path = "images-db/" . $nomeId . "." . $ext;
                        
                move_uploaded_file($foto['tmp_name'], '../../../../privateUser/'.$path);
    
                $cliente->setFotoCliente($path);
    
            }else{

                $rand = rand(1, 6);
                $path = "images-random/not-image($rand).png";
                $cliente->setFotoCliente($path);
    
            }



                
                if($cliente->cadastrar($cliente) && $cliente->cadastrarFone($cliente)){
                        
                    $retorna = ['error' => false, 'title' => 'Usuário Cadastrado!', 'msg' => 'Faça login e aproveite a YourParty!'];

                }else{

                    $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Este usuário já existe!'];

                }

            } else{
                $retorna = ['aviso' => true, 'title' => 'Senhas diferentes' , 'msg' => 'As senhas precisam ser idênticas para realizar seu cadastro.'];
            }

        }else{

            $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => $conexao->msgErro];

        }

    }else{

        $retorna = ['error' => true, 'title' => 'Oops!', 'msg' => 'Preencha todos os campos'];

    }

    echo json_encode($retorna);



?>