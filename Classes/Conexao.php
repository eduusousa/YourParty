<?php
    class Conexao{

        public $msgErro = "";

        public static function conectar(){
            try{

                $connection = new PDO(
                    "mysql:host=localhost;
                    dbname=bdyourparty"
                    ,"root"
                    ,""
                );
                
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connection->exec("SET CHARACTER SET utf8");

                return $connection;

            } catch(PDOException $e){

                global $msgErro;
                $msgErro = $e->getMessage();

                return $msgErro;
            }



        }

    }

?>