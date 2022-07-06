<?php 
    include("Conexao.php");

    $stmt = $pdo->prepare("SELECT count(idCliente) FROM tbCliente");	
	$stmt ->execute();   
    $row = $stmt ->fetch(PDO::FETCH_NUM);
    
    $stmt2 = $pdo->prepare("SELECT count(idServico) FROM tbServico");	
	$stmt2 ->execute();   
    $row2 = $stmt2 ->fetch(PDO::FETCH_NUM);

    $stmt3 = $pdo->prepare("SELECT count(idEmpresa) FROM tbEmpresa");	
	$stmt3 ->execute();   
    $row3 = $stmt3 ->fetch(PDO::FETCH_NUM);

    $stmt4 = $pdo->prepare("SELECT sum(valorOrcamentoEvento) FROM tborcamentoevento");	
	$stmt4 ->execute();   
    $row4 = $stmt4 ->fetch(PDO::FETCH_NUM);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Party - Dashboard</title>
  <link rel="icon" type="image/png" href="../view/images/balão.png" loading="lazy" />
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Serviço', 'Quantidade'],

                <?php
                    $stmt7 = $pdo->prepare("SELECT COUNT(idBUffet) FROM tbBuffet");
                    $stmt7->execute();
                ?>
                ['Local', <?php while($row7 = $stmt7 ->fetch(PDO::FETCH_BOTH)){ echo $row7[0]; } ?>],
                
                <?php
                    $stmt6 = $pdo->prepare("SELECT COUNT(idLocal) FROM tbLocal");
                    $stmt6->execute();
                ?>
                ['Buffet', <?php while($row6 = $stmt6 ->fetch(PDO::FETCH_BOTH)){ echo $row6[0]; } ?>],

                <?php
                    $stmt8 = $pdo->prepare("SELECT COUNT(idDecoracao) FROM tbDecoracao");
                    $stmt8->execute();
                ?>
                ['Decoração', <?php while($row8 = $stmt8 ->fetch(PDO::FETCH_BOTH)){ echo $row8[0]; } ?>],

                <?php
                    $stmt9 = $pdo->prepare("SELECT COUNT(idSeguranca) FROM tbSeguranca");
                    $stmt9->execute();
                ?>
                ['Decoração', <?php while($row9 = $stmt9 ->fetch(PDO::FETCH_BOTH)){ echo $row9[0]; } ?>],

               
            ]);

            var options = {
                title: 'Quantidade de trabalho por Serviço',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>


    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="title">Olá Administrador!</span>
                    </a>
                </li>

                <li>
                    <a href="./index-adm.php">
                        <span class="icon">
                            <i class="fa-solid fa-square-poll-vertical"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="./Cliente.php">
                        <span class="icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="title">Clientes

                        </span>
                    </a>
                </li>

                <li>
                    <a href="./Empresa.php">
                        <span class="icon">
                            <i class="fa-solid fa-shop"></i>
                        </span>
                        <span class="title">
                            Empresas
                        </span>
                    </a>
                </li>

                <li>
                    <a href="./Servicos.php">
                        <span class="icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </span>
                        <span class="title">
                            Serviços
                        </span>
                    </a>
                </li>


                <li>
                    <a href="./index.php">
                        <span class="icon">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>


             
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">

            <div class="card">
                    <div>
                        <div class="numbers">R$ <?php echo number_format($row4[0], 2, ",", ".") ?></div>
                        <div class="cardName">Soma dos Orçamentos</div>
                    </div>

                    <div class="iconBx">
                    </div>
                </div>
                
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row[0] ?></div>
                        <div class="cardName">Quantidade de Clientes</div>
                    </div>

                    <div class="iconBx">
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row2[0] ?></div>
                        <div class="cardName">Quantidade de Serviços</div>   
                    </div>

                    <div class="iconBx">
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"> <?php echo $row3[0]?></div>
                        <div class="cardName">Quantidade de Empresas</div>
                    </div>

                    
                </div>

                
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                    </div>
        <center>
                    <div id="piechart_3d" style="width: 900px; height: 550px;"></div>
    </center>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Orçamentos recentes</h2>
                    </div>

                   
                    <table>
                    <?php 

                   //DATE_FORMAT('dataOrcamentoEvento', '%d/%m/%Y')

                        $stmt5 = $pdo->prepare("SELECT nomeCliente,valorOrcamentoEvento,DATE_FORMAT(dataOrcamentoEvento, '%d/%m/%Y') FROM tbcliente 
                        INNER JOIN tbOrcamentoEvento
                        ON tbOrcamentoEvento.idCliente = tbCLiente.idCliente
                        ORDER BY idOrcamentoEvento DESC");	
						$stmt5 ->execute();
                        //$row5 = $stmt5 ->fetch(PDO::FETCH_NUM);

                        while($row5 = $stmt5 ->fetch(PDO::FETCH_BOTH)){
                            echo ('<tr>');
                                echo '<td>';
                                    echo '<h4><b>Cliente:</b> '. $row5[0]. '<br> <b><span>R$:</b> '. $row5[1].'</span> <br> <b><span>Data:</b> '. $row5[2].'</span></h4>';
                                echo '</td>';
                            echo ('</tr>');
						}	
                    ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    
</body>

</html>