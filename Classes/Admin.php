<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';

    class Admin{

        private $idAmin;
        private $nomeAdmin;
        private $emailAdmin;
        private $senhaAdmin;

        public function getIdAmin(){
            return $this->idAmin;
        }

        public function setIdAmin($idAdmin){
            $this->idAmin = $idAdmin;
        }

        public function getNomeAdmin(){
            return $this->nomeAdmin;
        }

        public function setNomeAdmin($nomeAdmin){
            $this->nomeAdmin = $nomeAdmin;
        }

        public function getEmailAdmin(){
            return $this->emailAdmin;
        }

        public function setEmailAdmin($emailAdmin){
            $this->emailAdmin = $emailAdmin;
        }

        public function getSenhaAdmin(){
            return $this->senhaAdmin;
        }

        public function setSenhaAdmin($senhaAdmin){
            $this->senhaAdmin = $senhaAdmin;
        }



        public function logar($email, $senha){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbAdmin WHERE emailAdmin LIKE '%?%'");
            $stmt->bindValue(1, $email);
            $stmt->execute();

            
            if($stmt->rowCount() > 0){
                
                $result = $stmt->fetchAll();

                if($result[3] == $senha){

                    return true;

                }else{

                    return false;

                }

            }else{

                return false;
            }
        }
        














    }



?>