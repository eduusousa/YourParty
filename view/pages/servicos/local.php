<?php

require_once '/xampp/htdocs/yourParty/Classes/Local.php';
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';


$local = new Local();
$listLocal = $local->listarTudo();
$item = new ItemOrcamento();

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


  <link rel="stylesheet" href="../css/style-modal-carrinho.css">

  <!--=============== CSS ===============-->

  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../pages/search/css/toastr-notify.css">

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
                <a href="../../../index.php">Home</a>
              </li>
              <li>
                <a href="./buffet.php">Buffet</a>
              </li>
              <li>
                <a href="./decoracao.php">Decoração</a>
              </li>
              <li>
                <a href="./local.php" class="active">Local</a>
              </li>
              <li>
                <a href="./seguranca.php">Segurança</a>
              </li>
            </ul>
          </div>

          <div class="icons">
            <a href="../../../view/pages/login/login.php" class="fas fa-user" title="Login"></a>
            <a href="../../../index.php" class="fa-solid fa-right-from-bracket" title="Voltar"></a>
          </div>


          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </nav>

    </header>



    <br>

    <section class="buffets" id="buffets">
      <div class="container">
        <div class="section-header">

          <h3 class="title" data-title="Nossos">Locais</h3>
          <section id="feature" class="section-p1">

            <section id="product1" class="section-p1">

              <div class="pro-container">

                <?php
                if (isset($listLocal)) {
                  foreach ($listLocal as $row) {
                ?>
                    <div class="pro">
                      <img src=../../../privateWork/<?php echo $row['fotoLocal'] ?>>
                      <div class="des">
                        <span><?php echo $row['nomeEmpresa'] ?></span>
                        <h5><?php echo $row['nomeLocal'] ?></h5>

                        <div class="star">

                          <i>
                            <?php
                            $avgBuf = $item->avgAvaliacaoLocal($row['idLocal']);

                            if ($avgBuf[0] == NULL) {
                              $avgBuf = 0;
                            } else {
                              $avgBuf = $avgBuf[0];
                            }

                            ?>
                            <p> <?php echo $avgBuf; ?> <ion-icon name="star"></ion-icon>
                            </p>
                          </i>

                        </div>

                        <h4> R$<?php echo number_format($row['valorLocal'], 2, ',', '.'); ?></h4>

                        <a href="../../pages/login/login.php">+ Detalhes</a>

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

    <br>
  </main>

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
              <a href="../../../Adm/index.php">Área do Administrador</a>
            </li>
          </ul>
        </div>

        <div class="grid-4-col footer-links">
          <h3 class="title-sm">Serviços</h3>
          <ul>
            <li>
              <a href="buffet.php">Buffet's</a>
            </li>
            <li>
              <a href="decoracao.php">Decorações</a>
            </li>
            <li>
              <a href="local.php">Local</a>
            </li>
            <li>
              <a href="seguranca.php">Seguranças</a>
            </li>
          </ul>
        </div>
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

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="./js/isotope.pkgd.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="./js/app.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>

</body>

</html>