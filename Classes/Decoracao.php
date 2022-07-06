<?php
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';

    class Decoracao{
        private $idDecoracao;

        private $nomeDecoracao;
        private $valorDecoracao;
        private $descDecoracao;


        private $tipoDecoracao;
        private $temaDecoracao;
        private $fotoDecoracao;
        private $idEmpresa;

        private $idItemDecoracao;
        private $nomeItemDecoracao;
        private $itemDecoracao = [];

        private $empresa;

        public function getIdDecoracao(){
            return $this->idDecoracao;
        }   

        public function setIdDecoracao($idDecoracao){
            $this->idDecoracao = $idDecoracao;
        }

        public function getTipoDecoracao(){
            return $this->tipoDecoracao;
        }

        public function setTipoDecoracao($tipoDecoracao){
            $this->tipoDecoracao = $tipoDecoracao;
        }

        public function getTemaDecoracao(){
            return $this->temaDecoracao;
        }

        public function setTemaDecoracao($temaDecoracao){
            $this->temaDecoracao = $temaDecoracao;
        }

        public function getFotoDecoracao(){
            return $this->fotoDecoracao;
        }

        public function setFotoDecoracao($fotoDecoracao){
            $this->fotoDecoracao = $fotoDecoracao;
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


        public function setNomeDecoracao($nomeDecoracao){
            $this->nomeDecoracao = $nomeDecoracao;
        }

        public function getNomeDecoracao(){
            return $this->nomeDecoracao;
        }

        public function setValorDecoracao($valorDecoracao){
            $this->valorDecoracao = $valorDecoracao;
        }

        public function getValorDecoracao(){
            return $this->valorDecoracao;
        }

        public function setDescDecoracao($descDecoracao){
            $this->descDecoracao = $descDecoracao;
        }

        public function getDescDecoracao(){
            return $this->descDecoracao;
        }

        public function setItemDecoracao($itemDecoracao){
            $this->itemDecoracao = $itemDecoracao;
        }

        public function getItemDecoracao(){
            return $this->itemDecoracao;
        }





        public function setIdItemDecoracao($idItemDecoracao){
            $this->idItemDecoracao = $idItemDecoracao;
        }

        public function getIdItemDecoracao(){
            return $this->idItemDecoracao;
        }

        public function setNomeItemDecoracao($nomeItemDecoracao){
            $this->nomeItemDecoracao = $nomeItemDecoracao;
        }

        public function getNomeItemDecoracao(){
            return $this->nomeItemDecoracao;
        }


        // --------------------------- CRUD -------------------------------
        public function cadastrar($decoracao){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("INSERT INTO tbdecoracao(nomeDecoracao, valorDecoracao, descDecoracao,
                                                                    tipoDecoracao, temaDecoracao, fotoDecoracao, idEmpresa)
                                            VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindValue(1, $decoracao->getNomeDecoracao());
                $stmt->bindValue(2, $decoracao->getValorDecoracao());
                $stmt->bindValue(3, $decoracao->getDescDecoracao());
                $stmt->bindValue(4, $decoracao->getTipoDecoracao());
                $stmt->bindValue(5, $decoracao->getTemaDecoracao());
                $stmt->bindValue(6, $decoracao->getFotoDecoracao());
                $stmt->bindValue(7, $decoracao->empresa->getIdEmpresa());
    
                $stmt->execute();

                return true;

            }catch(PDOException $e){

                return false;
            }

        }



        public function listar($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbDecoracao
                                WHERE idEmpresa = :id");
            $stmt->bindValue("id", $id);
            $stmt->execute();

            $list = $stmt->fetchAll();
            return $list;
        }

        public function listarAll(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa FROM tbDecoracao d
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = d.idEmpresa");
            $stmt->execute();

            $list = $stmt->fetchAll();
            return $list;
        }

        public function listarTudo(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa FROM tbDecoracao d
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = d.idEmpresa");
            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }

        public function update($decoracao){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbDecoracao
                                            SET nomeDecoracao = ?, valorDecoracao = ?, descDecoracao = ?,
                                                tipoDecoracao = ?, temaDecoracao = ?
                                            WHERE idDecoracao = ? ");
                $stmt->bindValue(1, $decoracao->getNomeDecoracao());
                $stmt->bindValue(2, $decoracao->getValorDecoracao());
                $stmt->bindValue(3, $decoracao->getDescDecoracao());
                $stmt->bindValue(4, $decoracao->getTipoDecoracao());
                $stmt->bindValue(5, $decoracao->getTemaDecoracao());
                $stmt->bindValue(6, $decoracao->getIdDecoracao());
                $stmt->execute();

                return true;
            }catch(Exception $e){
                
                return false;
            }
        }

        public function listarUpdate($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbDecoracao
                                        WHERE idDecoracao = :id LIMIT 1");
            $stmt->bindValue("id", $id);
            $stmt->execute();
            $list = $stmt->fetch(PDO::FETCH_ASSOC);

            return $list;
        }

        public function delete($id){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("DELETE FROM tbDecoracao
                                            WHERE idDecoracao = ?");
                $stmt->bindValue(1, $id);
                $stmt->execute();

                return true;
            }catch(PDOException $e){
                return false;

            }

        }

        public function deleteItem($id){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("DELETE FROM tbItemDecoracao
                                            WHERE idItemDecoracao = ?");
                $stmt->bindValue(1, $id);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return false;


            }

        }





        public function listarItem($item){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbItemDecoracao
                                        WHERE idDecoracao = ?");
            $stmt->bindValue(1, $item);
            $stmt->execute();

            $list = $stmt->fetchAll();

            return $list;
        }




        public function cadastrarItem($item){

            $conexao = Conexao::conectar();

            try{
                $itens = $item->getItemDecoracao();
    
                foreach($itens as $row){
    
                    $stmt = $conexao->prepare("INSERT INTO tbItemDecoracao (idDecoracao, nomeItemDecoracao)
                                                    VALUES (?, ?)");
                    $stmt->bindValue(1, $item->getIdDecoracao());
                    $stmt->bindValue(2, $row);
                    $stmt->execute();
             
                }

                return true;

            }catch(PDOException $e){

                return false;
            }



        }



        public function item($item){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT nomeItemDecoracao FROM tbItemDecoracao
                                        WHERE idItemDecoracao = ?");
            $stmt->bindValue(1, $item);
            $stmt->execute();

            $list = $stmt->fetch(PDO::FETCH_ASSOC);

            return $list;
        }

        public function updateItem($item){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbItemDecoracao SET nomeItemDecoracao = ?
                                            WHERE idItemDecoracao = ?");
                $stmt->bindValue(1, $item->getNomeItemDecoracao());
                $stmt->bindValue(2, $item->getIdItemDecoracao());
                $stmt->execute();

                return true;

            }catch(Exception $e){
                return false;
            }


        }

        public function updateImage($foto){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbDecoracao
                                            SET fotoDecoracao = :foto
                                            WHERE idDecoracao = :id");
                $stmt->bindValue("id", $foto->getIdDecoracao());
                $stmt->bindValue("foto", $foto->getFotoDecoracao());
                $stmt->execute();

                return true;

            }catch(Exception $e){
                return false;

            }

        }
        // BUSCA
        public function searchDecoracao($where){
           $conexao = Conexao::conectar();

           try{
                $stmt = $conexao->prepare("SELECT DISTINCT (d.idDecoracao), nomeDecoracao, descDecoracao, valorDecoracao, 
                                                    tipoDecoracao, temaDecoracao, fotoDecoracao, e.nomeEmpresa 
                                            FROM tbDecoracao d
                                                INNER JOIN tbEmpresa e ON e.idEmpresa = d.idEmpresa
                                                INNER JOIN tbItemDecoracao it ON it.idDecoracao = d.idDecoracao
                                                    WHERE $where");

                $stmt->execute();

                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $list;

           }catch(PDOException $e){
               return $e->getMessage();

           }
        }

        public function decoracaoBarato(){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT * FROM tbDecoracao WHERE valorDecoracao = (SELECT MIN(valorDecoracao) FROM tbDecoracao) LIMIT 1");
                $stmt->execute();

                $result = $stmt->fetchAll();

                return $result;
            }catch(PDOException $e){
                return $e->getMessage();
            }



        }

        public function contarDecoracao($id){

            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("SELECT COUNT(idDecoracao) FROM tbDecoracao WHERE idEmpresa = $id");
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
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET confirmaDecoracao = :condicao WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("condicao", $condicao);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }

        }

        public function negarContrato($id){
            
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET confirmaDecoracao = 2 WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }

        }


        public function listarDecoracao($id){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa, e.emailEmpresa, f.numeroFoneEmpresa FROM tbDecoracao d
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = d.idEmpresa
                                            INNER JOIN tbFoneEmpresa f ON f.idEmpresa = e.idEmpresa
                                            WHERE d.idDecoracao = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                $list = $stmt->fetch(PDO::FETCH_ASSOC);
                return $list;

            }catch(PDOException $e){
                return $e->getMessage();

            }
        }

        public function notList($id){
            $conexao = Conexao::conectar();

            try{

                $stmt = $conexao->prepare("SELECT *, e.nomeEmpresa FROM tbDecoracao d
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = d.idEmpresa
                                            WHERE NOT d.idDecoracao = :id LIMIT 8");
                $stmt->bindValue("id", $id);
                $stmt->execute();

                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $list;

            }catch(PDOException $e){
                return $e->getMessage();

            }
        }


    }