<?php
include_once '../../validation-pages.php';

require_once '/xampp/htdocs/yourParty/Classes/Cliente.php';
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';
require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';

$item = new ItemOrcamento();
$cliente = new Cliente();

$avaliarLocal       =   $item->avaliarLocal($_SESSION['idCliente']);
$avaliarBuffet      =   $item->avaliarBuffet($_SESSION['idCliente']);
$avaliarDecoracao   =   $item->avaliarDecoracao($_SESSION['idCliente']);
$avaliarSeguranca   =   $item->avaliarSeguranca($_SESSION['idCliente']);


$conexao = Conexao::conectar();
$query = $conexao->prepare("SELECT c.idCliente, c.nomeCliente, c.cpfCliente, c.emailCliente, c.fotoCliente, f.idFoneCliente,f.numeroFoneCliente FROM tbCliente c
                                        INNER JOIN tbFoneCliente f ON c.idCliente = f.idCliente
                                        WHERE c.idCliente = :s LIMIT 1");
$query->bindValue(':s', $_SESSION['idCliente']);
$query->execute();

$list = $query->fetch(PDO::FETCH_BOTH);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Your Party - Seu Perfil </title>

    <!-- Link OBRIGATÓRIO do ìcone -->
    <link rel="icon" type="image/png" href="../../../view/images/balão.png" loading="lazy" />

    <!-- Link OBRIGATÓRIO da máscara jquery   -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../../../view/css/style-cliente.css">
    <link rel="stylesheet" href="../../css/avalia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="../../../view/css/style.css" />
    <!-- Links OBRIGATÓRIO dos ícones (contém ìcones antigos então por favor não removam NENHUM link, TODOS são de suma impotância.) -->
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <header id="header">

        <div class="overlay overlay-lg">
        </div>
        <nav>
            <div class="container-nav">
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
                            <a href="../cart/carrinho.php">Carrinho</a>
                        </li>
                        <li>
                            <a href="../budget/budget.php">Meus Orçamentos</a>
                        </li>
                    </ul>
                </div>

                <div class="icons">
                        <a href="../../index-user.php" class="fa-solid fa-arrow-left" title="Voltar"></a>
                    </div>


                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </div>
        </nav>

    </header>


    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">


            <div class="perfil-usuario-portada">

                <div class="perfil-usuario-avatar">
                    <img src="../../<?php echo $list['fotoCliente'] ?>">
                </div>

            </div>

        </div>


        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <br>
                <h3 class="titulo"><?php echo $list['nomeCliente'] ?> </h3>
                <p class="edit"> Editar Perfil <button type="button" id="edit-show" class="editar"><i class="fa-solid fa-pen-to-square"></i> </button> </p>
            </div>

            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i> Email: <?php echo $list['emailCliente'] ?> </li>
                    <li><i class="icono fas fa-building"></i> CPF: <?php echo $list['cpfCliente'] ?></li>
                </ul>

                <ul class="lista-datos">
                    <li><i class="icono fas fa-phone-alt"></i> Celular: <?php echo $list['numeroFoneCliente'] ?> </li>
                </ul>
            </div>
        </div>


    </section>

    <div id="edit-modal">
        <div class="modal">
            <div class="top-form">
                <div class="close-modal">
                    &#10006;
                </div>
            </div>

            <div class="form">
                <h2> Edite Suas Informações </h2>
                <form action="./cliente-alterar.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="foto1" value="<?php echo $list['fotoCliente']; ?>">
                    <input type="hidden" placeholder="Alterar ID" name="cxId" value="<?php echo $list['idCliente']; ?>" required />
                    <input type="text" class="form-control" name="cxNome" placeholder="Nome" value="<?php echo $list['nomeCliente']; ?>" required />
                    <input type="email" class="form-control" name="cxEmail" placeholder="E-Mail" value="<?php echo $list['emailCliente'];  ?>" required />
                    <input type="text" data-mask="+55 (00) 00000-0000" name="cxTelefone" class="form-control" placeholder="Celular" value="<?php echo $list['numeroFoneCliente'];  ?>" required />
                    <input type="file" class="form-control" name="arquivo" id="arquivo" />

                    <button type="submit" class="submit-btn"> Alterar </button>

                </form>
            </div>
        </div>
    </div>




    <script type="text/javascript">
        $(function() {
            $('#edit-show').click(function() {
                $('#edit-modal').fadeIn().css("display", "flex");
            });

            $('.close-modal').click(function() {
                $('#edit-modal').fadeOut();
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }



        if (<?php echo $_SESSION['avaliacao']; ?> == 1) {

            toastr.success("Obrigado por avaliar o serviço.", "Avaliação registrada!")

        } else if (<?php echo $_SESSION['avaliacao']; ?> == 2) {

            toastr.error("Ocorreu um probleminha, tente novamento.", "Oops...")

        } else if (<?php echo $_SESSION['avaliacao']; ?> == 3) {

            toastr.warning("Selecione pelo menos 1 estrela.", "Por gentileza...")

        }
    </script>

    <?php $_SESSION['avaliacao'] = 0; ?>

</body>


</html>