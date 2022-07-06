<?php  
    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/OrcamentoEvento.php';
    require_once '/xampp/htdocs/yourParty/Classes/Local.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

    class ItemOrcamento{
        private $idItemOrcamento;

        private $confirmaBuffet;
        private $confirmaDecoracao;
        private $confirmaLocal;
        private $confirmaSeguranca;

        private $avaliacaoBuffet;
        private $avaliacaoDecoracao;
        private $avaliacaoLocal;
        private $avaliacaoSeguranca;

        private $idOrcamentoEvento;
        private $idBuffet;
        private $idDecoracao;
        private $idLocal;
        private $idSeguranca;

        private $orcamentoEvento;
        private $buffet;
        private $decoracao;
        private $local;
        private $seguranca;

        public function getIdItemOrcamento(){
            return $this->idItemOrcamento;
        }

        public function setIdItemOrcamento($idItemOrcamento){
            $this->idItemOrcamento = $idItemOrcamento;
        }

        public function getAvaliacaoBuffet(){
            return $this->avaliacaoBuffet;
        }

        public function setAvaliacaoBuffet($avaliacaoBuffet){
            $this->avaliacaoBuffet = $avaliacaoBuffet;
        }

        public function getAvaliacaoDecoracao(){
            return $this->avaliacaoDecoracao;
        }

        public function setAvaliacaoDecoracao($avaliacaoDecoracao){
            $this->avaliacaoDecoracao = $avaliacaoDecoracao;
        }

        public function getAvaliacaoLocal(){
            return $this->avaliacaoLocal;
        }

        public function setAvaliacaoLocal($avaliacaoLocal){
            $this->avaliacaoLocal = $avaliacaoLocal;
        }

        public function getAvaliacaoSeguranca(){
            return $this->avaliacaoSeguranca;
        }

        public function setAvaliacaoSeguranca($avaliacaoSeguranca){
            $this->avaliacaoSeguranca = $avaliacaoSeguranca;
        }


        public function getIdOrcamentoEvento(){
            return $this->idOrcamentoEvento;
        }

        public function setIdOrcamentoEvento($idOrcamentoEvento){
            $this->idOrcamentoEvento = $idOrcamentoEvento;
        }

        public function getOrcamentoEvento(){
            return $this->orcamentoEvento;
        }

        public function setOrcamentoEvento($orcamentoEvento){
            $this->orcamentoEvento = $orcamentoEvento;
        }


        public function getIdBuffet(){
            return $this->idBuffet;
        }

        public function setIdBuffet($idBuffet){
            $this->idBuffet = $idBuffet;
        }

        public function getBuffet(){
            return $this->buffet;
        }

        public function setBuffet($buffet){
            $this->buffet = $buffet;
        }


        public function getIdDecoracao(){
            return $this->idDecoracao;
        }

        public function setIdDecoracao($idDecoracao){
            $this->idDecoracao = $idDecoracao;
        }

        public function getDecoracao(){
            return $this->decoracao;
        }

        public function setDecoracao($decoracao){
            $this->decoracao = $decoracao;
        }


        public function getIdSeguranca(){
            return $this->idSeguranca;
        }

        public function setIdSeguranca($idSeguranca){
            $this->idSeguranca = $idSeguranca;
        }

        public function getSeguranca(){
            return $this->seguranca;
        }

        public function setSeguranca($seguranca){
            $this->seguranca = $seguranca;
        }


        public function getIdLocal(){
            return $this->idLocal;
        }

        public function setIdLocal($idLocal){
            $this->idLocal = $idLocal;
        }

        public function getLocal(){
            return $this->local;
        }

        public function setLocal($local){
            $this->local = $local;
        }


        public function getConfirmaBuffet(){
            return $this->confirmaBuffet;
        }

        public function setConfirmaBuffet($confirmaBuffet){
            $this->confirmaBuffet = $confirmaBuffet;
        }

        public function getConfirmaDecoracao(){
            return $this->confirmaDecoracao;
        }

        public function setConmfirmaDecoracao($confirmaDecoracao){
            $this->confirmaDecoracao = $confirmaDecoracao;
        }

        public function getConfirmaLocal(){
            return $this->confirmaLocal;
        }

        public function setConfirmaLocal($confirmaLocal){
            $this->confirmaLocal = $confirmaLocal;
        }

        public function getConfirmaSeguranca(){
            return $this->confirmaSeguranca;
        }

        public function setConfirmaSeguranca($confirmaSeguranca){
            $this->confirmaSeguranca = $confirmaSeguranca;
        }






        public function cadastrar($itemOrcamento){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbitemorcamento (confirmaBuffet, confirmaDecoracao, confirmaLocal, confirmaSeguranca,
                                                                    avaliacaoBuffet, avaliacaoDecoracao, avaliacaoLocal, avaliacaoSeguranca
                                                                    ,idOrcamentoEvento, idBuffet, idDecoracao, idSeguranca, idLocal)

                                        VALUES (:confirmaBuffet, :confirmaDecoracao, :confirmaLocal, :confirmaSeguranca,
                                                :avaBuffet, :avaDecoracao, :avaLocal, :avaSeguranca,
                                                :idOrcamento, :idBuffet, :idDecoracao, :idSeguranca, :idLocal)");

            
            $stmt->bindValue("confirmaBuffet", $itemOrcamento->getConfirmaBuffet());
            $stmt->bindValue("confirmaDecoracao", $itemOrcamento->getConfirmaDecoracao());
            $stmt->bindValue("confirmaLocal", $itemOrcamento->getConfirmaLocal());
            $stmt->bindValue("confirmaSeguranca", $itemOrcamento->getConfirmaSeguranca());

            $stmt->bindValue("avaBuffet", $itemOrcamento->getAvaliacaoBuffet());
            $stmt->bindValue("avaDecoracao", $itemOrcamento->getAvaliacaoDecoracao());
            $stmt->bindValue("avaLocal", $itemOrcamento->getAvaliacaoLocal());
            $stmt->bindValue("avaSeguranca", $itemOrcamento->getAvaliacaoSeguranca());

            $stmt->bindValue("idOrcamento", $itemOrcamento->getIdOrcamentoEvento());
            $stmt->bindValue("idBuffet", $itemOrcamento->getIdBuffet());
            $stmt->bindValue("idDecoracao", $itemOrcamento->getIdDecoracao());
            $stmt->bindValue("idSeguranca", $itemOrcamento->getIdSeguranca());
            $stmt->bindValue("idLocal", $itemOrcamento->getIdLocal());

            $stmt->execute();

            return true;
        }

        public function listar(){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT * FROM tbitemorcamento";
            $result = $conexao->query($querySelect);
            $lista = $result->fetchAll();
            
            return $lista;
        }

        public function semContrato($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbitemorcamento i
                                        INNER JOIN tbBuffet b ON b.idBuffet = i.idBuffet
                                        INNER JOIN tbLocal l ON l.idLocal = i.idLocal
                                        INNER JOIN tbDecoracao d ON d.idDecoracao = i.idDecoracao
                                        INNER JOIN tbSeguranca s ON s.idSeguranca = i.idSeguranca
                                            WHERE b.idEmpresa = :id 
                                            OR l.idEmpresa = l.idEmpresa = :id 
                                            OR d.idEmpresa = d.idEmpresa = :id 
                                            OR s.idEmpresa = s.idEmpresa = :id
                                            AND i.confirmaContrato = 'NULL' ");

            $stmt->bindValue("id", $id);
            $stmt->execute();
            $lista = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $lista;
        }

     
        
          

        public function confirmarContrato($bool, $id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET confirmaContrato = :nmr WHERE idItemOrcamento = :id");
            $stmt->bindValue("nmr", $bool);
            $stmt->bindValue("id", $id);

            $stmt->execute();
        }




        
        public function contratoBuffet($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idBuffet, b.nomeBuffet, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                            INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                            INNER JOIN tbCliente c ON c.idCliente = o.idCliente 
                                            INNER JOIN tbBuffet b ON b.idBuffet = i.idBuffet
                                            WHERE i.idBuffet IN (SELECT idBuffet FROM tbBuffet WHERE idEmpresa = :id) AND confirmaBuffet = 0 ORDER BY o.dataOrcamentoEvento DESC");

            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }

        public function contratoLocal($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idLocal, l.nomeLocal, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                            INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                            INNER JOIN tbCliente c ON c.idCliente = o.idCliente
                                            INNER JOIN tbLocal l ON l.idLocal = i.idLocal
                                            WHERE i.idLocal IN (SELECT idLocal FROM tbLocal WHERE idEmpresa = :id) AND confirmaLocal = 0 ORDER BY o.dataOrcamentoEvento DESC");

            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }

        public function contratoDecoracao($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idDecoracao, d.nomeDecoracao, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                            INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                            INNER JOIN tbCliente c ON c.idCliente = o.idCliente
                                            INNER JOIN tbDecoracao d ON d.idDecoracao = i.idDecoracao
                                            WHERE i.idDecoracao IN (SELECT idDecoracao FROM tbDecoracao WHERE idEmpresa = :id) AND confirmaDecoracao = 0 ORDER BY o.dataOrcamentoEvento DESC");

            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }

        public function contratoSeguranca($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idSeguranca, s.descSeguranca, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                            INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                            INNER JOIN tbCliente c ON c.idCliente = o.idCliente
                                            INNER JOIN tbSeguranca s ON s.idSeguranca = i.idSeguranca
                                            WHERE i.idSeguranca IN (SELECT idSeguranca FROM tbSeguranca WHERE idEmpresa = :id) AND confirmaSeguranca = 0 ORDER BY o.dataOrcamentoEvento DESC");

            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }

        



        public function avaliarLocal($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idLocal, l.nomeLocal FROM tbItemOrcamento i
                                        INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                        INNER JOIN tbLocal l ON l.idLocal = i.idLocal 
                                        WHERE o.idCliente = :id AND confirmaLocal = 1 AND avaliacaoLocal = 0");
            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;

        }

        public function avaliarBuffet($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idBuffet, b.nomeBuffet FROM tbItemOrcamento i
                                        INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                        INNER JOIN tbBuffet b ON i.idBuffet = b.idBuffet
                                        WHERE o.idCliente = :id AND confirmaBuffet = 1 AND avaliacaoBuffet = 0");
            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;

        }

        public function avaliarDecoracao($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idDecoracao, d.nomeDecoracao FROM tbItemOrcamento i
                                        INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                        INNER JOIN tbDecoracao d ON i.idDecoracao = d.idDecoracao
                                        WHERE o.idCliente = :id AND confirmaDecoracao = 1 AND avaliacaoDecoracao = 0");
            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;

        }

        public function avaliarSeguranca($id){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT idItemOrcamento, i.idSeguranca, s.descSeguranca FROM tbItemOrcamento i
                                        INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                        INNER JOIN tbSeguranca s ON s.idSeguranca = i.idSeguranca
                                        WHERE o.idCliente = :id AND confirmaSeguranca = 1 AND avaliacaoSeguranca = 0");
            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;

        }


        public function localAvaliation($id, $estrela){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET avaliacaoLocal = :estrela WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("estrela", $estrela);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }

        }

        public function buffetAvaliation($id, $estrela){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET avaliacaoBuffet = :estrela WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("estrela", $estrela);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }
            

        }

        public function decoracaoAvaliation($id, $estrela){
            $conexao = Conexao::conectar();


            try{
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET avaliacaoDecoracao = :estrela WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("estrela", $estrela);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }

        }

        public function segurancaAvaliation($id, $estrela){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("UPDATE tbItemOrcamento SET avaliacaoSeguranca = :estrela WHERE idItemOrcamento = :id");
                $stmt->bindValue("id", $id);
                $stmt->bindValue("estrela", $estrela);
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                return $e->getMessage();
            }
            
        }
        


        public function avgAvaliacaoBuffet($id){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoBuffet) FROM tbItemOrcamento WHERE idBuffet = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetch(PDO::FETCH_BOTH);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }

        public function avgAvaliacaoLocal($id){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoLocal) FROM tbItemOrcamento WHERE idLocal = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetch(PDO::FETCH_BOTH);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }


        public function avgAvaliacaoDecoracao($id){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoDecoracao) FROM tbItemOrcamento WHERE idDecoracao = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetch(PDO::FETCH_BOTH);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }

        public function avgAvaliacaoSeguranca($id){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoSeguranca) FROM tbItemOrcamento WHERE idSeguranca = :id");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetch(PDO::FETCH_BOTH);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }




        public function buffetAvaliado(){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoBuffet) AS 'Media', idBuffet FROM tbitemorcamento WHERE avaliacaoBuffet <> 0 GROUP BY idBuffet  ORDER BY 'Media'");
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }

        public function localAvaliado(){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoLocal) AS 'Media', idLocal FROM tbitemorcamento WHERE avaliacaoLocal <> 0 GROUP BY idLocal  ORDER BY 'Media'");
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }

        public function decoracaoAvaliado(){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoDecoracao) AS 'Media', idDecoracao FROM tbitemorcamento WHERE avaliacaoDecoracao <> 0 GROUP BY idDecoracao  ORDER BY 'Media'");
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }

        public function segurancaAvaliado(){
            $conexao = Conexao::conectar();
    
            try{
                $stmt = $conexao->prepare("SELECT AVG(avaliacaoSeguranca) AS 'Media', idSeguranca FROM tbitemorcamento WHERE avaliacaoSeguranca <> 0 GROUP BY idSeguranca  ORDER BY 'Media'");
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
    
        }




        public function budgetBuffet($id){
            $conexao = Conexao::conectar();
        
            try{
                $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaBuffet, avaliacaoBuffet, b.nomeBuffet, oe.valorOrcamentoEvento, e.nomeEmpresa, DATE_FORMAT(oe.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento ie
                                            INNER JOIN tbOrcamentoEvento oe ON oe.idOrcamentoEvento = ie.idOrcamentoEvento
                                            INNER JOIN tbBuffet b ON b.idBuffet = ie.idBuffet
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = b.idEmpresa
                                                WHERE oe.idCliente = :id ORDER BY oe.dataOrcamentoEvento DESC");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }

        public function budgetLocal($id){
            $conexao = Conexao::conectar();
        
            try{
                $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaLocal, avaliacaoLocal, l.nomeLocal, oe.valorOrcamentoEvento, e.nomeEmpresa, DATE_FORMAT(oe.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento ie
                                            INNER JOIN tbOrcamentoEvento oe ON oe.idOrcamentoEvento = ie.idOrcamentoEvento
                                            INNER JOIN tbLocal l ON l.idLocal = ie.idLocal
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = l.idEmpresa
                                                WHERE oe.idCliente = :id ORDER BY oe.dataOrcamentoEvento DESC");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }

        public function budgetDecoracao($id){
            $conexao = Conexao::conectar();
        
            try{
                $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaDecoracao, avaliacaoDecoracao, d.nomeDecoracao, oe.valorOrcamentoEvento, e.nomeEmpresa, DATE_FORMAT(oe.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento ie
                                            INNER JOIN tbOrcamentoEvento oe ON oe.idOrcamentoEvento = ie.idOrcamentoEvento
                                            INNER JOIN tbDecoracao d ON d.idDecoracao = ie.idDecoracao
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = d.idEmpresa
                                                WHERE oe.idCliente = :id ORDER BY oe.dataOrcamentoEvento DESC");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }

        public function budgetSeguranca($id){
            $conexao = Conexao::conectar();
        
            try{
                $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaSeguranca, avaliacaoSeguranca, s.descSeguranca, oe.valorOrcamentoEvento, e.nomeEmpresa, DATE_FORMAT(oe.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento ie
                                            INNER JOIN tbOrcamentoEvento oe ON oe.idOrcamentoEvento = ie.idOrcamentoEvento
                                            INNER JOIN tbSeguranca s ON s.idSeguranca = ie.idSeguranca
                                            INNER JOIN tbEmpresa e ON e.idEmpresa = s.idEmpresa
                                                WHERE oe.idCliente = :id ORDER BY oe.dataOrcamentoEvento DESC");
                $stmt->bindValue("id", $id);
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
    
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }




        public function buffetFechado($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaBuffet, avaliacaoBuffet, i.idBuffet, b.nomeBuffet, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                        INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                        INNER JOIN tbCliente c ON c.idCliente = o.idCliente 
                                        INNER JOIN tbBuffet b ON b.idBuffet = i.idBuffet
                                            WHERE i.idBuffet IN (SELECT idBuffet FROM tbBuffet WHERE idEmpresa = :id) AND confirmaBuffet <> 0 ORDER BY o.dataOrcamentoEvento DESC");

            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }


        public function decoracaoFechado($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaDecoracao, avaliacaoDecoracao, i.idDecoracao, d.nomeDecoracao, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                            INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                            INNER JOIN tbCliente c ON c.idCliente = o.idCliente
                                            INNER JOIN tbDecoracao d ON d.idDecoracao = i.idDecoracao
                                            WHERE i.idDecoracao IN (SELECT idDecoracao FROM tbDecoracao WHERE idEmpresa = :id) AND confirmaDecoracao <> 0 ORDER BY o.dataOrcamentoEvento DESC");

            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }

        public function localFechado($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaLocal, avaliacaoLocal, i.idLocal, l.nomeLocal, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                        INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                        INNER JOIN tbCliente c ON c.idCliente = o.idCliente
                                        INNER JOIN tbLocal l ON l.idLocal = i.idLocal
                                            WHERE i.idLocal IN (SELECT idLocal FROM tbLocal WHERE idEmpresa = :id) AND confirmaLocal <> 0 ORDER BY o.dataOrcamentoEvento DESC");
            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }

        public function segurancaFechado($id){
            $conexao = Conexao::conectar(); 

            $stmt = $conexao->prepare("SELECT idItemOrcamento, confirmaSeguranca, avaliacaoSeguranca, i.idSeguranca, s.descSeguranca, c.nomeCliente, o.valorOrcamentoEvento, DATE_FORMAT(o.dataOrcamentoEvento, '%d/%m/%Y') AS 'Data' FROM tbItemOrcamento i
                                        INNER JOIN tbOrcamentoEvento o ON o.idOrcamentoEvento = i.idOrcamentoEvento
                                        INNER JOIN tbCliente c ON c.idCliente = o.idCliente
                                        INNER JOIN tbSeguranca s ON s.idSeguranca = i.idSeguranca
                                            WHERE i.idSeguranca IN (SELECT idSeguranca FROM tbSeguranca WHERE idEmpresa = :id) AND confirmaSeguranca <> 0 ORDER BY o.dataOrcamentoEvento DESC");
            $stmt->bindValue("id", $id); 
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        }

       


        

    }



    

?>
