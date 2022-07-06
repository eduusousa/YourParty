<?php
session_start();
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

$idSession = $_SESSION['idEmpresa'];

$item = new ItemOrcamento();

$contratoBuffet     =   $item->buffetFechado($idSession);
$contratoDecoracao  =   $item->decoracaoFechado($idSession);
$contratoLocal      =   $item->localFechado($idSession);
$contratoSeguranca  =   $item->segurancaFechado($idSession);

// echo "<pre>";
// print_r($contratoBuffet);
// echo "</pre>";

?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../dashboard/assets/css/style.css">
    <link rel="stylesheet" href="../../css/avalia2.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="../dashboard/assets/img/balão.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../dashboard/assets/img/balão.png" alt="">
                        </span>
                        <span class="title-yp"> YOUR PARTY </span>
                    </a>
                </li>

                <li>
                    <a href="../dashboard/dashboard2.php">
                        <span class="icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        <span class="title">Painel</span>
                    </a>
                </li>

                <li>
                    <a href="#">
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
                    <img src="../../pages/dashboard/assets/img/empresa.png" alt="">
                </div>
            </div>

            <center>
                <!--==================== STEPS ====================-->
                <!-- <section class="steps section container"> -->
                <div class="steps__bg">
                    <h2 class="section__title-center steps__title">
                    </h2>

                    <?php if( !empty($contratoBuffet) OR !empty($contratoDecoracao) OR !empty($contratoLocal) OR !empty($contratoSeguranca)){ ?>


                        <?php if (!empty($contratoBuffet)) { ?>

                            <div class="step__title__section">
                                <h1> Concluídos - Buffet</h1>
                            </div>


                            <div class="steps__container grid">



                                <?php
                                if (isset($contratoBuffet)) {

                                    foreach ($contratoBuffet as $row) {

                                        if ($row['confirmaBuffet'] == 1) {
                                            $status = 'Aprovado';
                                            $color = '#228b22';
                                        } else if ($row['confirmaBuffet'] == 2) {
                                            $status = 'Negado';
                                            $color = '#df0000';
                                        }

                                ?>

                                        <div class="steps__card">
                                            <div class="steps__card-number" style="background-color: <?php echo $color; ?> "> <?php echo $status; ?> </div>
                                            <h2 class="steps__card-title"> <?php echo $row['nomeBuffet']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?></p>
                                            <h3>Data: <?php echo $row['Data']; ?> </h3>
                                            <h4>Cliente: <?php echo $row['nomeCliente']; ?> </h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <?php
                                            if ($row['confirmaBuffet'] == 1 && $row['avaliacaoBuffet'] > 0) {
                                            ?>
                                                <h3>Nota Cliente: <?php echo $row['avaliacaoBuffet']; ?></h3>

                                            <?php } else if ($row['confirmaBuffet'] == 1 && $row['avaliacaoBuffet'] == 0) { ?>
                                                <h3>Nota Cliente: pendente </h3>

                                            <?php } ?>

                                        </div>

                                <?php }
                                } ?>

                                <!-- -------------------------------- -->


                            </div>

                            <br>
                            <hr class="hr-style">
                            <br>

                        <?php } ?>



                        <?php if (!empty($contratoDecoracao)) { ?>

                            <div class="step__title__section">
                                <h1> Concluídos - Decoração</h1>
                            </div>


                            <div class="steps__container grid">

                                <?php
                                if (isset($contratoDecoracao)) {

                                    foreach ($contratoDecoracao as $row) {

                                        if ($row['confirmaDecoracao'] == 1) {
                                            $status = 'Aprovado';
                                            $color = '#228b22';
                                        } else if ($row['confirmaDecoracao'] == 2) {
                                            $status = 'Negado';
                                            $color = '#df0000';
                                        }

                                ?>

                                        <div class="steps__card">
                                            <div class="steps__card-number" style="background-color: <?php echo $color; ?> "> <?php echo $status; ?> </div>
                                            <h2 class="steps__card-title"> <?php echo $row['nomeDecoracao']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?></p>
                                            <h3>Data: <?php echo $row['Data']; ?> </h3>
                                            <h4>Cliente: <?php echo $row['nomeCliente']; ?> </h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <?php
                                            if ($row['confirmaDecoracao'] == 1 && $row['avaliacaoDecoracao'] > 0) {
                                            ?>
                                                <h3>Nota Cliente: <?php echo $row['avaliacaoDecoracao']; ?></h3>

                                            <?php } else if ($row['confirmaDecoracao'] == 1 && $row['avaliacaoDecoracao'] == 0) { ?>
                                                <h3>Nota Cliente: pendente </h3>

                                            <?php } ?>

                                        </div>

                                <?php }
                                } ?>

                            </div>

                            <br>
                            <hr class="hr-style">
                            <br>

                        <?php } ?>



                        <?php if (!empty($contratoLocal)) { ?>

                            <div class="step__title__section">
                                <h1> Concluídos - Local</h1>
                            </div>


                            <div class="steps__container grid">

                                <?php
                                if (isset($contratoLocal)) {

                                    foreach ($contratoLocal as $row) {

                                        if ($row['confirmaLocal'] == 1) {
                                            $status = 'Aprovado';
                                            $color = '#228b22';
                                        } else if ($row['confirmaLocal'] == 2) {
                                            $status = 'Negado';
                                            $color = '#df0000';
                                        }

                                ?>

                                        <div class="steps__card">
                                            <div class="steps__card-number" style="background-color: <?php echo $color; ?> "> <?php echo $status; ?> </div>
                                            <h2 class="steps__card-title"> <?php echo $row['nomeLocal']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?></p>
                                            <h3>Data: <?php echo $row['Data']; ?> </h3>
                                            <h4>Cliente: <?php echo $row['nomeCliente']; ?> </h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <?php
                                            if ($row['confirmaLocal'] == 1 && $row['avaliacaoLocal'] > 0) {
                                            ?>
                                                <h3>Nota Cliente: <?php echo $row['avaliacaoLocal']; ?></h3>

                                            <?php } else if ($row['confirmaLocal'] == 1 && $row['avaliacaoLocal'] == 0) { ?>
                                                <h3>Nota Cliente: pendente </h3>

                                            <?php } ?>

                                        </div>

                                <?php }
                                } ?>

                            </div>

                            <br>
                            <hr class="hr-style">
                            <br>

                        <?php } ?>



                        <?php if (!empty($contratoSeguranca)) { ?>

                            <div class="step__title__section">
                                <h1> Concluídos - Segurança</h1>
                            </div>


                            <div class="steps__container grid">

                                <?php
                                    if (isset($contratoSeguranca)) {

                                    foreach ($contratoSeguranca as $row) {

                                        if ($row['confirmaSeguranca'] == 1) {
                                            $status = 'Aprovado';
                                            $color = '#228b22';
                                        } else if ($row['confirmaSeguranca'] == 2) {
                                            $status = 'Negado';
                                            $color = '#df0000';
                                        }

                                ?>

                                        <div class="steps__card">
                                            <div class="steps__card-number" style="background-color: <?php echo $color; ?> "> <?php echo $status; ?> </div>
                                            <h2 class="steps__card-title"> <?php echo $row['descSeguranca']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?></p>
                                            <h3>Data: <?php echo $row['Data']; ?> </h3>
                                            <h4>Cliente: <?php echo $row['nomeCliente']; ?> </h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <?php
                                            if ($row['confirmaSeguranca'] == 1 && $row['avaliacaoSeguranca'] > 0) {
                                            ?>
                                                <h3>Nota Cliente: <?php echo $row['avaliacaoSeguranca']; ?></h3>

                                            <?php } else if ($row['confirmaSeguranca'] == 1 && $row['avaliacaoSeguranca'] == 0) { ?>
                                                <h3>Nota Cliente: pendente </h3>

                                            <?php } ?>

                                        </div>

                                <?php }
                                } ?>

                            </div>

                            <br>


                        <?php } ?>

                    <?php } else { ?>

                        <div class="steps__card">
                            <h1>Nenhum orçamento concluído.</h1>
                        </div>

                    <?php } ?>


                </div>

                </section>

            </center>

        </div>
    </div>




    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>