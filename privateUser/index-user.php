<?php

include_once './validation-index.php';

require_once '/xampp/htdocs/yourParty/Classes/Cliente.php';
require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
require_once '/xampp/htdocs/yourParty/Classes/ItemOrcamento.php';

require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
require_once '/xampp/htdocs/yourParty/Classes/Local.php';
require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';
require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

$cliente = new Cliente();
$item = new ItemOrcamento();

$buffet = new Buffet();
$local = new Local();
$decoracao = new Decoracao();
$seguranca = new Seguranca();

$conexao = Conexao::conectar();
$query = $conexao->prepare("SELECT c.nomeCliente, c.fotoCliente, f.numeroFoneCliente FROM tbCliente c
                                      INNER JOIN tbFoneCliente f ON c.idCliente = f.idCliente
                                      WHERE c.idCliente = :s LIMIT 1");
$query->bindValue(':s', $_SESSION['idCliente']);
$query->execute();

$list = $query->fetch(PDO::FETCH_BOTH);


$buffetBarato = $conexao->prepare("SELECT idBuffet,nomeBuffet,descricaoBuffet,valorBuffet,fotoBuffet,nomeEmpresa FROM tbbuffet 
                                      INNER JOIN tbempresa ON (tbbuffet.idEmpresa = tbempresa.idEmpresa) 
                                      WHERE valorBuffet = (Select Min(valorBuffet) FROM tbbuffet)");
$buffetBarato->execute();

$result = $buffetBarato;
$list1 = $result->fetch(PDO::FETCH_ASSOC);

$decoracaoBarata = $conexao->prepare("SELECT idDecoracao,nomeDecoracao,valorDecoracao,descDecoracao,tipoDecoracao, 
                                        temaDecoracao,fotoDecoracao,nomeEmpresa  FROM tbDecoracao 
                                        INNER JOIN tbempresa ON (tbdecoracao.idEmpresa = tbempresa.idEmpresa) 
                                      WHERE valorDecoracao = (Select Min(valorDecoracao) FROM tbdecoracao)");
$decoracaoBarata->execute();

$result = $decoracaoBarata;
$list2 = $result->fetch(PDO::FETCH_ASSOC);

$localBarato = $conexao->prepare("SELECT idLocal,nomeLocal,valorLocal,enderecoLocal,numeroLocal,cidadeLocal,
                                      bairroLocal,cepLocal,estadoLocal,fotoLocal,nomeEmpresa FROM tbLocal 
                                      INNER JOIN tbempresa  ON (tblocal.idEmpresa = tbempresa.idEmpresa)
                                      WHERE valorlocal = (Select Min(valorlocal) FROM tblocal)");
$localBarato->execute();

$result = $localBarato;
$list3 = $result->fetch(PDO::FETCH_ASSOC);

$segurancaBarato = $conexao->prepare("SELECT idSeguranca,descSeguranca,valorSeguranca,quantidadeSeguranca,   
                                      fotoSeguranca,nomeEmpresa FROM tbSeguranca   
                                      INNER JOIN tbempresa  ON (tbseguranca.idEmpresa = tbempresa.idEmpresa)
                                      WHERE valorSeguranca = (Select Min(valorSeguranca) FROM tbseguranca)");
$segurancaBarato->execute();

$result = $segurancaBarato;
$list4 = $result->fetch(PDO::FETCH_ASSOC);


$buffetAvaliado = $item->buffetAvaliado();
if(!empty($buffetAvaliado)){

  $id_listBuffet = $buffetAvaliado[0]['idBuffet'];
  $listBuffet = $buffet->listarBuffet($id_listBuffet);

}else{

  $listBuffet = $list1;

}


$localAvaliado = $item->localAvaliado();
if(!empty($localAvaliado)){

  $idLocal = $localAvaliado[0]['idLocal'];
  $listLocal = $local->listarLocal($idLocal);

}else{

  $listLocal = $list3;

}


$decoracaoAvaliado = $item->decoracaoAvaliado();
if(!empty($decoracaoAvaliado)){

  $idDecoracao = $decoracaoAvaliado[0]['idDecoracao'];
  $listDecoracao = $decoracao->listarDecoracao($idDecoracao);

}else{

  $listDecoracao = $list2;

}



$segurancaAvaliado = $item->segurancaAvaliado();
if(!empty($segurancaAvaliado)){

  $idSeguranca = $segurancaAvaliado[0]['idSeguranca'];
  $listSeguranca = $seguranca->listarSeguranca($idSeguranca);

}else{

  $listSeguranca = $list4;

}






?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Party - A sua festa inesquecível</title>
  <link rel="icon" type="image/png" href="../view/images/balão.png" loading="lazy" />
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <link rel="stylesheet" href="./css/style-modal-carrinho.css">

  <!--=============== CSS ===============-->

  <link rel="stylesheet" href="../view/css/style.css" />
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
            <a href="#" class="logo"><img src="../view/images/partyCompleta.png" loading="lazy" title="Sua festa dos sonhos"></a>
          </div>

          <div class="links">
            <ul>
              <li>
                <a href="./index-user.php" class="active">Home</a>
              </li>
              <li>
                <a href="./pages/search/search-page.php">Serviços</a>
              </li>
              <li>
                <a href="./pages/cart/carrinho.php">Carrinho</a>
              </li>
              <li>
                <a href="./pages/budget/budget.php">Meus Orçamentos</a>
              </li>
            </ul>
          </div>

          <div class="icons">
            <a href="./pages/profile/perfil-cliente.php" class="fa-regular fa-address-card" title="Perfil"></a>
            <a href="./sair-cliente.php" class="fa-solid fa-right-from-bracket" title="Sair"></a>
          </div>


          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </nav>

    </header>

    <h1>Olá, <?php echo $list['nomeCliente'] ?>!</h1>

    <br>

    <section class="buffets" id="buffets">
      <div class="container">
        <div class="section-header">

          <h3 class="title" data-title="Mais">Recomendados</h3>
          <section id="feature" class="section-p1">

            <section id="product1" class="section-p1">

              <div class="pro-container">

                <div class="pro">
                  <img src=../privateWork/<?php echo $listBuffet['fotoBuffet'] ?>>
                  <div class="des">
                    <span><?php echo $listBuffet['nomeEmpresa'] ?></span>
                    <h5><?php echo $listBuffet['nomeBuffet'] ?></h5>


                    <div class="star">

                      <i>
                        <?php
                        $avgBuf = $item->avgAvaliacaoBuffet($listBuffet['idBuffet']);

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

                    <h4> R$<?php echo number_format($listBuffet['valorBuffet'], 2, ',', '.'); ?></h4>

                    <a href="./pages/details/itenscard.php?servico=buffet&id=<?php echo $list1['idBuffet'] ?>">
                      + Detalhes
                    </a>

                  </div>


                </div>



                <div class="pro">
                  <img src=../privateWork/<?php echo $listLocal['fotoLocal'] ?>>
                  <div class="des">
                    <span><?php echo $listLocal['nomeEmpresa'] ?></span>
                    <h5><?php echo $listLocal['nomeLocal'] ?></h5>

                    <div class="star">

                      <i>
                        <?php
                        $avgLocal = $item->avgAvaliacaoLocal($listLocal['idLocal']);

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

                    <h4> R$<?php echo number_format($listLocal['valorLocal'], 2, ',', '.'); ?></h4>

                    <a href="./pages/details/itenscard.php?servico=local&id=<?php echo $listLocal['idLocal'] ?>">
                      + Detalhes
                    </a>

                  </div>


                </div>



                <div class="pro">
                  <img src=../privateWork/<?php echo $listDecoracao['fotoDecoracao'] ?>>
                  <div class="des">
                    <span><?php echo $listDecoracao['nomeEmpresa'] ?></span>
                    <h5><?php echo $listDecoracao['nomeDecoracao'] ?></h5>
                    
                    <div class="star">

                      <i>
                        <?php
                        $avgDecoracao = $item->avgAvaliacaoDecoracao($listDecoracao['idDecoracao']);

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

                    <h4> R$<?php echo number_format($listDecoracao['valorDecoracao'], 2, ',', '.'); ?></h4>

                    <a href="./pages/details/itenscard.php?servico=decoracao&id=<?php echo $listDecoracao['idDecoracao'] ?>">
                      + Detalhes
                    </a>

                  </div>

                </div>



                <div class="pro">
                  <img src=../privateWork/<?php echo $listSeguranca['fotoSeguranca'] ?>>
                  <div class="des">
                    <span><?php echo $listSeguranca['nomeEmpresa'] ?></span>
                    <h5><?php echo $listSeguranca['descSeguranca'] ?></h5>

                    <div class="star">

                      <i>
                        <?php

                          $avgSeguranca = $item->avgAvaliacaoSeguranca($listSeguranca['idSeguranca']);

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

                    <h4> R$<?php echo number_format($listSeguranca['valorSeguranca'], 2, ',', '.'); ?></h4>

                    <a href="./pages/details/itenscard.php?servico=seguranca&id=<?php echo $listSeguranca['idSeguranca'] ?>">
                      + Detalhes
                    </a>

                  </div>

                </div>

              </div>
            </section>

            <br>


            <!---------------------------------------------- TERCEIRO GRUPO DE CARDS -------------------------------------------------------------->
            <br>

            <section class="locais" id="locais">
              <h3 class="title" data-title="Party">PROMOS</h3>
              <section id="feature" class="section-p1">

                <section id="product1" class="section-p1">
                  <div class="pro-container">

                    <!----------- BUFFET ----------->
                    <div class="pro">
                      <img src=../privateWork/<?php echo $list1['fotoBuffet'] ?>>
                      <div class="des">
                        <span><?php echo $list1['nomeEmpresa'] ?></span>
                        <h5><?php echo $list1['nomeBuffet'] ?></h5>

                        <div class="star">

                          <i>
                            <?php
                            $avgBuf = $item->avgAvaliacaoBuffet($list1['idBuffet']);

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

                        <h4> R$<?php echo number_format($list1['valorBuffet'], 2, ',', '.'); ?></h4>

                        <a href="./pages/details/itenscard.php?servico=buffet&id=<?php echo $list1['idBuffet'] ?>">
                          + Detalhes
                        </a>


                      </div>

                    </div>

                    <!----------- DECORAÇÃO ----------->
                    <div class="pro">
                      <img src=../privateWork/<?php echo $list2['fotoDecoracao'] ?>>
                      <div class="des">
                        <span><?php echo $list2['nomeEmpresa'] ?></span>
                        <h5><?php echo $list2['nomeDecoracao'] ?></h5>

                        <div class="star">
                          <i>
                            <?php
                            $avgDecoracao = $item->avgAvaliacaoDecoracao($list2['idDecoracao']);

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

                        <h4> R$<?php echo number_format($list1['valorBuffet'], 2, ',', '.'); ?></h4>


                        <a href="./pages/details/itenscard.php?servico=decoracao&id=<?php echo $list2['idDecoracao'] ?>">
                          + Detalhes
                        </a>

                      </div>
                    </div>

                    <!----------- LOCAL ----------->
                    <div class="pro">
                      <img src=../privateWork/<?php echo $list3['fotoLocal'] ?>>
                      <div class="des">
                        <span><?php echo $list3['nomeEmpresa'] ?></span>
                        <h5><?php echo $list3['nomeLocal'] ?></h5>

                        <div class="star">
                          <i>
                            <?php
                            $avgLocal = $item->avgAvaliacaoLocal($list3['idLocal']);

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

                        <h4> R$<?php echo number_format($list3['valorLocal'], 2, ',', '.'); ?></h4>

                        <a href="./pages/details/itenscard.php?servico=local&id=<?php echo $list3['idLocal'] ?>">
                          + Detalhes
                        </a>

                      </div>

                    </div>

                    <!----------- SEGURANÇA ----------->
                    <div class="pro">
                      <img src=../privateWork/<?php echo $list4['fotoSeguranca'] ?>>
                      <div class="des">
                        <span><?php echo $list4['nomeEmpresa'] ?></span>
                        <h5><?php echo $list4['descSeguranca'] ?></h5>


                        <div class="star">
                          <i>
                            <?php
                            $avgSeguranca = $item->avgAvaliacaoSeguranca($list4['idSeguranca']);

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
                        <h4> R$<?php echo number_format($list4['valorSeguranca'], 2, ',', '.'); ?></h4>

                        <a href="./pages/details/itenscard.php?servico=seguranca&id=<?php echo $list4['idSeguranca'] ?>">
                          + Detalhes
                        </a>

                      </div>

                    </div>

                  </div>
                </section>
              </section>
            </section>







  </main>

  <footer class="footer">
    <div class="container">
      <div class="grid-4">
        <div class="grid-4-col footer-about">
          <h3 class="title-sm"><img src="../view/images/partyCompleta.png"></h3>
          <p class="text">
            Sua festa dos sonhos em um só clique.
          </p>
        </div>

        <div class="grid-4-col footer-links">
          <h3 class="title-sm">Ir para</h3>
          <ul>
            <li>
              <a href="#">Buffet</a>
            </li>
            <li>
              <a href="#">Decoração</a>
            </li>
            <li>
              <a href="#">Locais</a>
            </li>
            <li>
              <a href="#">Segurança</a>
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

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="./js/isotope.pkgd.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="./js/app.js"></script>
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
          "<p> Já existe um Buffet no carrinho... </p> <br> <button class='button-toastr' type='button' onclick='confirmBuffet(" + id + ")'>Sim</button> <button class='button-not' type='button'>Não</button>", "Deseja substituir?"
        )

      } else {

        $.get('./pages/cart/carrinho.php?product=buffet&acao=add&id=' + id + '')
        location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

      }

    }

    function confirmBuffet(id) {

      $.get('./pages/cart/carrinho.php?product=buffet&acao=add&id=' + id + '')

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

        $.get('./pages/cart/carrinho.php?product=decoracao&acao=add&id=' + id + '')
        location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

      }

    }

    function confirmDecoracao(id) {

      $.get('./pages/cart/carrinho.php?product=decoracao&acao=add&id=' + id + '')

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

        $.get('./pages/cart/carrinho.php?product=local&acao=add&id=' + id + '')
        location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

      }

    }

    function confirmLocal(id) {

      $.get('./pages/cart/carrinho.php?product=local&acao=add&id=' + id + '')

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

        $.get('./pages/cart/carrinho.php?product=seguranca&acao=add&id=' + id + '')
        location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

      }

    }

    function confirmSeguranca(id) {

      $.get('./pages/cart/carrinho.php?product=seguranca&acao=add&id=' + id + '')

      location.href = "http://localhost:8080/yourParty/privateUser/pages/cart/carrinho.php"

    }
  </script>



</body>

</html>