<?php

    require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
    require_once '/xampp/htdocs/yourParty/Classes/Local.php';
    require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
    require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';
    require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

    $buffet     =   new Buffet();
    $local      =   new Local();
    $decoracao  =   new Decoracao();
    $seguranca  =   new Seguranca();
    $item       =   new ItemOrcamento();

    $condicoes_buffet       =   '';
    $condicoes_local        =   '';
    $condicoes_decoracao    =   '';
    $condicoes_seguranca    =   '';
    $output = '';



    if (isset($_POST['busca']) && strlen($_POST['busca'])){

        $busca = filter_input(INPUT_POST, 'busca', FILTER_DEFAULT);
        $keys = explode(' ', $busca);

        foreach ($keys as $word) 
        {

            $condicoes_buffet .= "nomeBuffet LIKE '%" . $word . "%' OR descricaoBuffet LIKE '%" . $word . "%' OR ib.nomeItemBuffet LIKE '%" . $word . "%' OR ";

            $condicoes_local .= "nomeLocal LIKE '%" . $word . "%' OR enderecoLocal LIKE '%" . $word . "%' OR bairroLocal LIKE '%" . $word . "%' OR ";
            
            $condicoes_decoracao .= "nomeDecoracao LIKE '%" . $word . "%' OR descDecoracao LIKE '%" . $word . "%' OR tipoDecoracao LIKE '%" . $word . "%' OR temaDecoracao LIKE '%" . $word . "%' OR it.nomeItemDecoracao LIKE '%" . $word . "%' OR ";

            $condicoes_seguranca .= "descSeguranca LIKE '%" . $word . "%' OR ";

        }

        $where_buffet = substr($condicoes_buffet, 0, strlen($condicoes_buffet) - 3);
        $where_local = substr($condicoes_local, 0, strlen($condicoes_local) - 3);
        $where_decoracao = substr($condicoes_decoracao, 0, strlen($condicoes_decoracao) - 3);
        $where_seguranca = substr($condicoes_seguranca, 0, strlen($condicoes_seguranca) - 3);


        $listBuffet = $buffet->searchBuffet($where_buffet);
        $listLocal = $local->searchLocal($where_local);
        $listDecoracao = $decoracao->searchDecoracao($where_decoracao);
        $listSeguranca = $seguranca->searchSeguranca($where_seguranca);


        if(!empty($listBuffet) OR !empty($listDecoracao) OR !empty($listLocal) OR !empty($listSeguranca))
        {


            if(isset($listBuffet)){

                foreach($listBuffet as $row){

                    $avgBuf = $item->avgAvaliacaoBuffet($row['idBuffet']);
                    if ($avgBuf[0] == NULL) {
                        $avgBuf = 0;
                    
                    } else {
                        $avgBuf = $avgBuf[0];
                            
                    }

                    $output .= 
                    '<div class="pro">
                        <img src="../../../privateWork/'.$row["fotoBuffet"].'">
                        <div class="des">
                            <span>'. $row['nomeEmpresa'].'</span>
                            <h5>'. $row['nomeBuffet'].'</h5>

                            <div class="star">
                                <i>
                                    <p> '. $avgBuf .' <ion-icon name="star"></ion-icon> </p>
                                </i>
                            </div>
                                
                            <h4>R$'.$row["valorBuffet"].'</h4>

                            <a href="../details/itenscard.php?servico=buffet&id='. $row['idBuffet'].'">
                                + Detalhes
                            </a>
                        </div>
                    </div>
                    ';
                }
            }
            

            if(isset($listLocal)){

                foreach($listLocal as $row){

                    $avgLocal = $item->avgAvaliacaoLocal($row['idLocal']);
                    if ($avgLocal[0] == NULL) {
                        $avgLocal = 0;
                    
                    } else {
                        $avgLocal = $avgLocal[0];
                            
                    }

                    $output .= 
                        '<div class="pro">
                            <img src="../../../privateWork/'.$row["fotoLocal"].'">
                            <div class="des">
                                <span>'. $row['nomeEmpresa'].'</span>
                                <h5>'. $row['nomeLocal'].'</h5>

                                <div class="star">
                                    <i>
                                        <p> '. $avgLocal .' <ion-icon name="star"></ion-icon> </p>
                                    </i>
                                </div>
                                    
                                <h4>R$'.$row["valorLocal"].'</h4>

                                <a href="../details/itenscard.php?servico=local&id='. $row['idLocal'].'">
                                    + Detalhes
                                </a>
                            </div>
                        </div>
                    ';

                }

            }


            if(isset($listDecoracao)){

                foreach($listDecoracao as $row){

                    $avgDecoracao = $item->avgAvaliacaoDecoracao($row['idDecoracao']);
                    if ($avgDecoracao[0] == NULL) {
                        $avgDecoracao = 0;
                    
                    } else {
                        $avgDecoracao = $avgDecoracao[0];
                            
                    }

                    $output .= 
                    '<div class="pro">
                        <img src="../../../privateWork/'.$row["fotoDecoracao"].'">
                        <div class="des">
                            <span>'. $row['nomeEmpresa'].'</span>
                            <h5>'. $row['nomeDecoracao'].'</h5>

                            <div class="star">
                                <i>
                                    <p> '. $avgDecoracao .' <ion-icon name="star"></ion-icon> </p>
                                </i>
                            </div>
                                
                            <h4>R$'.$row["valorDecoracao"].'</h4>

                            <a href="../details/itenscard.php?servico=decoracao&id='. $row['idDecoracao'].'">
                                + Detalhes
                            </a>
                        </div>
                    </div>
                    ';
                }

            }


            if(isset($listSeguranca)){

                foreach($listSeguranca as $row){

                    $avgSeguranca = $item->avgAvaliacaoSeguranca($row['idSeguranca']);
                    if ($avgSeguranca[0] == NULL) {
                        $avgSeguranca = 0;
                    
                    } else {
                        $avgSeguranca = $avgSeguranca[0];
                            
                    }

                    $output .= 
                    '<div class="pro">
                        <img src="../../../privateWork/'.$row["fotoSeguranca"].'">
                        <div class="des">
                            <span>'. $row['nomeEmpresa'].'</span>
                            <h5>'. $row['descSeguranca'].'</h5>

                            <div class="star">
                                <i>
                                    <p> '. $avgSeguranca .' <ion-icon name="star"></ion-icon> </p>
                                </i>
                            </div>
                                
                            <h4>R$'.$row["valorSeguranca"].'</h4>

                            <a href="../details/itenscard.php?servico=seguranca&id='. $row['idSeguranca'].'">
                                + Detalhes
                            </a>

                        </div>
                    </div>
                ';


                }

            }

        }else{

            echo "<h3> Nenhum resultado encontrado referente a " . strtoupper($busca) . "</h3>";
      
        }



    }else{

        echo "<h3> Por favor, digite algo para consultarmos em nosso sistema. </h3>";

    }

    echo $output;


?>
