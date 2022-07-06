<?php
session_start();
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

$idSession = $_SESSION['idEmpresa'];

$item = new ItemOrcamento();

$contratoBuffet     =   $item->contratoBuffet($idSession);
$contratoDecoracao  =   $item->contratoDecoracao($idSession);
$contratoLocal      =   $item->contratoLocal($idSession);
$contratoSeguranca  =   $item->contratoSeguranca($idSession);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


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
                    <img src="../../pages/dashboard/assets/img/empresa.png" alt="">
                </div>
            </div>

            <center>
                <!--==================== STEPS ====================-->
                <!-- <section class="steps section container"> -->
                <div class="steps__bg">
                    <h2 class="section__title-center steps__title">
                    </h2>

                    <?php if (!empty($contratoBuffet) or !empty($contratoDecoracao) or !empty($contratoLocal) or !empty($contratoSeguranca)) { ?>

                        <?php if (!empty($contratoBuffet)) { ?>

                            <div class="step__title__section">
                                <h1>Pendentes - Buffet</h1>
                            </div>

                            <div class="steps__container grid">

                                <?php
                                if (isset($contratoBuffet)) {
                                    foreach ($contratoBuffet as $row) {
                                ?>


                                        <div class="steps__card">

                                            <div class="steps__card-number" style="background-color: #f0be00;">Pendente</div>
                                            <h2 class="steps__card-title"> <?php echo $row['nomeBuffet']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?> </p>
                                            <h3>Data: <?php echo $row['Data']; ?></h3>
                                            <h4>Cliente: <?php echo $row['nomeCliente']; ?> </h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <form action="" name="formBudget">
                                                <input type="hidden" name="" value="<?php echo $row['idItemOrcamento']; ?>" id="idOrcamentoBuffet">
                                                <button class="bt" id="confirmarBuffet">Aprovar</button>
                                                <button class="bt" id="negarBuffet">Negar</button>
                                            </form>

                                        </div>

                                <?php }
                                } ?>

                            </div>

                            <br>
                            <hr class="hr-style">
                            <br>

                        <?php } ?>



                        <?php if (!empty($contratoDecoracao)) { ?>

                            <br>

                            <div class="step__title__section">
                                <h1>Pendentes - Decoração</h1>
                            </div>

                            <div class="steps__container grid">

                                <?php
                                if (isset($contratoDecoracao)) {
                                    foreach ($contratoDecoracao as $row) {
                                ?>

                                        <div class="steps__card">

                                            <div class="steps__card-number" style="background-color: #f0be00;">Pendente</div>
                                            <h2 class="steps__card-title"> <?php echo $row['nomeDecoracao']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?></p>
                                            <h3>Data: <?php echo $row['Data']; ?></h3>
                                            <h4>Cliente: <?php echo $row['nomeCliente']; ?></h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <form action="" name="formBudget">
                                                <input type="hidden" name="" value="<?php echo $row['idItemOrcamento']; ?>" id="idOrcamentoDecoracao">
                                                <button class="bt" id="confirmarDecoracao">Aprovar</button>
                                                <button class="bt" id="negarDecoracao">Negar</button>
                                            </form>

                                        </div>

                                <?php }
                                } ?>

                            </div>

                            <br>
                            <hr class="hr-style">
                            <br>

                        <?php } ?>



                        <?php if (!empty($contratoLocal)) { ?>

                            <br>

                            <div class="step__title__section">
                                <h1>Pendentes - Local</h1>
                            </div>

                            <div class="steps__container grid">

                                <?php
                                if (isset($contratoLocal)) {
                                    foreach ($contratoLocal as $row) {
                                ?>

                                        <div class="steps__card">

                                            <div class="steps__card-number" style="background-color: #f0be00;">Pendente</div>
                                            <h2 class="steps__card-title"> <?php echo $row['nomeLocal']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?></p>
                                            <h3>Data: <?php echo $row['Data']; ?></h3>
                                            <h4> Cliente: <?php echo $row['nomeCliente']; ?></h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <form action="" name="formBudget">
                                                <input type="hidden" name="" value="<?php echo $row['idItemOrcamento']; ?>" id="idOrcamentoLocal">
                                                <button class="bt" id="confirmarLocal">Aprovar</button>
                                                <button class="bt" id="negarLocal">Negar</button>
                                            </form>

                                        </div>

                                <?php }
                                } ?>

                            </div>

                            <br>
                            <hr class="hr-style">
                            <br>

                        <?php } ?>



                        <?php if (!empty($contratoSeguranca)) { ?>

                            <br>

                            <div class="step__title__section">
                                <h1>Pendentes - Local</h1>
                            </div>

                            <div class="steps__container grid">


                                <?php
                                if (isset($contratoSeguranca)) {
                                    foreach ($contratoSeguranca as $row) {
                                ?>

                                        <div class="steps__card">

                                            <div class="steps__card-number" style="background-color: #f0be00;">Pendente</div>
                                            <h2 class="steps__card-title"> <?php echo $row['descSeguranca']; ?> </h2>
                                            <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?></p>
                                            <h3>Data: <?php echo $row['Data']; ?></h3>
                                            <h4> Cliente: <?php echo $row['nomeCliente']; ?></h4>
                                            <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                                            <form action="" name="formBudget">
                                                <input type="hidden" name="" value="<?php echo $row['idItemOrcamento']; ?>" id="idOrcamentoSeguranca">
                                                <button class="bt" id="confirmarSeguranca">Aprovar</button>
                                                <button class="bt" id="negarSeguranca">Negar</button>
                                            </form>

                                        </div>

                                <?php }
                                } ?>

                            </div>

                            <br>

                        <?php } ?>

                    <?php } else { ?>

                        <div class="steps__card">
                            <h1>Nenhum orçamento pendente.</h1>
                        </div>

                    <?php } ?>

                </div>

                </section>

            </center>
        </div>
    </div>


    <!-- =========== Scripts =========  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script>
        $(document).ready(() => {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }


            // -----------------------------------------------


            $('#confirmarBuffet').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoBuffet').val(),
                    fecharBuffet: 1
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)
                })

            })

            $('#negarBuffet').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoBuffet').val(),
                    fecharBuffet: 2
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)

                })

            })


            // -----------------------------------------------


            $('#confirmarDecoracao').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoDecoracao').val(),
                    fecharDecoracao: 1
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)
                })

            })

            $('#negarDecoracao').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoDecoracao').val(),
                    fecharDecoracao: 2
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)

                })

            })


            // -----------------------------------------------


            $('#confirmarLocal').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoLocal').val(),
                    fecharLocal: 1
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)
                })

            })

            $('#negarLocal').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoLocal').val(),
                    fecharLocal: 2
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)

                })

            })


            // -----------------------------------------------


            $('#confirmarSeguranca').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoSeguranca').val(),
                    fecharSeguranca: 1
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)
                })

            })

            $('#negarSeguranca').click(async (e) => {
                e.preventDefault()

                $.post('./fechar-contrato.php', {
                    idOrcamento: $('#idOrcamentoSeguranca').val(),
                    fecharSeguranca: 2
                }, function(data) {

                    var obj = JSON.parse(data);
                    toastr.success(obj.msg, obj.title);

                    setTimeout(() => {
                        location.reload()
                    }, 3000)

                })

            })
        })
    </script>



</body>

</html>