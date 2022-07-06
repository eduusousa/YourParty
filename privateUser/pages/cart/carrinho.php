<?php

include_once '../../validation-pages.php';



require_once "./functions/product.php";
require_once "./functions/cart.php";
require_once "/xampp/htdocs/yourParty/Classes/Conexao.php";

$pdoConnection = Conexao::conectar();

if (isset($_GET['acao']) && in_array($_GET['acao'], array('product', 'add', 'del', 'up'))) {


    if ($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])) {
        addCart($_GET['id'], $_GET['product']);

        $_SESSION['msg_carrinho'] = 1;
    }

    if ($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])) {
        deleteCart($_GET['id'], $_GET['product']);
    }

    header('location: ./carrinho.php');
    
}

$resultsCarts = getContentCart($pdoConnection);
$totalCarts  = getTotalCart($pdoConnection);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Party - A sua festa inesquecível</title>
    <link rel="icon" type="image/png" href="../../../view/images/balão.png" loading="lazy" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="../../css/style-cart.css" />

</head>

<body>

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
                            <a href="../search/search-page.php">Serviços</a>
                        </li>
                        <li>
                            <a href="../cart/carrinho.php" class="active">Carrinho</a>
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
    
    <div class="container">
        <section class="carrinho">

            <div class="titulo">

                <h1><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho</h1>
                <p>Lista de Produtos</p>
            </div>

            <div class="responsive">
                <table class="table">
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>

                    <?php if (isset($resultsCarts) && !empty($resultsCarts)) {
                        foreach ($resultsCarts as $i => $result) {
                            foreach ($result as $value) {
                    ?>
                                <tr>
                                    <td><a href="../details/itenscard.php?servico=<?php echo $value['product'] ?>&id=<?php echo $value['id'] ?>"> <?php echo $value['nome'] ?> </a> </td>
                                    <td>R$<?php echo number_format($value['valor'], 2, ',', '.') ?></td>
                                    <td>R$<?php echo number_format($value['subtotal'], 2, ',', '.') ?></td>

                                    <td><a class="excluir" href="carrinho.php?product=<?php echo $value['product'] ?>&acao=del&id=<?php echo $value['id'] ?>">Remover</a></td>
                                </tr>
                        <?php
                            }
                        }
                    } else if (!isset($resultsCarts)) {
                        ?>

                        <tr>
                            <td> Nenhum item no momento. </td>
                        </tr>


                    <?php } ?>

                    <tr class="total-cart">
                        <td></td>
                        <td></td>
                        <td>Total:</td>
                        <td>R$<?php echo number_format($totalCarts, 2, ',', '.') ?></td>
                    </tr>
                </table>
            </div>

            <div class="botões">
                <a href="../search/search-page.php"><button class="btn1"> Continuar Orçando</button></a>

                <form action="./cart-finish.php" method="post" class="formulario-carrinho">
                    <input type="hidden" name="valorTotal" value="<?php echo $totalCarts; ?>">
                    <button type="submit" class="btn3" name="cliqueiAqui">Finalizar Orçamento</button>
                </form>
            </div>




        </section>
    </div>

    <br><br><br><br><br>


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
                    <h3 class="title-sm">Valeu por utilizar a <br> Your Party!</h3>
                    <p class="text">
                        Desejamos uma festa incrível, como você.
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        toastr.options.onHidden = function() {
            location.reload()
        }

        if (<?php echo $_SESSION['compra_finalizada']; ?> == 1) {
            toastr.success('Nossos parceiros(as) entrarão em contato com você logo em breve :)', 'Orçamento finalizado!');


        } else if (<?php echo $_SESSION['compra_finalizada']; ?> == 2) {
            toastr.warning('Você precisa de 1 item no mínimo para fechar o orçamento.', 'Carrinho Vazio.');
        }
    </script>


    <?php $_SESSION['compra_finalizada'] = 0; ?>

</body>

</html>