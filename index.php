<?php

require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
require_once '/xampp/htdocs/yourParty/Classes/Local.php';
require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

$buffet = new Buffet();
$dec = new Decoracao();
$local = new Local();
$seguranca = new Seguranca();


$listDec = $dec->decoracaoBarato();
$listBuffet = $buffet->buffetbarato();
$listLocal = $local->localBarato();
$listSeg = $seguranca->segurancaBarato();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Party - A sua festa inesquecível</title>


  <link rel="icon" type="image/png" href="./view/images/balão.png" loading="lazy" />
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!--=============== CSS ===============-->

  <link rel="stylesheet" href="./view/css/style.css" />
</head>

<body>
  <main>
    <header id="header">
      <div class="overlay overlay-lg">
        <img src="./view/images/shapes/square.png" class="shape square" alt="" />
        <img src="./view/images/shapes/circle.png" class="shape circle" alt="" />
        <img src="./view/images/shapes/half-circle.png" class="shape half-circle1" alt="" />
        <img src="./view/images/shapes/half-circle.png" class="shape half-circle2" alt="" />
        <img src="./view/images/shapes/x.png" class="shape xshape" alt="" />
        <img src="./view/images/shapes/wave.png" class="shape wave wave1" alt="" />
        <img src="./view/images/shapes/wave.png" class="shape wave wave2" alt="" />
        <img src="./view/images/shapes/triangle.png" class="shape triangle" alt="" />
        <img src="./view/images/shapes/letters.png" class="letters" alt="" />
        <img src="./view/images/shapes/points1.png" class="points points1" alt="" />
      </div>

      <nav>
        <div class="container">
          <div class="logo">
            <!-- <img src="./img/logo.png" alt="" /> -->
            <a href="#" class="logo"><img src="./view/images/partyCompleta.png" loading="lazy" title="Sua festa dos sonhos"></a>
          </div>

          <div class="links">
            <ul>
              <li>
                <a href="#header" class="active">Home</a>
              </li>
              <li>
                <a href="#services">Serviços</a>
              </li>
              <li>
                <a href="#pacotes">Pacotes</a>
              </li>
              <li>
                <a href="#duvidas">Dúvidas Frequentes</a>
              </li>
            </ul>
          </div>

          <div class="icons">
            <a href="./view/pages/login/login.php" class="fas fa-user" title="Login"></a>
          </div>

          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </nav>

      <div class="header-content">
        <div class="container grid-2">
          <div class="column-1">
            <h1 class="header-title">Sua festa dos <span> sonhos </span></h1>
            <p class="text">
              Com a equipe Your Party você organiza suas festas e eventos de forma rápida, segura, eficaz e com um só clique do conforto de sua casa.
            </p>
          </div>

          <div class="column-2 image">
            <img src="./view/images/shapes/points2.png" class="points points2" alt="" />
            <img src="./view/images/person.png" class="img-element z-index" alt="" />
          </div>
        </div>
      </div>
    </header>

    <section class="services section" id="services">
      <div class="container">
        <div class="section-header">
          <h3 class="title" data-title="Nossos">Serviços</h3>


    
          <div class="row-1">

          <div class="column-card">
              <div class="card-categorias">
                <br>
                <img src="view/images/buffet-icon.png" alt="">

                <h1 class="categorias-"> BUFFET'S </h1>
                <br>

                <div class="ir">
                <a href="./view/pages/servicos/buffet.php"> <i class="fa-solid fa-chevron-right"> </i> </a>
                </div>


              </div>
            </div>

            <div class="column-card">
              <div class="card-categorias">
                <br>
                <img src="view/images/balao-icon.png" alt="">

                <h1 class="categorias-"> DECORAÇÕES </h1>
                <br>

                <div class="ir">
                  <a href="./view/pages/servicos/decoracao.php"> <i class="fa-solid fa-chevron-right"> </i> </a>
                </div>


              </div>
            </div>

            <div class="column-card">
              <div class="card-categorias">
                <br>
                <img src="view/images/local-icon.png" alt="">

                <h1 class="categorias-"> LOCAIS </h1>

                <br>
                <div class="ir">
                <a href="./view/pages/servicos/local.php"> <i class="fa-solid fa-chevron-right"> </i> </a>
                </div>


              </div>
            </div>

            <div class="column-card">
              <div class="card-categorias">
                <br>
                <img src="view/images/seguranca-icon.png" alt="">

                <h1 class="categorias-"> SEGURANÇAS </h1>

                <br>

                <div class="ir">
                <a href="./view/pages/servicos/seguranca.php"> <i class="fa-solid fa-chevron-right"> </i> </a>
                </div>


              </div>

            </div>

          </div>

        </div>
      </div>
    </section>
    <section class="pacotes" id="pacotes">
      <div class="background-bg">
        <div class="overlay overlay-sm">
          <img src="./view/images/shapes/half-circle.png" class="shape half-circle1" alt="" />
          <img src="./view/images/shapes/half-circle.png" class="shape half-circle2" alt="" />
          <img src="./view/images/shapes/square.png" class="shape square" alt="" />
          <img src="./view/images/shapes/wave.png" class="shape wave" alt="" />
          <img src="./view/images/shapes/circle.png" class="shape circle" alt="" />
          <img src="./view/images/shapes/triangle.png" class="shape triangle" alt="" />
          <img src="./view/images/shapes/x.png" class="shape xshape" alt="" />
        </div>
      </div>

     
                
              </section>
          </section>

          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


        </div>
      </div>
    </section>


    <section class="records">
      <div class="overlay overlay-sm">
        <img src="./view/images/shapes/square.png" alt="" class="shape square1" />
        <img src="./view/images/shapes/square.png" alt="" class="shape square2" />
        <img src="./view/images/shapes/circle.png" alt="" class="shape circle" />
        <img src="./view/images/shapes/half-circle.png" alt="" class="shape half-circle" />
        <img src="./view/images/shapes/wave.png" alt="" class="shape wave wave1" />
        <img src="./view/images/shapes/wave.png" alt="" class="shape wave wave2" />
        <img src="./view/images/shapes/x.png" alt="" class="shape xshape" />
        <img src="./view/images/shapes/triangle.png" alt="" class="shape triangle" />
      </div>

      <div class="container">
        <div class="wrap">
          <div class="record-circle">
            <h2 class="number" data-num="695">689</h2>
            <h4 class="sub-title">Opiniões</h4>
          </div>
        </div>


        <div class="wrap">
          <div class="record-circle">
            <h2 class="number" data-num="892">1101</h2>
            <h4 class="sub-title">Clientes satisfeitos</h4>
          </div>
        </div>

        <div class="wrap">
          <div class="record-circle">
            <h2 class="number" data-num="421">418</h2>
            <h4 class="sub-title">Profissionais</h4>
          </div>
        </div>

        <div class="wrap">
          <div class="record-circle">
            <h2 class="number" data-num="1234">1179</h2>
            <h4 class="sub-title">Orçamentos fechados</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="duvidas" id="duvidas">
      <div class="container">
        <h3 class="title" data-title="Dúvidas">Frequentes</h3>

        <div class="content">
          <div class="row">
            <div class="col">
              <h4></h4>
              <h3 class="titlee" data-title="O site da YourParty">é pago?</h3>
              <p>Não. A YourParty é um site gratuito onde todos podem acessar e usufruir de nossos serviços sem custo algum!</p>
            </div>

            <div class="col">
              <h4></h4>
              <h3 class="titlee" data-title="Terei retorno imediato">das empresas?</h3>
              <p>Sim, você terá o retorno imediato, elas entrarão em contato com você através do seu e-mail.</p>
            </div>

            <div class="col">
              <h4></h4>
              <h3 class="titlee" data-title="É possível alterar um">item escolhido?</h3>
              <p>Sim, você pode alterar ou excluir qualquer item de sua lista.</p>
            </div>

            <div class="col">
              <h4></h4>
              <h3 class="titlee" data-title="Porque devo escolher a">YourParty?</h3>
              <p> Nós da YourParty temos o compromisso de entregar o melhor para nossos usuários, estamos sempre nos aperfeiçoando para que você tenha uma experiência incrível e que a sua festa seja extraordinária.</p>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="grid-4">
        <div class="grid-4-col footer-about">
          <h3 class="title-sm"><img src="./view/images/partyCompleta.png"></h3>
          <p class="text">
            Sua festa dos sonhos em um só clique.
          </p>
        </div>

        <div class="grid-4-col footer-links">
          <h3 class="title-sm">Ir para</h3>
          <ul>
            <li>
              <a href="./Adm/index.php">Área do Administrador</a>
            </li>
          </ul>
        </div>

        <div class="grid-4-col footer-links">
          <h3 class="title-sm">Serviços</h3>
          <ul>
            <li>
            <a href="view/pages/servicos/buffet.php">Buffet</a>
            </li>
            <li>
            <a href="view/pages/servicos/decoracao.php">Decoração</a>
            </li>
            <li>
            <a href="view/pages/servicos/local.php">Local</a>
            </li>
            <li>
            <a href="view/pages/servicos/seguranca.php">Segurança</a>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/isotope.pkgd.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="./js/app.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>
</body>

</html>