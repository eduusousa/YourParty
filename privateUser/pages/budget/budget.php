<?php
session_start();
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

$id = $_SESSION['idCliente'];
$item = new ItemOrcamento();



$listBuffet = $item->budgetBuffet($id);
$listLocal = $item->budgetLocal($id);
$listDecoracao = $item->budgetDecoracao($id);
$listSeguranca = $item->budgetSeguranca($id);



// echo "<pre>";
// print_r($listLocal);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="pt-br">

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="../../../privateWork/css/avalia2.css">

  <link rel="stylesheet" href="../../css/avalia.css">

  <link rel="stylesheet" href="./css/style-modal-carrinho.css">

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="../../../view/css/style.css" />
  <link rel="stylesheet" href="./pages/search/css/toastr-notify.css">

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
                <a href="../search/search-page.php">Serviços</a>
              </li>
              <li>
                <a href="../cart/carrinho.php">Carrinho</a>
              </li>
              <li>
                <a href="../budget/budget.php" class="active">Meus Orçamentos</a>
              </li>
            </ul>
          </div>

          <div class="icons">
            <a href="./../profile/perfil-cliente.php" class="fa-regular fa-address-card" title="Perfil"></a>
            <a href="../../sair-cliente.php" class="fa-solid fa-right-from-bracket" title="Sair"></a>
          </div>


          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </nav>

    </header>
  </main>

  <center>
    <!--==================== STEPS ====================-->
    <!-- <section class="steps section container"> -->
    <div class="steps__bg">
      <h2 class="section__title-center steps__title">
      </h2>

        <?php if (!empty($listBuffet) or !empty($listDecoracao) or !empty($listLocal) or !empty($listSeguranca)) { ?>


          <?php if (!empty($listBuffet)) {  ?>

            <div class="step__title__section">
              <h1>Orçamentos - Buffet</h1>
            </div>

            <div class="steps__container grid">
              <!-- LISTAGEM DE BUFFET -->
              <?php
              if (isset($listBuffet)) {
                foreach ($listBuffet as $row) {

                  if ($row['confirmaBuffet'] == 0) {
                    $status = 'Pendente';
                    $color = '#f0be00';
                  } else if ($row['confirmaBuffet'] == 1) {
                    $status = 'Aprovado';
                    $color = ' #228b22';
                  } else if ($row['confirmaBuffet'] == 2) {
                    $status = 'Negado';
                    $color = '#df0000';
                  }

              ?>
                  <div class="steps__card">
                    <div class="steps__card-number" style="background-color: <?php echo $color; ?>"><?php echo $status; ?></div>
                    <h2 class="steps__card-title"> <?php echo $row['nomeBuffet']; ?> </h2>

                    <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?> </p>
                    <h3>Data: <?php echo $row['Data']; ?></h3>
                    <h4><?php echo $row['nomeEmpresa']; ?></h4>
                    <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                    <?php
                    if ($status === 'Aprovado' && $row['avaliacaoBuffet'] == 0) {
                    ?>
                      <form action="./controller/processa.php" method="POST" enctype="multipart/form-data">
                        <div class="estrelas">
                          <input type="hidden" name="idOrcamento" value="<?php echo $row['idItemOrcamento']; ?>">
                          <input type="radio" name="estrela" id="vazio" value="" checked>

                          <label for="estrela_1"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_1" value="1">

                          <label for="estrela_2"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_2" value="2">

                          <label for="estrela_3"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_3" value="3">

                          <label for="estrela_4"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_4" value="4">

                          <label for="estrela_5"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_5" value="5">
                          <br>
                          <input type="submit" value="Avaliar" name="avaliarBuffet" class="bt">

                        </div>
                      </form>
                    <?php } else if ($row['avaliacaoBuffet'] > 0 && $status === 'Aprovado') { ?>

                      <h4> Você já avaliou esse serviço </h4>

                    <?php } ?>

                  </div>
              <?php }
              } ?>


            </div>

            <br>
            <hr class="hr-style">
            <br>

          <?php } ?>



          <?php if (!empty($listDecoracao)) {  ?>

            <div class="step__title__section">
              <h1>Orçamentos - Decoração</h1>
            </div>

            <div class="steps__container grid">

              <!-- LISTAGEM DE DECORAÇÃO -->
              <?php
              if (isset($listDecoracao)) {
                foreach ($listDecoracao as $row) {

                  if ($row['confirmaDecoracao'] == 0) {
                    $status = 'Pendente';
                    $color = '#f0be00';
                  } else if ($row['confirmaDecoracao'] == 1) {
                    $status = 'Aprovado';
                    $color = '#228b22';
                  } else if ($row['confirmaDecoracao'] == 2) {
                    $status = 'Negado';
                    $color = '#ec2300';
                  }

              ?>
                  <div class="steps__card">
                    <div class="steps__card-number" style="background-color: <?php echo $color; ?>"><?php echo $status; ?></div>
                    <h2 class="steps__card-title"> <?php echo $row['nomeDecoracao']; ?> </h2>

                    <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?> </p>
                    <h3>Data: <?php echo $row['Data']; ?></h3>
                    <h4><?php echo $row['nomeEmpresa']; ?></h4>
                    <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                    <?php
                    if ($status === 'Aprovado' && $row['avaliacaoDecoracao'] == 0) {

                    ?>
                      <form action="./controller/processa.php" method="POST" enctype="multipart/form-data">
                        <div class="estrelas">
                          <input type="hidden" name="idOrcamento" value="<?php echo $row['idItemOrcamento']; ?>">
                          <input type="radio" name="estrela" id="vazio" value="" checked>

                          <label for="estrela_1"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_1" value="1">

                          <label for="estrela_2"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_2" value="2">

                          <label for="estrela_3"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_3" value="3">

                          <label for="estrela_4"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_4" value="4">

                          <label for="estrela_5"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_5" value="5">
                          <br>
                          <input type="submit" value="Avaliar" name="avaliarDecoracao" class="bt">

                        </div>
                      </form>
                    <?php } else if ($row['avaliacaoDecoracao'] > 0) { ?>

                      <h4> Você já avaliou esse serviço </h4>

                    <?php } ?>

                  </div>
              <?php }
              } ?>

            </div>

            <br>

            <hr class="hr-style">
            <br>

          <?php } ?>



          <?php if (!empty($listLocal)) {  ?>


            <div class="step__title__section">
              <h1>Orçamentos - Local</h1>
            </div>

            <div class="steps__container grid">

              <!-- LISTAGEM DE DECORAÇÃO -->
              <?php
              if (isset($listLocal)) {
                foreach ($listLocal as $row) {

                  if ($row['confirmaLocal'] == 0) {
                    $status = 'Pendente';
                    $color = '#f0be00';
                  } else if ($row['confirmaLocal'] == 1) {
                    $status = 'Aprovado';
                    $color = ' #228b22';
                  } else if ($row['confirmaLocal'] == 2) {
                    $status = 'Negado';
                    $color = '#df0000';
                  }

              ?>
                  <div class="steps__card">
                    <div class="steps__card-number" style="background-color: <?php echo $color; ?>"><?php echo $status; ?></div>
                    <h2 class="steps__card-title"> <?php echo $row['nomeLocal']; ?> </h2>

                    <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?> </p>
                    <h3>Data: <?php echo $row['Data']; ?></h3>
                    <h4><?php echo $row['nomeEmpresa']; ?></h4>
                    <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                    <?php
                    if ($status === 'Aprovado' && $row['avaliacaoLocal'] == 0) {

                    ?>

                      <form action="./controller/processa.php" method="POST" enctype="multipart/form-data">
                        <div class="estrelas">
                          <input type="hidden" name="idOrcamento" value="<?php echo $row['idItemOrcamento']; ?>">
                          <input type="radio" name="estrela" id="vazio" value="" checked>

                          <label for="estrela_1"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_1" value="1">

                          <label for="estrela_2"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_2" value="2">

                          <label for="estrela_3"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_3" value="3">

                          <label for="estrela_4"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_4" value="4">

                          <label for="estrela_5"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_5" value="5">
                          <br>
                          <input type="submit" value="Avaliar" name="avaliarLocal" class="bt">

                        </div>
                      </form>

                    <?php } else if ($row['avaliacaoLocal'] > 0) { ?>

                      <h4> Você já avaliou esse serviço </h4>

                    <?php } ?>

                  </div>
              <?php }
              } ?>

            </div>

            <br>

            <hr class="hr-style">
            <br>

          <?php } ?>



          <?php if (!empty($listSeguranca)) {  ?>

            <div class="step__title__section">
              <h1>Orçamentos - Segurança</h1>
            </div>

            <div class="steps__container grid">

              <?php
              if (isset($listSeguranca)) {
                foreach ($listSeguranca as $row) {

                  if ($row['confirmaSeguranca'] == 0) {
                    $status = 'Pendente';
                    $color = '#f0be00';
                  } else if ($row['confirmaSeguranca'] == 1) {
                    $status = 'Aprovado';
                    $color = '#228b22';
                  } else if ($row['confirmaSeguranca'] == 2) {
                    $status = 'Negado';
                    $color = '#df0000';
                  }

              ?>
                  <div class="steps__card">
                    <div class="steps__card-number" style="background-color: <?php echo $color; ?>"><?php echo $status; ?></div>
                    <h2 class="steps__card-title"> <?php echo $row['descSeguranca']; ?> </h2>

                    <p>Nº do Orçamento: <?php echo $row['idItemOrcamento']; ?> </p>
                    <h3>Data: <?php echo $row['Data']; ?></h3>
                    <h4><?php echo $row['nomeEmpresa']; ?></h4>
                    <h3>R$<?php echo $row['valorOrcamentoEvento']; ?></h3>

                    <?php
                    if ($status === 'Aprovado' && $row['avaliacaoSeguranca'] == 0) {

                    ?>
                      <form action="./controller/processa.php" method="POST" enctype="multipart/form-data">
                        <div class="estrelas">
                          <input type="hidden" name="idOrcamento" value="<?php echo $row['idItemOrcamento']; ?>">
                          <input type="radio" name="estrela" id="vazio" value="" checked>

                          <label for="estrela_1"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_1" value="1">

                          <label for="estrela_2"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_2" value="2">

                          <label for="estrela_3"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_3" value="3">

                          <label for="estrela_4"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_4" value="4">

                          <label for="estrela_5"><i class="fa"></i></label>
                          <input type="radio" name="estrela" id="estrela_5" value="5">
                          <br>
                          <input type="submit" value="Avaliar" name="avaliarSeguranca" class="bt">

                        </div>
                      </form>
                    <?php } else if ($row['avaliacaoSeguranca'] > 0) { ?>

                      <h4> Você já avaliou esse serviço </h4>

                    <?php } ?>
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



  <footer class="footer footer-two">
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
              <a href="#header">Home</a>
            </li>
            <li>
              <a href="#services">Serviços</a>
            </li>
          </ul>
        </div>

        <div class="grid-4-col footer-links">
          <h3 class="title-sm">Serviços</h3>
          <ul>
            <li>
              <a href="#">Buffet</a>
            </li>
            <li>
              <a href="#">Decoração</a>
            </li>
            <li>
              <a href="#">Local</a>
            </li>
            <li>
              <a href="#">Segurança</a>
            </li>
          </ul>
        </div>

        <div class="grid-4-col footer-newstletter">
          <h3 class="title-sm">Entre</h3>
          <p class="text">
            Venha fazer uma festa incrível conosco!
          </p>
          <div class="footer-input-wrap">
            <input type="email" class="footer-input" placeholder="Email" />
            <a href="./login/login.php" class="input-arrow">
              <i class="fas fa-angle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="bottom-footer">
        <div class="copyright">
          <p class="text">
            Copyright&copy;
            <?php echo date('Y'); ?> Todos os direitos reservados | by
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