<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';

    class Local{

        private $idLocal;
        private $nomeLocal;
        private $valorLocal;
        private $enderecoLocal;
        private $numeroLocal;
        private $cidadeLocal;
        private $bairroLocal;
        private $cepLocal;
        private $estadoLocal;
        private $fotoLocal;
        private $idEmpresa;

        private $empresa;

        public function getIdLocal(){
            return $this->idLocal;
        }

        public function setIdLocal($idLocal){
            $this->idLocal = $idLocal;
        }

        public function getNomeLocal(){
            return $this->nomeLocal;
        }

        public function setNomeLocal($nomeLocal){
            $this->nomeLocal = $nomeLocal;
        }

        public function getValorLocal(){
            return $this->valorLocal;
        }

        public function setValorLocal($valorLocal){
            $this->valorLocal = $valorLocal;
        }

        public function getEnderecoLocal(){
            return $this->enderecoLocal;
        }

        public function setEnderecoLocal($enderecoLocal){
            $this->enderecoLocal = $enderecoLocal;
        }

        public function getNumeroLocal(){
           return $this->numeroLocal; 
        }

        public function setNumeroLocal($numeroLocal){
            $this->numeroLocal = $numeroLocal;
        }

        public function getCidadeLocal(){
            return $this->cidadeLocal;
        }

        public function setCidadeLocal($cidadeLocal){
            $this->cidadeLocal = $cidadeLocal;
        }

        public function getBairroLocal(){
            return $this->bairroLocal;
        }

        public function setBairroLocal($bairroLocal){
            $this->bairroLocal = $bairroLocal;
        }

        public function getCepLocal(){
            return $this->cepLocal;
        }

        public function setCepLocal($cepLocal){
            $this->cepLocal = $cepLocal;
        }

        public function getEstadoLocal(){
            return $this->estadoLocal;
        }

        public function setEstadoLocal($estadoLocal){
            $this->estadoLocal = $estadoLocal;
        }

        public function getFotoLocal(){
            return $this->fotoLocal;
        }

        public function setFotoLocal($fotoLocal){
            $this->fotoLocal = $fotoLocal;
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


        public function cadastrar($local){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("INSERT INTO tblocal(nomeLocal, valorLocal, enderecoLocal
                                                                ,numeroLocal, cidadeLocal, bairroLocal
                                                                ,cepLocal, estadoLocal, fotoLocal, idEmpresa)
                                            VALUES (?,?,?,?,?,?,?,?,?,?)"
                                        );
                $stmt->bindValue(1, $local->getNomeLocal());
                $stmt->bindValue(2, $local->getValorLocal());
                $stmt->bindValue(3, $local->getEnderecoLocal());
                $stmt->bindValue(4, $local->getNumeroLocal());
                $stmt->bindValue(5, $local->getCidadeLocal());
                $stmt->bindValue(6, $local->getBairroLocal());
                $stmt->bindValue(7, $local->getCepLocal());
                $stmt->bindValue(8, $local->getEstadoLocal());
                $stmt->bindValue(9, $local->getFotoLocal());
                $stmt->bindValue(10, $local->empresa->getIdEmpresa());
    
                $stmt->execute();

                return true;

            }catch(PDOException $e){

                return false;
            }
        }

        public function listar($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tblocal
                                        WHERE idEmpresa = :id");
            $stmt->bindValue("id", $id);
            $stmt->execute();                    

            $lista = $stmt->fetchAll();
            return $lista;
        }

        public function listarAll(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tblocal");
            $stmt->execute();                    

            $lista = $stmt->fetchAll();
            return $lista;
        }

        public function listarTudo(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa FROM tblocal l INNER JOIN tbEmpresa e ON e.idEmpresa = l.idEmpresa");
            $stmt->execute();                    

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }



        public function listarUpdate($id){
            $conexao = Conexao::conectar();

            $stmt= $conexao->prepare("SELECT * FROM tblocal
                            WHERE idLocal = :id LIMIT 1");
            $stmt->bindValue("id", $id);
            $stmt->execute();         

            $lista = $stmt->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function update($local){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("UPDATE tbLocal
                                            SET nomeLocal = ?, valorLocal = ?, enderecoLocal =?
                                            , numeroLocal = ?, cidadeLocal = ?, bairroLocal = ?
                                            , cepLocal = ?, estadoLocal = ?
                                            WHERE idLocal = ?");
    
                $stmt->bindValue(1, $local->getNomeLocal());
                $stmt->bindValue(2, $local->getValorLocal());
                $stmt->bindValue(3, $local->getEnderecoLocal());
                $stmt->bindValue(4, $local->getNumeroLocal());
                $stmt->bindValue(5, $local->getCidadeLocal());
                $stmt->bindValue(6, $local->getBairroLocal());
                $stmt->bindValue(7, $local->getCepLocal());
                $stmt->bindValue(8, $local->getEstadoLocal());
                $stmt->bindValue(9, $local->getIdLocal());
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

                $stmt = $conexao->prepare("DELETE FROM tbLocal WHERE idLocal = :id");
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

                $stmt = $conexao->prepare("UPDATE tbLocal SET fotoLocal = :foto
                                            WHERE idLocal = :id");
                $stmt->bindValue("foto", $foto->getFotoLocal());
                $stmt->bindValue("id", $foto->getIdLocal());
                $stmt->execute();

                return true;

            }catch(Exception $e){
                echo $e->getMessage();

                return false;
            }

        }
        // BUSCA
        public function searchLocal($where){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("SELECT idLocal, nomeLocal, valorLocal, bairroLocal, enderecoLocal, 
                                                    numeroLocal, cepLocal, cidadeLocal, estadoLocal, fotoLocal, e.nomeEmpresa 
                                            FROM tbLocal l 
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = l.idEmpresa
                                                WHERE $where");

                $stmt->execute();

                // nomeLocal, valorLocal, bairroLocal, enderecoLocal, 
                                                    // numeroLocal, cepLocal, cidadeLocal, estadoLocal, fotoLocal,

                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $list;
                
            }catch(PDOException $e){
                return $e->getMessage();

            }
        }

        public function localBarato(){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT * FROM tbLocal WHERE valorLocal = (SELECT MIN(valorLocal) FROM tbLocal) LIMIT 1");
                $stmt->execute();

                $result = $stmt->fetchAll();

                return $result;
            }catch(PDOException $e){
                return $e->getMessage();
            }



        }


        public function contarLocal($id){

            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT COUNT(idLocal) FROM tbLocal WHERE idEmpresa = $id");
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
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET confirmaLocal = :condicao WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("condicao", $condicao);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }

        }


        public function notList($id){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("SELECT * FROM tbLocal l
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = l.idEmpresa
                                                WHERE NOT l.idLocal = :id LIMIT 8");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                return $list;

            }catch(PDOException $e){
                return $e->getMessage();

            }

        }


        public function listarLocal($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa, e.emailEmpresa, f.numeroFoneEmpresa FROM tblocal l
                                        INNER JOIN tbEmpresa e ON l.idEmpresa = e.idEmpresa
                                        INNER JOIN tbFoneEmpresa f ON f.idEmpresa = e.idEmpresa
                                        WHERE idLocal = :id");
            $stmt->bindValue("id", $id);
            $stmt->execute();                    

            $lista = $stmt->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }


        public function listarCidade(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT DISTINCT(cidadeLocal) FROM tblocal");
            $stmt->execute();                    

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function listarEstado(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT DISTINCT(estadoLocal) FROM tblocal");
            $stmt->execute();                    

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

       
        
    }