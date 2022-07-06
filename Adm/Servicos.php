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
    <title>Your Party - Serviço</title>
  <link rel="icon" type="image/png" href="../view/images/balão.png" loading="lazy" />
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

    

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
                        <div class="icon">
                            <img src="../privateWork/pages/dashboard/assets/img/balão.png" width="35px" heigh="35px">
                        </div>
                        <span class="title">YOUR PARTY</span>
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
                        <div class="numbers"><?php echo $row2[0] ?></div>
                        <div class="cardName">Quantidade de Serviços</div>   
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
                        <div class="numbers"> <?php echo $row3[0]?></div>
                        <div class="cardName">Quantidade de Empresas</div>
                    </div>

                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">R$ <?php echo number_format($row4[0], 2, ",", ".") ?></div>
                        <div class="cardName">Soma dos Orçamentos</div>
                    </div>

                    <div class="iconBx">
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                   
                    <div>
                        <form action="./crud/servico-inserir.php" method="post">
                            <input type="hidden" placeholder="idServico" name="txIdServico" value="<?php echo @$_GET['idServico'];?>" />
                            <input type="text" name="txServico" id="txServico" placeholder="Cadastrar Serviço" value="<?php echo @$_GET['servico'];?>">
                            <button type="submit">
                                Cadastrar
                            </button>
                        </form>
                    </div>
                    <div class="table_responsive">

                    
            <table>
                <thead>
                    <tr>
                        <th> Código: </th>
                        <th> Serviço: </th>
                        <th> ?? </th>
                    </tr>

                </thead>
                <tbody>
                    <?php  
                     $stmt5 = $pdo->prepare("SELECT * FROM tbServico");	
                     $stmt5 ->execute();
                     //$row5 = $stmt5 ->fetch(PDO::FETCH_NUM);

                    while($row5 = $stmt5 ->fetch(PDO::FETCH_BOTH)) { ?>
                        <tr>
                            <td> <?php echo $row5[0] ?> </td>
                            <td> <?php echo $row5[1] ?> </td>
                            <td> 
                                <?php echo "<a href='./crud/servico-excluir.php?id=$row5[0]'>Excluir</a>" ?>
                                <?php echo "<a href='./crud/servico-alteracao.php'>Alterar</a>" ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
                    </div>

                   
                </div>

                

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Empresas recentes</h2>
                    </div>

                   
                    <table>
                    <?php 
                        $stmt5 = $pdo->prepare("SELECT nomeEmpresa,emailEmpresa FROM tbEmpresa 
                        ORDER BY idEmpresa DESC");	
						$stmt5 ->execute();
                        //$row5 = $stmt5 ->fetch(PDO::FETCH_NUM);

                        while($row5 = $stmt5 ->fetch(PDO::FETCH_BOTH)){
                            echo ('<tr>');
                               
                                echo '<td>';
                                    echo '<b><h4>Empresas:</b> '. $row5[0]. '<br> <b><span>Email:</b> '. $row5[1].'</span></h4>';
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