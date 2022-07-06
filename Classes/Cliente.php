<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';

    class Cliente{

        private $idCliente;
        private $nomeCliente;
        private $cpfCliente;
        private $emailCliente;
        private $senhaCliente;
        private $fotoCliente;

        private $foneCliente = [];

        public function getIdCliente(){
            return $this->idCliente;
        }

        public function setIdCliente($idCliente){
            $this->idCliente = $idCliente;
        }

        public function getNomeCliente(){
            return $this->nomeCliente;
        }

        public function setNomeCliente($nomeCliente){
            $this->nomeCliente = $nomeCliente;
        }

        public function getCpfCliente(){
            return $this->cpfCliente;
        }

        public function setCpfCliente($cpfCliente){
            $this->cpfCliente = $cpfCliente;
        }

        public function getEmailCliente(){
            return $this->emailCliente;
        }

        public function setEmailCliente($emailCliente){
            $this->emailCliente = $emailCliente;
        }

        public function getSenhaCliente(){
            return $this->senhaCliente;
        }

        public function setSenhaCliente($senhaCliente){
            $this->senhaCliente = $senhaCliente;
        }

        public function getFotoCliente(){
            return $this->fotoCliente;
        }

        public function setFotoCliente($fotoCliente){
            $this->fotoCliente = $fotoCliente;
        }

        public function setFoneCliente($foneCliente){
            $this->foneCliente = $foneCliente;
        }

        public function getFoneCliente(){
            return $this->foneCliente;
        }

        
        public function cadastrar($cliente){

            $conexao = Conexao::conectar();

            $cpf = $cliente->getCpfCliente();
            $email = $cliente->getEmailCliente();


            $stmt = $conexao->prepare("SELECT idCliente FROM tbcliente 
                                        WHERE cpfCliente LIKE '%$cpf%'
                                        OR emailCliente LIKE '%$email%'");
            $stmt->execute();

            if($stmt->rowCount() > 0){
            
                return false; // Já esta cadastrado
    
            } else{

                $stmt1 = $conexao->prepare("INSERT INTO tbcliente (nomeCliente, cpfCliente, emailCliente, senhaCliente, fotoCliente)
                                        VALUES (?,?,?,?,?)");
                $stmt1->bindValue(1, $cliente->getNomeCliente());
                $stmt1->bindValue(2, $cliente->getCpfCliente());
                $stmt1->bindValue(3, $cliente->getEmailCliente());
                $stmt1->bindValue(4, $cliente->getSenhaCliente());
                $stmt1->bindValue(5, $cliente->getFotoCliente());
                $stmt1->execute();

                $cliente->setIdCliente($conexao->lastInsertId());

                return true;
            }
   
        }

        public function cadastrarFone($cliente){
            $conexao = Conexao::conectar();

            $id = $cliente->getIdCliente();
            $fone = $cliente->getFoneCliente();

            foreach($fone as $row){
                $stmt = $conexao->prepare("INSERT INTO tbFoneCliente (numeroFoneCliente, idCliente)
                                            VALUES (?, ?)");
                $stmt->bindValue(1, $row);
                $stmt->bindValue(2, $id);
                $stmt->execute();
            }

            return true;
        }


        public function listar(){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT idCliente, nomeCliente, cpfCliente, emailCliente, senhaCliente, fotoCliente
                            FROM tbCliente";
                                    
            $result = $conexao->query($querySelect);
            $lista = $result->fetchAll();
            return $lista;
        }


        public function logar($email, $senha){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT idCliente, senhaCliente FROM tbCliente
                                WHERE emailCliente = '$email' LIMIT 1";
            $result = $conexao->query($querySelect);
            $list = $result->fetch(PDO::FETCH_BOTH);

            if((password_verify($senha, $list['senhaCliente']))){
    
                //Entra no sistema com sucesso (sessão)
                $dado = $list['idCliente'];
                session_start();
                $_SESSION['idCliente'] = $dado;
    
                return true; // logado com sucesso
    
            }else{
                
                return false; // não foi possivel logar

            } 
        }

    }