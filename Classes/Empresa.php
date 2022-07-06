<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Servico.php';

    class Empresa{

        private $idEmpresa;
        private $nomeEmpresa;
        private $cnpjEmpresa;
        private $enderecoEmpresa;
        private $numeroEmpresa;
        private $cidadeEmpresa;
        private $bairroEmpresa;
        private $cepEmpresa;
        private $estadoEmpresa;
        private $fotoEmpresa;
        private $emailEmpresa;
        private $senhaEmpresa;

        private $servico = [];
        private $catalogoEmpresa = [];
        private $foneEmpresa = [];


        public function getIdEmpresa(){
            return $this->idEmpresa;
        }

        public function setIdEmpresa($idEmpresa){
            $this->idEmpresa = $idEmpresa;
        }

        public function getNomeEmpresa(){
            return $this->nomeEmpresa;
        }

        public function setNomeEmpresa($nomeEmpresa){
            $this->nomeEmpresa = $nomeEmpresa;
        }

        public function getCnpjEmpresa(){
            return $this->cnpjEmpresa;
        }

        public function setCnpjEmpresa($cnpjEmpresa){
            $this->cnpjEmpresa = $cnpjEmpresa;
        }

        public function getEnderecoEmpresa(){
            return $this->enderecoEmpresa;
        }

        public function setEnderecoEmpresa($enderecoEmpresa){
            $this->enderecoEmpresa = $enderecoEmpresa;
        }

        public function getNumeroEmpresa(){
            return $this->numeroEmpresa;
        }

        public function setNumeroEmpresa($numeroEmpresa){
            $this->numeroEmpresa = $numeroEmpresa;
        } 

        public function getCidadeEmpresa(){
            return $this->cidadeEmpresa;
        }

        public function setCidadeEmpresa($cidadeEmpresa){
            $this->cidadeEmpresa = $cidadeEmpresa;
        }

        public function getBairroEmpresa(){
            return $this->bairroEmpresa;
        }

        public function setBairroEmpresa($bairroEmpresa){
            $this->bairroEmpresa = $bairroEmpresa;
        }

        public function getCepEmpresa(){
            return $this->cepEmpresa;
        }

        public function setCepEmpresa($cepEmpresa){
            $this->cepEmpresa = $cepEmpresa;
        }

        public function getEstadoEmpresa(){
            return $this->estadoEmpresa;
        }

        public function setEstadoEmpresa($estadoEmpresa){
            $this->estadoEmpresa = $estadoEmpresa;
        }

        public function getFotoEmpresa(){
            return $this->fotoEmpresa;
        }

        public function setFotoEmpresa($fotoEmpresa){
            $this->fotoEmpresa = $fotoEmpresa;
        }

        public function getEmailEmpresa(){
            return $this->emailEmpresa;
        }

        public function setEmailEmpresa($emailEmpresa){
            $this->emailEmpresa = $emailEmpresa;
        }

        public function getSenhaEmpresa(){
            return $this->senhaEmpresa;
        }

        public function setSenhaEmpresa($senhaEmpresa){
            $this->senhaEmpresa = $senhaEmpresa;
        }

        public function setFoneEmpresa($foneEmpresa){
            $this->foneEmpresa = $foneEmpresa;
        }

        public function getFoneEmpresa(){
            return $this->foneEmpresa;
        }



        public function setServico($servico){
            $this->servico = $servico;
        }

        public function getServico(){
            return $this->servico;
        }

        public function setCatalogoEmpresa($catalogoEmpresa){
            $this->catalogoEmpresa = $catalogoEmpresa;
        }

        public function getCatalogoEmpresa(){
            return $this->catalogoEmpresa;
        }












        public function cadastrar($empresa){
            $conexao = Conexao::conectar();

            $cnpj = $empresa->getCnpjEmpresa();
            $email = $empresa->getEmailEmpresa();

            $stmt = $conexao->prepare("SELECT idEmpresa FROM tbempresa 
                                WHERE cnpjEmpresa LIKE '%$cnpj%'
                                OR emailEmpresa LIKE '%$email%'");
            $stmt->execute();

            if($stmt->rowCount() > 0){
            
                return false; // Já esta cadastrado

            } else{

                $stmt = $conexao->prepare("INSERT INTO tbempresa (nomeEmpresa, cnpjEmpresa
                                                                , enderecoEmpresa, numeroEmpresa, cidadeEmpresa
                                                                , bairroEmpresa, cepEmpresa, estadoEmpresa
                                                                , fotoEmpresa, emailEmpresa, senhaEmpresa)
                                            VALUES(?,?,?,?,?,?,?,?,?,?,?)");

                $stmt->bindValue(1,$empresa->getNomeEmpresa());
                $stmt->bindValue(2,$empresa->getCnpjEmpresa());
                $stmt->bindValue(3,$empresa->getEnderecoEmpresa());
                $stmt->bindValue(4,$empresa->getNumeroEmpresa());
                $stmt->bindValue(5,$empresa->getCidadeEmpresa());
                $stmt->bindValue(6,$empresa->getBairroEmpresa());
                $stmt->bindValue(7,$empresa->getCepEmpresa());
                $stmt->bindValue(8,$empresa->getEstadoEmpresa());
                $stmt->bindValue(9,$empresa->getFotoEmpresa());
                $stmt->bindValue(10,$empresa->getEmailEmpresa());
                $stmt->bindValue(11,$empresa->getSenhaEmpresa());

                $stmt->execute();

                $empresa->setIdEmpresa($conexao->lastInsertId());

                return true;
            }
        }

        public function cadastrarFone($empresa){
            $conexao = Conexao::conectar();

            $id = $empresa->getIdEmpresa();
            $fone = $empresa->getFoneEmpresa();

            foreach($fone as $row){
                $stmt = $conexao->prepare("INSERT INTO tbFoneEmpresa (numeroFoneEmpresa, idEmpresa)
                                            VALUES (?, ?)");
                $stmt->bindValue(1, $row);
                $stmt->bindValue(2, $id);
                $stmt->execute();
            }

            return true;
        }


        public function listar($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbEmpresa
                                        WHERE idEmpresa = :id ");
            $stmt->bindValue("id", $id);
            $stmt->execute();

            $list = $stmt->fetch(PDO::FETCH_ASSOC);

            return $list;
        }


        public function logar($email, $senha){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT idEmpresa, senhaEmpresa FROM tbEmpresa
                                WHERE emailEmpresa = '$email' LIMIT 1 ";
            $result = $conexao->query($querySelect);
            $list = $result->fetch(PDO::FETCH_BOTH);


            if(password_verify($senha, $list['senhaEmpresa'])){

                //Entra no sistema com sucesso (sessão)
                $dado = $list['idEmpresa'];
                session_start();
                $_SESSION['idEmpresa'] = $dado;

                return true; // logado com sucesso

            }else{

                return false; // não foi possivel logar

            }
        }


        public function verificar($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idEmpresa, emailEmpresa, senhaEmpresa FROM tbEmpresa
                                        WHERE idEmpresa = :id LIMIT 1");
            $stmt->bindValue("id", $id);
            $stmt->execute();
            
            $list = $stmt->fetchAll();

            return $list;
        }

        public function cadastrarCatalogo($catalogo){
            $conexao = Conexao::conectar();

                $id = $catalogo->getIdEmpresa();
                $cat = $catalogo->getCatalogoEmpresa();

                foreach($cat as $row){

                    $stmt = $conexao->prepare("INSERT INTO tbCatalogoServico(idEmpresa, idServico)
                                                VALUES (?, ?)");
                    $stmt->bindValue(1, $id);
                    $stmt->bindValue(2, $row);
                    
                    $stmt->execute();
                }

            
            return true;
        }

        
        public function listarId(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idEmpresa FROM tbEmpresa");
            $stmt->execute();

            $list = $stmt->fetchAll();

            return $list;
        }


        public function cidadeListar(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT DISTINCT(cidadeEmpresa) FROM tbEmpresa");
            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $list;
        }

        public function estadoListar(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT DISTINCT(estadoEmpresa) FROM tbEmpresa");
            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $list;
        }


        public function countOrcamentoBuffet($id, $mes){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT COUNT(idItemOrcamento) AS Conta FROM tbitemorcamento oi
	                                        INNER JOIN tborcamentoevento oe ON oe.idOrcamentoEvento = oi.idOrcamentoEvento
		                                        WHERE idBuffet IN (SELECT idBuffet FROM tbBuffet WHERE idEmpresa = :id) AND MONTH(oe.dataOrcamentoEvento) = :mes");
            $stmt->bindParam("id", $id);
            $stmt->bindParam("mes", $mes);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function countOrcamentoLocal($id, $mes){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT COUNT(idItemOrcamento) AS Conta FROM tbitemorcamento oi
	                                        INNER JOIN tborcamentoevento oe ON oe.idOrcamentoEvento = oi.idOrcamentoEvento
		                                        WHERE idLocal IN (SELECT idLocal FROM tbLocal WHERE idEmpresa = :id) AND MONTH(oe.dataOrcamentoEvento) = :mes");
            $stmt->bindParam("id", $id);
            $stmt->bindParam("mes", $mes);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function countOrcamentoDecoracao($id, $mes){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT COUNT(idItemOrcamento) AS Conta FROM tbitemorcamento oi
	                                        INNER JOIN tborcamentoevento oe ON oe.idOrcamentoEvento = oi.idOrcamentoEvento
		                                        WHERE idDecoracao IN (SELECT idDecoracao FROM tbDecoracao WHERE idEmpresa = :id) AND MONTH(oe.dataOrcamentoEvento) = :mes");
            $stmt->bindParam("id", $id);
            $stmt->bindParam("mes", $mes);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function countOrcamentoSeguranca($id, $mes){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT COUNT(idItemOrcamento) AS Conta FROM tbitemorcamento oi
	                                        INNER JOIN tborcamentoevento oe ON oe.idOrcamentoEvento = oi.idOrcamentoEvento
		                                        WHERE idSeguranca IN (SELECT idSeguranca FROM tbSeguranca WHERE idEmpresa = :id) AND MONTH(oe.dataOrcamentoEvento) = :mes");
            $stmt->bindParam("id", $id);
            $stmt->bindParam("mes", $mes);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        // SELECT COUNT(idItemOrcamento), MONTH(oe.dataOrcamentoEvento) FROM tbitemorcamento oi
	    //     INNER JOIN tborcamentoevento oe ON oe.idOrcamentoEvento = oi.idOrcamentoEvento
		//         WHERE idBuffet IN (SELECT idBuffet FROM tbBuffet WHERE idEmpresa = 1)
        // 	        GROUP BY MONTH(oe.dataOrcamentoEvento)


    }