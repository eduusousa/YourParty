<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Cliente.php';

    class OrcamentoEvento{
        private $idOrcamentoEvento;
        private $valorTotalOrcamento;
        private $dataOrcamento;
        private $idCliente;

        private $cliente;

        public function getIdOcamentoEvento(){
            return $this->idOrcamentoEvento;
        }

        public function setIdOrcamentoEvento($idOrcamentoEvento){
            $this->idOrcamentoEvento = $idOrcamentoEvento;
        }

        public function getValorTotalOrcamento(){
            return $this->valorTotalOrcamento;
        }

        public function setValorTotalOrcamento($valorTotalOrcamento){
            $this->valorTotalOrcamento = $valorTotalOrcamento;
        }

        public function getIdCliente(){
            return $this->idCliente;
        }

        public function setIdCliente($idCliente){
            $this->idCliente = $idCliente;
        }

        public function getCliente(){
            return $this->cliente;
        }

        public function setCliente($cliente){
            $this->cliente = $cliente;
        }

        public function setDataOrcamento($dataOrcamento){
            $this->dataOrcamento = $dataOrcamento;
        }

        public function getDataOrcamento(){
            return $this->dataOrcamento;
        }


        public function cadastrar($orcamentoEvento){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tborcamentoevento (valorOrcamentoEvento, dataOrcamentoEvento, idCliente)
                                        VALUES (? ,? ,?)");
            $stmt->bindValue(1, $orcamentoEvento->getValorTotalOrcamento());
            $stmt->bindValue(2, $orcamentoEvento->getDataOrcamento());
            $stmt->bindValue(3, $orcamentoEvento->cliente->getIdCliente());

            $stmt->execute();

            $orcamentoEvento->setIdOrcamentoEvento($conexao->lastInsertId());

            return true;
        }

        public function lastId($orc){
            return $orc->getIdOcamentoEvento();
        }

        public function listar(){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT idOrcamentoEvento, valorTotalOrcamento, idCliente
                            FROM tborcamentoevento";
            
            $result = $conexao->query($querySelect);
            $lista = $result->fetchAll();

            return $lista;
        }
    }