<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';

    class Buffet{
        private $idBuffet;
        private $nomeBuffet;
        private $descricaoBuffet;
        private $valorBuffet;
        private $fotoBuffet;
        private $idEmpresa;

        private $idItemBuffet;
        private $nomeItemBuffet;
        private $itemBuffet = [];
        private $empresa;

        public function getIdBuffet(){
            return $this->idBuffet;
        }

        public function setIdBuffet($idBuffet){
            $this->idBuffet = $idBuffet;
        }

        public function getNomeBuffet(){
            return $this->nomeBuffet;
        }

        public function setNomeBuffet($nomeBuffet){
            $this->nomeBuffet = $nomeBuffet;
        }

        public function getDescricaoBuffet(){
            return $this->descricaoBuffet;
        }

        public function setDescricaoBuffet($descricaoBuffet){
            $this->descricaoBuffet = $descricaoBuffet;
        }

        public function getValorBuffet(){
            return $this->valorBuffet;
        }

        public function setValorBuffet($valorBuffet){
            $this->valorBuffet = $valorBuffet;
        }

        public function getFotoBuffet(){
            return $this->fotoBuffet;
        }

        public function setFotoBuffet($fotoBuffet){
            $this->fotoBuffet = $fotoBuffet;
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


        public function getItemBuffet(){
            return $this->itemBuffet;
        }

        public function setItemBuffet($itemBuffet){
            $this->itemBuffet = $itemBuffet;
        }


        public function getIdItemBuffet(){
            return $this->idItemBuffet;
        }

        public function setIdItemBuffet($idItemBuffet){
            $this->idItemBuffet = $idItemBuffet;
        }

        public function getNomeItemBuffet(){
            return $this->nomeItemBuffet;
        }

        public function setNomeItemBuffet($nomeItemBuffet){
            $this->nomeItemBuffet = $nomeItemBuffet;
        }

        


        
        public function cadastrar($buffet){
            
            try{
                $conexao = Conexao::conectar();

                $stmt = $conexao->prepare("INSERT INTO tbBuffet(nomeBuffet, descricaoBuffet, valorBuffet, fotoBuffet, idEmpresa)
                VALUES (?,?,?,?,?)");

                $stmt->bindValue(1, $buffet->getNomeBuffet());
                $stmt->bindValue(2, $buffet->getDescricaoBuffet());
                $stmt->bindValue(3, $buffet->getValorBuffet());
                $stmt->bindValue(4, $buffet->getFotoBuffet());
                $stmt->bindValue(5, $buffet->empresa->getIdEmpresa());
    
                $stmt->execute();

                return true;

            } catch(Exception $e){
                return false;

            }

        }

        public function listar($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbBuffet
                                        WHERE idEmpresa = :id");
            $stmt->bindValue("id", $id);
            $stmt->execute();

            $list = $stmt->fetchAll();
            return $list;
        }

        public function listarAll(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbBuffet LIMIT 1");
            $stmt->execute();

            $list = $stmt->fetchAll();
            return $list;
        }

        public function listarTudo(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa FROM tbBuffet b INNER JOIN tbEmpresa e ON e.idEmpresa = b.idEmpresa");
            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }

        public function listarBuffet($id){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa, e.emailEmpresa, f.numeroFoneEmpresa FROM tbBuffet b
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = b.idEmpresa
                                            INNER JOIN tbFoneEmpresa f ON f.idEmpresa = e.idEmpresa
                                            WHERE b.idBuffet = :id LIMIT 1");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                $list = $stmt->fetch(PDO::FETCH_ASSOC);
                return $list;

            } catch(Exception $e){
                echo $e->getMessage();
            }
            
        }

        public function update($buffet){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("UPDATE tbBuffet
                                            SET nomeBuffet = ?, descricaoBuffet = ?, valorBuffet = ?
                                                WHERE idBuffet = ? ");
                $stmt->bindValue(1, $buffet->getNomeBuffet());
                $stmt->bindValue(2, $buffet->getDescricaoBuffet());
                $stmt->bindValue(3, $buffet->getValorBuffet());
                $stmt->bindValue(4, $buffet->getIdBuffet());
                $stmt->execute();

                return true;
            }catch(Exception $e){
                echo $e->getMessage();

                return false;
            }

        }

        public function delete($id){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("DELETE FROM tbBuffet WHERE idBuffet = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                
                return false;

            }

        }



        public function cadastrarItem($item){

            $conexao = Conexao::conectar();

            try{
                $itemBuf = $item->getItemBuffet();
    
                foreach($itemBuf as $row){
    
                    $stmt = $conexao->prepare("INSERT INTO tbItemBuffet (nomeItemBuffet, idBuffet)
                                                    VALUES (?,?)");
                    $stmt->bindValue(1, $row);
                    $stmt->bindValue(2, $item->getIdBuffet());
                    $stmt->execute();
    
                }

                return true;

            }catch(PDOException $e){
                return false;
                
            }
        }

        public function deleteItem($id){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("DELETE FROM tbItemBuffet WHERE idItemBuffet = ?");
                $stmt->bindValue(1, $id);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return false;
                
            }

        }

        public function updateImage($buffet){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbBuffet SET fotoBuffet = ?
                                            WHERE idBuffet = ?");
                $stmt->bindValue(1, $buffet->getFotoBuffet());
                $stmt->bindValue(2, $buffet->getIdBuffet());
                $stmt->execute();

                return true;

            }catch(Exception $e){
                echo $e->getMessage();
                return false;

            }
        }

        public function listarItem($item){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbItemBuffet
                                        WHERE idBuffet = ?");
            $stmt->bindValue(1, $item);
            $stmt->execute();

            $list = $stmt->fetchAll();

            return $list;
        }



        public function updateItem($item){

            $conexao = Conexao::conectar();
            try{

                $stmt = $conexao->prepare("UPDATE tbItemBuffet SET nomeItemBuffet = ?
                                            WHERE idItemBuffet = ?");
                $stmt->bindValue(1, $item->getNomeItemBuffet());
                $stmt->bindValue(2, $item->getIdItemBuffet());
                $stmt->execute(); 

                return true;
            }catch(Exception $e){

                return false;
            }

        }

        public function item($item){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT nomeItemBuffet FROM tbItemBuffet
                                        WHERE idItemBuffet = ?");
            $stmt->bindValue(1, $item);
            $stmt->execute();

            $list = $stmt->fetch(PDO::FETCH_ASSOC);

            return $list;
        }
        


        public function buffetbarato(){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT * FROM tbBuffet WHERE valorBuffet = (SELECT MIN(valorBuffet) FROM tbBuffet) LIMIT 1");
                $stmt->execute();

                $result = $stmt->fetchAll();

                return $result;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function contarBuffet($id){

            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT COUNT(idBuffet) FROM tbBuffet WHERE idEmpresa = $id");
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
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET confirmaBuffet = :condicao WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("condicao", $condicao);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }

        }




        public function searchBuffet($where){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("SELECT DISTINCT (b.idBuffet), (nomeBuffet), descricaoBuffet, valorBuffet, fotoBuffet, e.nomeEmpresa 
                                                FROM tbBuffet b
                                                INNER JOIN tbEmpresa e ON e.idEmpresa = b.idEmpresa
                                                INNER JOIN tbItemBuffet ib ON ib.idBuffet = b.idBuffet
                                                WHERE $where");
                // $stmt->bindParam(1, $where, PDO::PARAM_STR);

                $stmt->execute();

                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                return $list;
                
            }catch(PDOException $e){
                return $e->getMessage();

            }
        }

        public function notList($id){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("SELECT * FROM tbBuffet b
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = b.idEmpresa
                                                WHERE NOT b.idBuffet = :id LIMIT 8");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                return $list;

            }catch(PDOException $e){
                return $e->getMessage();

            }

        }

    }