<?php
include_once '../../validation-pages.php';

require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
require_once '/xampp/htdocs/yourParty/Classes/Servico.php';
require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';

require_once '/xampp/htdocs/yourParty/Classes/Local.php';

$empresa = new Empresa();
$servico = new Servico();
$local = new Local();

$listServico  =  $servico->listar();
$listCity     =  $empresa->cidadeListar();
$listState    =  $empresa->estadoListar();

$localCity = $local->listarCidade();
$localState = $local->listarEstado();

if (isset($_POST['busca'])) {

    $busca = $_POST['busca'];
}



?>



<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Party - A sua festa inesquecível</title>
    <link rel="icon" type="image/png" href="./../../../view/images/balão.png" loading="lazy" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./css/style-teste.css" />
    <link rel="stylesheet" href="../../css/check-modal.css">
    <link rel="stylesheet" href="./css/toastr-notify.css">

    <!--=============== FILTER ===============-->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <link href="css/jquery-ui.css" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <main>
        <header id="header">

            <div class="overlay overlay-lg">
            </div>
            <nav>
                <div class="container">
                    <div class="logo">
                        <!-- <img src="./img/logo.png" alt="" /> -->
                        <a href="#" class="logo"><img src="../../../view/images/partyCompleta.png" loading="lazy" title="Sua festa dos sonhos"></a>
                    </div>

                    <div class="links">
                        <ul>
                            <li>
                                <a href="../../index-user.php">Home</a>
                            </li>
                            <li>
                                <a href="../search/search-page.php" class="active">Serviços</a>
                            </li>
                            <li>
                                <a href="../cart/carrinho.php">Carrinho</a>
                            </li>
                            <li>
                                <a href="../budget/budget.php">Meus Orçamentos</a>
                            </li>
                        </ul>
                    </div>

                    <div class="icons">
                        <a href="../profile/perfil-cliente.php" class="fa-regular fa-address-card" title="Perfil"></a>
                        <a href="../../sair-cliente.php" class="fa-solid fa-right-from-bracket" title="Sair"></a>
                    </div>


                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </nav>

        </header>

    </main>



    <section class="buffets" id="buffets">
        <div class="container">
            <div class="section-header">
                <div class="container">

                    <div class="row">
                        <br />
                        <br />

                        <div class="col-md-3">

                            <div class="list-group">

                                <div style="height: 50px;">
                                    <form id="search">
                                        <input type="text" id="pesquisa" class="common_selector search pesquisar" placeholder="Pesquise aqui..." value="<?php if (isset($busca)) {
                                                                                                                                                            echo $busca;
                                                                                                                                                        } ?>">
                                    </form>
                                </div>

                            </div>

                            <!-- FAIXA DE PREÇO -->
                            <div class="list-group">
                                <div style="height: 100px;">

                                    <h3>Faixa de Preço </h3>

                                    <input type="hidden" id="hidden_minimum_price" value="100" />
                                    <input type="hidden" id="hidden_maximum_price" value="10001" />

                                    <p id="price_show"> 10 - 10000 </p>
                                    <div id="price_range"></div>

                                </div>
                            </div>



                            <!-- LISTA POR SERVIÇO -->
                            <div class="list-group">

                                <div style="height: 250px; overflow-y: auto; overflow-x: hidden;">

                                    <h3>Serviços</h3>

                                    <?php foreach ($listServico as $row) { ?>
                                        <div class="list-group-item checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector servico" value="<?php echo $row['nomeServico']; ?>" checked>
                                                <?php echo $row['nomeServico']; ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>

                            </div>



                            <!-- LISTA POR CIDADE// EMPRESA -->
                            <div class="list-group">
                                <div style="margin-top: 15%; height: 180px; overflow-y: auto; overflow-x: hidden;">

                                    <h3>Cidade - Empresa</h3>
                                    <?php foreach ($listCity as $row) { ?>
                                        <div class="list-group-item checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector cidade" value="<?php echo $row['cidadeEmpresa']; ?>">
                                                <?php echo $row['cidadeEmpresa']; ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>



                            <!-- LISTA POR ESTADO// EMPRESA -->
                            <div class="list-group">
                                <div style="margin-top: 15%; height: 180px; overflow-y: auto; overflow-x: hidden;">

                                    <h3>Estado - Empresa</h3>
                                    <?php foreach ($listState as $row) { ?>
                                        <div class="list-group-item checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector estado" value="<?php echo $row['estadoEmpresa']; ?>">
                                                <?php echo $row['estadoEmpresa']; ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>


                            <!-- LISTA POR CIDADE// SALÃO -->
                            <div class="list-group">
                                <div style="margin-top: 15%; height: 180px; overflow-y: auto; overflow-x: hidden;">

                                    <h3>Cidade - Salão</h3>
                                    <?php foreach ($localCity as $row) { ?>
                                        <div class="list-group-item checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector cidadeSalao" value="<?php echo $row['cidadeLocal']; ?>">
                                                <?php echo $row['cidadeLocal']; ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>



                            <!-- LISTA POR ESTADO// SALÃO -->
                            <div class="list-group">
                                <div style="margin-top: 15%; height: 180px; overflow-y: auto; overflow-x: hidden;">

                                    <h3>Estado - Salão</h3>
                                    <?php foreach ($localState as $row) { ?>
                                        <div class="list-group-item checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector estadoSalao" value="<?php echo $row['estadoLocal']; ?>">
                                                <?php echo $row['estadoLocal']; ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                        </div>


                        <div class="col-md-11">

                            <section id="feature" class="section-p1">

                                <section id="product1" class="section-p1">
                                    <h3 class="title" data-title="Nossos">Serviços</h3>

                                    <div class="pro-container">
                                    </div>


                                </section>
                            </section>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="container">
            <div class="grid-4">
                <div class="grid-4-col footer-about">
                    <h3 class="title-sm"><img src="../../../view/images/partyCompleta.png"></h3>
                    <p class="text">
                        Sua festa dos sonhos em um só clique.
                    </p>
                </div>

                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">Ir para</h3>
                    <ul>
                    <li>
                            <a href="#">Buffet's</a>
                        </li>
                        <li>
                            <a href="#">Decorações</a>
                        </li>
                        <li>
                            <a href="#">Local</a>
                        </li>
                        <li>
                            <a href="#">Seguranças</a>
                        </li>
                    </ul>
                </div>

                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">Serviços</h3>
                    <ul>
                        <li>
                            <a href="#">Buffet's</a>
                        </li>
                        <li>
                            <a href="#">Decorações</a>
                        </li>
                        <li>
                            <a href="#">Local</a>
                        </li>
                        <li>
                            <a href="#">Seguranças</a>
                        </li>
                    </ul>
                </div>
                <div class="grid-4-col footer-newstletter">
                    <h3 class="title-sm">Gostou?</h3>
                    <p class="text">
                        Venha fazer uma festa incrível conosco!
                    </p>
                </div>
            </div>

            <div class="bottom-footer">
                <div class="copyright">
                    <p class="text">
                        Copyright&copy; <?php echo date('Y'); ?> Todos os direitos reservados | by
                        <span>Your Party - Early </span>
                    </p>
                </div>

                <div class="followme-wrap">
                    <div class="followme">
                        <h3>Siga-nos</h3>
                        <span class="footer-line"></span>
                        <div class="social-media">
                            <a href="https://www.instagram.com/early.fox/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>

                    <div class="back-btn-wrap">
                        <a href="#" class="back-btn">
                            <i class="fas fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="../../js/busca.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/isotope.pkgd.min.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="./js/app.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!--===============VERIFICAR CARRINHO ===============-->
    <script>
        // ----------------| BUFFET
        function checkBuffet(self) {
            const id = self.getAttribute('data-id')

            <?php

            if (isset($_SESSION['carrinho']['buffet'])) {

                $bool = 1;
            } else {

                $bool = 0;
            }

            ?>

            if (<?php echo $bool; ?> == 1) {

                toastr.info(
                    "<p> Já existe um Buffet no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmBuffet(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
                )

            } else {

                $.get('../cart/carrinho.php?product=buffet&acao=add&id=' + id + '')
                location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

            }

        }

        function confirmBuffet(id) {

            $.get('../cart/carrinho.php?product=buffet&acao=add&id=' + id + '')

            location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

        }

        // ----------------------------------------------- \\


        // ----------------| DECORAÇÃO
        function checkDecoracao(self) {
            const id = self.getAttribute('data-id')

            <?php

            if (isset($_SESSION['carrinho']['decoracao'])) {

                $bool = 1;
            } else {

                $bool = 0;
            }

            ?>

            if (<?php echo $bool; ?> == 1) {

                toastr.info(
                    "<p> Já existe uma Decoracao no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmDecoracao(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
                )

            } else {

                $.get('../cart/carrinho.php?product=decoracao&acao=add&id=' + id + '')
                location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

            }

        }

        function confirmDecoracao(id) {

            $.get('../cart/carrinho.php?product=decoracao&acao=add&id=' + id + '')

            location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

        }
        // ----------------------------------------------- \\


        // ----------------| LOCAL
        function checkLocal(self) {
            const id = self.getAttribute('data-id')

            <?php

            if (isset($_SESSION['carrinho']['local'])) {

                $bool = 1;
            } else {

                $bool = 0;
            }

            ?>

            if (<?php echo $bool; ?> == 1) {

                toastr.info(
                    "<p> Já existe um Local no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmLocal(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
                )

            } else {

                $.get('../cart/carrinho.php?product=local&acao=add&id=' + id + '')
                location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

            }

        }

        function confirmLocal(id) {

            $.get('../cart/carrinho.php?product=local&acao=add&id=' + id + '')

            location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

        }
        // ----------------------------------------------- \\


        // ----------------| SEGURANÇA
        function checkSeguranca(self) {
            const id = self.getAttribute('data-id')

            <?php

            if (isset($_SESSION['carrinho']['seguranca'])) {

                $bool = 1;
            } else {

                $bool = 0;
            }

            ?>

            if (<?php echo $bool; ?> == 1) {

                toastr.info(
                    "<p> Já existe uma Equipe de Segurança no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmSeguranca(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
                )

            } else {

                $.get('../cart/carrinho.php?product=seguranca&acao=add&id=' + id + '')
                location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

            }

        }

        function confirmSeguranca(id) {

            $.get('../cart/carrinho.php?product=seguranca&acao=add&id=' + id + '')

            location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

        }
    </script>


</body>

</html>