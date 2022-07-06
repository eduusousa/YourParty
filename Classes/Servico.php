<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';

    class Servico{

        private $idServico;
        private $nomeServico;

        public function setIdServico($idServico){
            $this->idServico = $idServico;

        }

        public function getIdServico(){
            return $this->idServico;

        }

        public function setNomeServico($nomeServico){
            $this->nomeServico = $nomeServico;

        }

        public function getNomeServico(){
            return $this->nomeServico;

        }


        public function cadastrar($servico){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbServico (nomeServico)
                                        VALUES (?)");
            $stmt->bindValue(1, $servico->getNomeServico());
            $stmt->execute();
        }



        public function listar(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idServico, nomeServico FROM tbServico");
            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }

        
        public function listarServico($id){



            // SELECT nomeBuffet FROM tbbuffet	
	        //     WHERE idEmpresa IN (SELECT idEmpresa FROM tbcatalogoservico WHERE idServico = 2)

        }




    }


?>