<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';

    class Seguranca{
        private $idSeguranca;
        private $descSeguranca;
        private $valorSeguranca;
        private $quantidadeSeguranca;
        private $fotoSeguranca;
        private $idEmpresa;

        private $empresa;

        public function getIdSeguranca(){
            return $this->idSeguranca;
        }

        public function setIdSeguranca($idSeguranca){
            $this->idSeguranca = $idSeguranca;
        }

        public function getDescSeguranca(){
            return $this->descSeguranca;
        }

        public function setDescSeguranca($descSeguranca){
            $this->descSeguranca = $descSeguranca;
        }

        public function getValorSeguranca(){
            return $this->valorSeguranca;
        }

        public function setValorSeguranca($valorSeguranca){
            $this->valorSeguranca = $valorSeguranca; 
        }

        public function getQuantidade(){
            return $this->quantidadeSeguranca;
        }

        public function setQuantidade($quantidadeSeguranca){
            $this->quantidadeSeguranca = $quantidadeSeguranca;
        }

        public function getFotoSeguranca(){
            return $this->fotoSeguranca;
        }

        public function setFotoSeguranca($fotoSeguranca){
            $this->fotoSeguranca = $fotoSeguranca;
        }


        public function getIdEmpresa(){
            return $this->idEmpresa;
        }

        public function setIdEmpresa($idEmpresa){
            $this->idEmpresa = $idEmpresa;
        }

        public function getEmpresa(){
            return $this->empresa;
        }

        public function setEmpresa($empresa){
            $this->empresa = $empresa;
        }


        public function cadastrar($seguranca){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("INSERT INTO tbseguranca (descSeguranca, valorSeguranca, quantidadeSeguranca, fotoSeguranca, idEmpresa)
                                            VALUES (?,?,?,?,?)");
                $stmt->bindValue(1, $seguranca->getDescSeguranca());
                $stmt->bindValue(2, $seguranca->getValorSeguranca());
                $stmt->bindValue(3, $seguranca->getQuantidade());
                $stmt->bindValue(4, $seguranca->getFotoSeguranca());
                $stmt->bindValue(5, $seguranca->empresa->getIdEmpresa());
    
                $stmt->execute();

                return true;
                
            }catch(PDOException $e){

                return false;
            }
        }

        public function listar($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbSeguranca
                                        WHERE idEmpresa = :id");
            $stmt->bindValue("id", $id);
            $stmt->execute();

            $lista = $stmt->fetchAll();
            return $lista;
        }

        public function listarAll(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbSeguranca");
            $stmt->execute();

            $lista = $stmt->fetchAll();
            return $lista;
        }

        public function listarTudo(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa FROM tbSeguranca s INNER JOIN tbEmpresa e ON e.idEmpresa = s.idEmpresa");
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function listarUpdate($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idSeguranca, descSeguranca, valorSeguranca, quantidadeSeguranca, fotoSeguranca
                            FROM tbSeguranca
                            WHERE idSeguranca = :id");
            $stmt->bindValue("id", $id);
            $stmt->execute();
            $lista = $stmt->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function update($seg){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare(" UPDATE tbSeguranca
                                            SET descSeguranca = ?, valorSeguranca = ?,
                                            quantidadeSeguranca = ?
                                            WHERE idSeguranca = ? ");

                $stmt->bindValue(1, $seg->getDescSeguranca());
                $stmt->bindValue(2, $seg->getValorSeguranca());
                $stmt->bindValue(3, $seg->getQuantidade());
                $stmt->bindValue(4, $seg->getIdSeguranca());
                $stmt->execute();

                return true;

            } catch(PDOException $e){

                return false;
            }

        }

        
        public function delete($id){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("DELETE FROM tbSeguranca WHERE idSeguranca = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return false;
            }

        }


        public function updateImage($foto){

            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare(" UPDATE tbSeguranca SET fotoSeguranca = :foto
                                            WHERE idSeguranca = :id");
                $stmt->bindValue("id", $foto->getIdSeguranca());
                $stmt->bindValue("foto", $foto->getFotoSeguranca());
                $stmt->execute();

                return true;

            }catch(Exception $e){

               return $e->getMessage();
            }

        }
        // BUSCA
        public function searchSeguranca($where){
            $conexao = Conexao::conectar();

           try{
            $stmt = $conexao->prepare("SELECT idSeguranca, descSeguranca, valorSeguranca, quantidadeSeguranca, fotoSeguranca, e.nomeEmpresa FROM tbSeguranca s
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = s.idEmpresa
                                                WHERE $where");

            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $list;

           }catch(PDOException $e){
               return $e->getMessage();

           }
        }

        
        public function segurancaBarato(){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT * FROM tbSeguranca WHERE valorSeguranca = (SELECT MIN(valorSeguranca) FROM tbSeguranca) LIMIT 1");
                $stmt->execute();

                $result = $stmt->fetchAll();

                return $result;
            }catch(PDOException $e){
                return $e->getMessage();
            }



        }

        public function contarSeguranca($id){

            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT COUNT(idSeguranca) FROM tbSeguranca WHERE idEmpresa = $id");
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_BOTH);

                return $result;
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }


        public function fecharContrato($id, $condicao){
            
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET confirmaSeguranca = :condicao WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("condicao", $condicao);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }

        }

        public function listarSeguranca($id){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa, e.emailEmpresa, f.numeroFoneEmpresa FROM tbSeguranca s
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = s.idEmpresa
                                            INNER JOIN tbFoneEmpresa f ON f.idEmpresa = e.idEmpresa
                                            WHERE s.idSeguranca = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                $lista = $stmt->fetch(PDO::FETCH_ASSOC);
                return $lista;

            }catch(PDOException $e){
                return $e->getMessage();

            }
        }

        public function notList($id){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa FROM tbSeguranca s
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = s.idEmpresa
                                            WHERE NOT s.idSeguranca = :id LIMIT 8");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $lista;

            }catch(PDOException $e){
                return $e->getMessage();

            }
        }
        
    }