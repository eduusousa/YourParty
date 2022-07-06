<?php

include_once '../../validation-pages.php';


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

if (
  isset($_GET['servico']) && isset($_GET['id'])
  && !empty($_GET['servico']) && !empty($_GET['id'])
) {

  $id = $_GET['id'];


  if ($_GET['servico'] === 'buffet') {

    $output_buffet = $buffet->listarBuffet($id);
    $output_itensB = $buffet->listarItem($id);

    $listBuffet = $buffet->notList($id);
  }


  if ($_GET['servico'] === 'local') {

    $output_local = $local->listarLocal($id);

    $listLocal = $local->notList($id);
  }


  if ($_GET['servico'] == 'decoracao') {

    $output_decoracao = $decoracao->listarDecoracao($id);
    $output_itensD = $decoracao->listarItem($id);

    $listDecoracao = $decoracao->notList($id);
  }


  if ($_GET['servico'] == 'seguranca') {
    $output_seguranca = $seguranca->listarSeguranca($id);

    $listSeguranca = $seguranca->notList($id);
  }
} else {

  header("Location: ../search/search-page.php");
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Itens / Carrinho</title>
  <link rel="icon" type="image/png" href="../../../view/images/balão.png" loading="lazy" />
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="../../css/styleitens.css">
  <link rel="stylesheet" href="../../pages/search/css/toastr-notify.css">

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
            <a href="../../pages/search/search-page.php" class="fa-solid fa-arrow-left" title="Voltar"></a>
          </div>


          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </nav>

    </header>

  </main>

  <section id="prodetails" class="section-p1">

    <?php if (isset($output_buffet)) { ?>
      <div class="single-pro-image">
        <img src="../../../privateWork/<?php echo $output_buffet['fotoBuffet']; ?>" width="100%" id="MainImg" alt="<?php echo $output_buffet['nomeBuffet']; ?>">
      </div>

      <div class="single-pro-details">

        <center>
          <h6><?php echo $output_buffet['nomeEmpresa']; ?></h6>
          <h4><?php echo $output_buffet['nomeBuffet']; ?></h4>
          <h2><?php echo $output_buffet['valorBuffet']; ?></h2>

          <button data-id="<?php echo $output_buffet['idBuffet'] ?>" onclick="checkBuffet(this)" class="btn transparent" id="sign-up-btn">
            Adicione ao carrinho
          </button>
          <h4>Itens do <span>Buffet</span></h4>

          <h5>
            <?php foreach ($output_itensB as $row) { ?>

              <li><?php echo $row['nomeItemBuffet']; ?></li>

            <?php } ?>
          </h5>

          <br>

          <h2><span>Contato:</span></h2>
          <h3><?php echo $output_buffet['emailEmpresa']; ?></h3>
          <h3><?php echo $output_buffet['numeroFoneEmpresa']; ?></h3>

        </center>

      </div>
    <?php } ?>


    <?php if (isset($output_local)) { ?>
      <div class="single-pro-image">
        <img src="../../../privateWork/<?php echo $output_local['fotoLocal']; ?>" width="100%" id="MainImg" alt="<?php echo $output_local['nomeLocal']; ?>">
      </div>

      <div class="single-pro-details">
        <center>

          <h6><?php echo $output_local['nomeEmpresa']; ?></h6>
          <h4><?php echo $output_local['nomeLocal']; ?></h4>
          <h2><?php echo $output_local['valorLocal']; ?></h2>

          <button data-id="<?php echo $output_local['idLocal'] ?>" onclick="checkLocal(this)" class="btn transparent" id="sign-up-btn">
            Adicione ao carrinho
          </button>
          <h4>Endereço do <span>Local</span></h4>

          <h5>
            <li>End: <?php echo $output_local['enderecoLocal']; ?></li>
            <li>Num: <?php echo $output_local['numeroLocal']; ?></li>
            <li>Bairro: <?php echo $output_local['bairroLocal']; ?></li>
            <li>Cidade: <?php echo $output_local['cidadeLocal']; ?></li>
          </h5>

          <h2><span>Contato:</span></h2>
          <h3><?php echo $output_local['emailEmpresa']; ?></h3>
          <h3><?php echo $output_local['numeroFoneEmpresa']; ?></h3>

        </center>
      </div>
    <?php } ?>


    <?php if (isset($output_decoracao)) { ?>
      <div class="single-pro-image">
        <img src="../../../privateWork/<?php echo $output_decoracao['fotoDecoracao']; ?>" width="100%" id="MainImg" alt="<?php echo $output_decoracao['nomeDecoracao']; ?>">
      </div>

      <div class="single-pro-details">
        <center>

          <h6><?php echo $output_decoracao['nomeEmpresa']; ?></h6>
          <h4><?php echo $output_decoracao['nomeDecoracao']; ?></h4>
          <h2><?php echo $output_decoracao['valorDecoracao']; ?></h2>

          <button data-id="<?php echo $output_decoracao['idDecoracao'] ?>" onclick="checkDecoracao(this)" class="btn transparent" id="sign-up-btn">
            Adicione ao carrinho
          </button>
          <h4>Itens da <span>Decoração</span></h4>

          <h5>
            <?php foreach ($output_itensD as $row) { ?>

              <li><?php echo $row['nomeItemDecoracao']; ?></li>

            <?php } ?>
          </h5>

          <h2><span>Contato:</span></h2>
          <h3><?php echo $output_decoracao['emailEmpresa']; ?></h3>
          <h3><?php echo $output_decoracao['numeroFoneEmpresa']; ?></h3>

        </center>
      </div>
    <?php } ?>


    <?php if (isset($output_seguranca)) { ?>
      <div class="single-pro-image">
        <img src="../../../privateWork/<?php echo $output_seguranca['fotoSeguranca']; ?>" width="100%" id="MainImg" alt="<?php echo $output_seguranca['descSeguranca']; ?>">
      </div>

      <div class="single-pro-details">
        <center>

          <h6><?php echo $output_seguranca['nomeEmpresa']; ?></h6>
          <h4><?php echo $output_seguranca['descSeguranca']; ?></h4>
          <h2><?php echo $output_seguranca['valorSeguranca']; ?></h2>

          <button data-id="<?php echo $output_seguranca['idSeguranca'] ?>" onclick="checkSeguranca(this)" class="btn transparent" id="sign-up-btn">
            Adicione ao carrinho
          </button>
          <h4>Quantidade de <span>Seguranças</span></h4>

          <h5>
            <?php echo $output_seguranca['quantidadeSeguranca']; ?>
          </h5>

          <h2><span>Contato:</span></h2>
          <h3><?php echo $output_seguranca['emailEmpresa']; ?></h3>
          <h3><?php echo $output_seguranca['numeroFoneEmpresa']; ?></h3>

        </center>
      </div>
    <?php } ?>

  </section>

  <section class="buffets" id="buffets">
    <div class="container">
      <div class="section-header">
        <h3 class="title" data-title="Outros">Serviços</h3>
        <section id="feature" class="section-p1">
          <section id="product1" class="section-p1">
            <div class="pro-container">

              <?php
              if (isset($listBuffet)) {
                foreach ($listBuffet as $row) {
              ?>
                  <div class="pro">
                    <img src="../../../privateWork/<?php echo $row['fotoBuffet']; ?>">
                    <div class="des">
                      <span><?php echo $row['nomeEmpresa']; ?></span>
                      <h5> <?php echo $row['nomeBuffet']; ?> </h5>

                      <div class="star">
                        <i>
                          <?php
                          $avgBuffet = $item->avgAvaliacaoBuffet($row['idBuffet']);

                          if ($avgBuffet[0] == NULL) {
                            $avgBuffet = 0;
                          } else {
                            $avgBuffet = $avgBuffet[0];
                          }

                          ?>

                          <p> <?php echo $avgBuffet; ?> <ion-icon name="star"></ion-icon>
                          </p>

                        </i>
                      </div>
                      <h4><?php echo $row['valorBuffet']; ?></h4>

                      <a href="../details/itenscard.php?servico=buffet&id=<?php echo $row['idBuffet']; ?>">
                        + Detalhes
                      </a>
                    </div>
                  </div>
              <?php }
              } ?>


              <?php
              if (isset($listLocal)) {
                foreach ($listLocal as $row) {
              ?>
                  <div class="pro">
                    <img src="../../../privateWork/<?php echo $row['fotoLocal']; ?>">
                    <div class="des">
                      <span><?php echo $row['nomeEmpresa']; ?></span>
                      <h5> <?php echo $row['nomeLocal']; ?> </h5>

                      <div class="star">
                        <i>
                          <?php
                          $avgLocal = $item->avgAvaliacaoLocal($row['idLocal']);

                          if ($avgLocal[0] == NULL) {
                            $avgLocal = 0;
                          } else {
                            $avgLocal = $avgLocal[0];
                          }

                          ?>

                          <p> <?php echo $avgLocal; ?> <ion-icon name="star"></ion-icon>
                          </p>

                        </i>
                      </div>
                      <h4><?php echo $row['valorLocal']; ?></h4>

                      <a href="../details/itenscard.php?servico=local&id=<?php echo $row['idLocal']; ?>">
                        + Detalhes
                      </a>

                    </div>
                  </div>
              <?php }
              } ?>


              <?php
              if (isset($listDecoracao)) {
                foreach ($listDecoracao as $row) {
              ?>
                  <div class="pro">
                    <img src="../../../privateWork/<?php echo $row['fotoDecoracao']; ?>">
                    <div class="des">
                      <span><?php echo $row['nomeEmpresa']; ?></span>
                      <h5> <?php echo $row['nomeDecoracao']; ?> </h5>

                      <div class="star">
                        <i>
                          <?php
                          $avgDecoracao = $item->avgAvaliacaoDecoracao($row['idDecoracao']);

                          if ($avgDecoracao[0] == NULL) {
                            $avgDecoracao = 0;
                          } else {
                            $avgDecoracao = $avgDecoracao[0];
                          }

                          ?>

                          <p> <?php echo $avgDecoracao; ?> <ion-icon name="star"></ion-icon>
                          </p>

                        </i>
                      </div>
                      <h4><?php echo $row['valorDecoracao']; ?></h4>

                      <a href="../details/itenscard.php?servico=decoracao&id=<?php echo $row['idDecoracao']; ?>">
                        + Detalhes
                      </a>
                    </div>
                  </div>
              <?php }
              } ?>


              <?php
              if (isset($listSeguranca)) {
                foreach ($listSeguranca as $row) {
              ?>
                  <div class="pro">
                    <img src="../../../privateWork/<?php echo $row['fotoSeguranca']; ?>">
                    <div class="des">
                      <span><?php echo $row['nomeEmpresa']; ?></span>
                      <h5> <?php echo $row['descSeguranca']; ?> </h5>

                      <div class="star">
                        <i>
                          <?php
                          $avgSeguranca = $item->avgAvaliacaoSeguranca($row['idSeguranca']);

                          if ($avgSeguranca[0] == NULL) {
                            $avgSeguranca = 0;
                          } else {
                            $avgSeguranca = $avgSeguranca[0];
                          }

                          ?>

                          <p> <?php echo $avgSeguranca; ?> <ion-icon name="star"></ion-icon>
                          </p>

                        </i>
                      </div>
                      <h4><?php echo $row['valorSeguranca']; ?></h4>

                      <a href="../details/itenscard.php?servico=seguranca&id=<?php echo $row['idSeguranca']; ?>">
                        + Detalhes
                      </a>

                    </div>
                  </div>
              <?php }
              } ?>


            </div>
          </section>
        </section>
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

  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="./js/isotope.pkgd.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="../../../view/js/app.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>


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
          "<p style='color: white;'> Já existe um Buffet no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmBuffet(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
        )

      } else {

        $.get('../cart/carrinho.php?product=buffet&acao=add&id=' + id + '')

        setTimeout(() => {
          location.reload()
        }, 2000)

      }

    }

    function confirmBuffet(id) {

      $.get('../cart/carrinho.php?product=buffet&acao=add&id=' + id + '')

      setTimeout(() => {
        location.reload()
      }, 2000)

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
          "<p style='color: white;'> Já existe uma Decoracao no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmDecoracao(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
        )

      } else {

        $.get('../cart/carrinho.php?product=decoracao&acao=add&id=' + id + '')

        setTimeout(() => {
          location.reload()
        }, 2000)

      }

    }

    function confirmDecoracao(id) {

      $.get('../cart/carrinho.php?product=decoracao&acao=add&id=' + id + '')

      setTimeout(() => {
        location.reload()
      }, 2000)

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
          "<p style='color: white;'> Já existe um Local no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmLocal(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
        )

      } else {

        $.get('../cart/carrinho.php?product=local&acao=add&id=' + id + '')

        setTimeout(() => {
          location.reload()
        }, 2000)

      }

    }

    function confirmLocal(id) {

      $.get('../cart/carrinho.php?product=local&acao=add&id=' + id + '')

      setTimeout(() => {
        location.reload()
      }, 2000)

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
          "<p style='color: white;'> Já existe uma Equipe de Segurança no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmSeguranca(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
        )

      } else {

        $.get('../cart/carrinho.php?product=seguranca&acao=add&id=' + id + '')

        setTimeout(() => {
          location.reload()
        }, 2000)

      }

    }

    function confirmSeguranca(id) {

      $.get('../cart/carrinho.php?product=seguranca&acao=add&id=' + id + '')

      setTimeout(() => {
        location.reload()
      }, 2000)

    }


    if (<?php echo $_SESSION['msg_carrinho']; ?> === 1) {

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




      toastr.success("Veja seu carrinho <a href='../cart/carrinho.php' class='link'>clicando aqui</a>", "Adicionado com sucesso!")

      setTimeout(() => {
        location.reload()
      }, 5000)

    }
  </script>


  <?php $_SESSION['msg_carrinho'] = 0; ?>

</body>

</html>