<?php

include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';

require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';
require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
require_once '/xampp/htdocs/yourParty/Classes/Local.php';
require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

$empresa = new Empresa();

if (isset($_SESSION['idEmpresa']) && !empty($_SESSION['idEmpresa'])) {
    $idSession = $_SESSION['idEmpresa'];
}

if (isset($idSession)) {
    $list = $empresa->listar($idSession);
}

$buffet = new Buffet();
$contarBuffet = $buffet->contarBuffet($idSession);

$decoracao = new Decoracao();
$contarDecoracao = $decoracao->contarDecoracao($idSession);

$local = new Local();
$contarLocal = $local->contarLocal($idSession);

$seguranca = new Seguranca();
$contarSeguranca = $seguranca->contarSeguranca($idSession);


$mes = date('m');
$countBuffet = $empresa->countOrcamentoBuffet($idSession, $mes);
$countLocal = $empresa->countOrcamentoLocal($idSession, $mes);
$countDecoracao = $empresa->countOrcamentoDecoracao($idSession, $mes);
$countSeguranca = $empresa->countOrcamentoSeguranca($idSession, $mes);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="assets/img/balão.png" type="image/x-icon">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="assets/img/balão.png" alt="">
                        </span>
                        <span class="title-yp"> YOUR PARTY </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        <span class="title">Painel</span>
                    </a>
                </li>

                <li>
                    <a href="../buffet/index-buffet-2.php">
                        <span class="icon">
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                        </span>
                        <span class="title"> Buffet</span>
                    </a>
                </li>

                <li>
                    <a href="../decoracao/index-decoracao-2.php">
                        <span class="icon">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                        </span>
                        <span class="title">Decoração </span>
                    </a>
                </li>

                <li>
                    <a href="../local/index-local-2.php">
                        <span class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                        <span class="title">Local / Segurança </span>
                    </a>
                </li>

                <li>
                    <a href="../avaliacao/index.php">
                        <span class="icon">
                            <i class="fa-solid fa-lock" aria-hidden="true"></i>
                        </span>
                        <span class="title">Orçamentos Concluídos</span>
                    </a>
                </li>

                <li>
                    <a href="../avaliacao/budgetpendentes.php">
                        <span class="icon">
                            <i class="fa-solid fa-question" aria-hidden="true"></i>
                        </span>
                        <span class="title">Orçamentos Pendentes</span>
                    </a>
                </li>

                <li>
                    <a href="../sair-empresa.php">
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
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="user">
                    <img src="assets/img/empresa.png" alt="">
                </div>
            </div>

            <!-- ======================= SEJA BEM VINDO =============================== -->
            <h1>Olá, <?php echo $list['nomeEmpresa'] ?>!</h1>
            <!-- ======================= Cards ================== -->
            <div class="cardBox">

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $contarBuffet[0]; ?></div>
                        <div class="cardName">Pacotes De Buffet</div>
                    </div>


                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $contarDecoracao[0]; ?></div>
                        <div class="cardName">Pacotes De Decoração</div>
                    </div>


                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $contarSeguranca[0]; ?></div>
                        <div class="cardName"> Pacotes De Segurança</div>
                    </div>


                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $contarLocal[0]; ?></div>
                        <div class="cardName">Pacotes De Local</div>
                    </div>

                </div>

            </div>




            <div class="cardBox2">

                <div class="card2">

                    <div>
                        
                        <h1 class="cardName1"> Orçamentos do Mês </h1>
                    </div>

                    <div id="chartBar"></div>

                    <!-- GRÁFICO ^^^^^^ -->

                </div>

            </div>




            <!-- =========== Scripts =========  -->
            <script src="assets/js/main.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


            <script>
                var optionsBar = {
                    chart: {
                        type: 'bar'
                    },

                    plotOptions: {
                        bar: {
                            distributed: true
                        }
                    },

                    series: [{
                        data: [

                            <?php
                            if (isset($countBuffet) && !empty($countBuffet)) {
                                foreach ($countBuffet as $row) {
                            ?>

                                    {

                                        x: 'Buffet',
                                        y: <?php
                                            if ($row['Conta'] > 0) {
                                                echo $row['Conta'];
                                            } else {
                                                echo 0;
                                            }
                                            ?>
                                    },

                            <?php }
                            } ?>


                            <?php
                            if (isset($countLocal) && !empty($countLocal)) {
                                foreach ($countLocal as $row) {
                            ?>

                                    {
                                        x: 'Local',
                                        y: <?php
                                            if ($row['Conta'] > 0) {
                                                echo $row['Conta'];
                                            } else {
                                                echo 0;
                                            }
                                            ?>
                                    },

                            <?php }
                            } ?>


                            <?php
                            if (isset($countDecoracao) && !empty($countDecoracao)) {
                                foreach ($countDecoracao as $row) {
                            ?>

                                    {
                                        x: 'Decoração',
                                        y: <?php
                                            if ($row['Conta'] > 0) {
                                                echo $row['Conta'];
                                            } else {
                                                echo 0;
                                            }
                                            ?>
                                    },

                            <?php }
                            } ?>


                            <?php
                            if (isset($countSeguranca) && !empty($countSeguranca)) {
                                foreach ($countSeguranca as $row) {
                            ?>

                                    {
                                        x: 'Segurança',
                                        y: <?php
                                            if ($row['Conta'] > 0) {
                                                echo $row['Conta'];
                                            } else {
                                                echo 0;
                                            }
                                            ?>
                                    },

                            <?php }
                            } ?>

                        ]
                    }]
                }

                var chart_bar = new ApexCharts(document.querySelector("#chartBar"), optionsBar);
                var chart_bar1 = new ApexCharts(document.querySelector("#chartBar1"), optionsBar);

                chart_bar.render();
                chart_bar1.render();
            </script>


            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>