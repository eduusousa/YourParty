<?php
session_start();
require_once '/xampp/htdocs/yourParty/Classes/Empresa.php';
require_once '/xampp/htdocs/yourParty/Classes/Servico.php';

$empresa = new Empresa();
$servico = new Servico();

$list = $servico->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Party - Login </title>
  <!-- ===========| ICON |=========== -->
  <link rel="icon" type="image/png" href="../../images/balão.png" loading="lazy" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <!-- ===========| JAVASCRIPT |=========== -->
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <!-- Link OBRIGATÓRIO da máscara jquery   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- ===========| CSS |=========== -->
  <link rel="stylesheet" href="../../../view/css/style-login.css" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <!-- ======================= FORMULÁRIO DE LOGIN -- CLIENTE ======================= -->
        <form action="./user/login-cliente.php" class="sign-in-form" method="post">
          <h3 class="title1" data-title="Your Party"></h3>
          <h2 class="title">Login - Cliente</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="E-mail" name="loginCliente" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="clienteSenha" />
          </div>

          <a href="../login/cliente.php"><input type="submit" value="Entrar" class="btn solid" name="logarCliente" /></a>


          

          <p class="social-text">Quer fazer seu orçamento conosco?</p>
          <button type="button" id="edit-show" class="forgot-passw"> Cadastre-se </button>
        </form>

        <div id="edit-modal">
          <div class="modall">
            <div class="top-form">
              <div class="close-modal">
                &#10006;
              </div>
            </div>


            <div class="form">
              <h2> Cadastre-se, <span> cliente </span></h2>
              <form action="" id="insert-cliente-form">
                <div>
                  <label for="arquivo"><i class="bi bi-image-fill"></i>Adicione a sua foto</label>
                  <input type="file" class="form-control1" name="arquivo" id="arquivo" />
                </div>

                <div class="action">
                  <input type="text" class="form-control" placeholder="Nome" name="nomeCliente" id="nomeCliente" required />
                  <input type="text" class="form-control" data-mask="000.000.000-00" placeholder="CPF" name="cpfCliente" id="cpfCliente" required />
                </div>

                <div class="action">
                  <input type="text" data-mask="+55 (00) 00000-0000" class="form-control" placeholder="Celular" name="telefone[]" id="telefone[]" required />
                  <input type="email" id="email" class="form-control" placeholder="E-mail" name="emailCliente" id="emailCliente" required />
                </div>

                <div class="action">
                  <input type="password" id="senha" class="form-control" placeholder="Senha" name="senhaCliente" id="senhaCliente" required />
                  <input type="password" id="senha" class="form-control" placeholder="Confirme senha" name="confirmarSenha" id="confirmarSenha" required />
                </div>
                <button type="submit" form="insert-cliente-form" class="submit-btn"> Cadastrar </button>

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



        <!-- ======================= FIM DO LOGIN -- CLIENTE ======================= -->



        <!-- ======================= FORMULÁRIO DE LOGIN -- EMPRESA ======================= -->
        <form action="./work/login-empresa.php" class="sign-up-form" method="post">
          <h3 class="title1" data-title="Your Party"></h3>
          <h2 class="title">Login - Parceiro</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="E-mail" name="loginEmpresa" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="empresaSenha" />
          </div>
          <input type="submit" class="btn" value="Entrar" name="logarEmpresa" />

          <p class="social-text"></p>
          <p class="social-text">Tem interesse em ser nosso parceiro?</p>
          <button type="button" id="edit-sho" class="forgot-passw"> Cadastre-se </button>

        </form>

        <div id="edit-modal1">
          <div class="modal">
            <div class="top-form">
              <div class="close-modal1">
                &#10006;
              </div>
            </div>

            <div class="for">
              <h2> Cadastre-se, <span> parceiro </span> </h2>
              <form action="" id="insert-empresa-form">


                <div class="action">

                  <div class="selectBox" onclick="showCheckboxes()">
                    <select>
                      <option>Selecione o(s) Serviço(s)</option>
                    </select>
                    <div class="overSelect"></div>
                  </div>
                  <div id="checkboxes">
                    <?php foreach ($list as $row) { ?>
                      <label for="one"><input type="checkbox" id="one" name="catalogoEmpresa[]" value="<?php echo $row['idServico']; ?>" /> <?php echo $row['nomeServico']; ?> </label>
                    <?php } ?>
                  </div>

                  <script>
                    var expanded = false;

                    function showCheckboxes() {
                      var checkboxes = document.getElementById("checkboxes");
                      if (!expanded) {
                        checkboxes.style.display = "block";
                        expanded = true;
                      } else {
                        checkboxes.style.display = "none";
                        expanded = false;
                      }
                    }
                  </script>

                </div>

                <div class="action">
                  <input type="text" class="form-control" name="nomeEmpresa" placeholder="Nome da empresa" required />
                  <input type="text" data-mask="00.000.000/0000-00" class="form-control" name="cnpjEmpresa" placeholder="CNPJ da Empresa" required />
                </div>

                <div class="action">
                  <input type="text" data-mask="00000-000" class="form-control" name="cepEmpresa" placeholder="CEP" onblur="pesquisacep(this.value);" required />
                  <input type="text" class="form-control" name="endEmpresa" id="endereco" placeholder="Endereço" required />
                </div>

                <div class="action">
                  <input type="text" class="form-control" name="bairroEmpresa" id="bairro" placeholder="Bairro" required />
                  <input type="text" class="form-control" maxlength="4" name="numEmpresa" placeholder="Número" required />
                </div>

                <div class="action">
                  <input type="text" class="form-control" name="cidadeEmpresa" id="cidade" placeholder="Cidade" required />
                  <input type="text" class="form-control" maxlength="2" name="estadoEmpresa" id="estado" placeholder="Estado" required />
                </div>

                <div class="action">
                  <input type="text" data-mask="+55 (00) 00000-0000" class="form-control" placeholder="Celular" name="telefone[]" id="telefone[]" required />
                  <input type="email\" id="email" class="form-control" name="emailEmpresa" placeholder="E-mail" required />
                </div>

                <div class="action">
                  <input type="password" id="senha" class="form-control" name="senhaEmpresa" placeholder="Senha" required />
                  <input type="password" id="senha" class="form-control" name="confirmarSenha" placeholder="Confirme senha" required />
                </div>
                <button type="submit" form="insert-empresa-form" class="submit-btn"> Cadastrar </button>

              </form>
            </div>
          </div>
        </div>




        <script type="text/javascript">
          $(function() {
            $('#edit-sho').click(function() {
              $('#edit-modal1').fadeIn().css("display", "flex");
            });

            $('.close-modal1').click(function() {
              $('#edit-modal1').fadeOut();
            });
          });
        </script>

        <!-- ======================= FIM DO LOGIN -- EMPRESA ======================= -->

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>É nosso parceiro?</h3>
          <p>
            Entre em sua conta por aqui e deixe mais clientes satisfeitos!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Entre
          </button>
        </div>
        <img src="../../images/Celebration-pana.png" class="image" alt="" />
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>É nosso cliente?</h3>
          <p>
            Faça seu login aqui e descubra o melhor orçamento para sua festa e evento dos sonhos!
          </p>
          <button class="btn transparent" id="sign-in-btn">
            entre
          </button>
        </div>
        <img src="../../images/Balloons-amico.png" class="image" alt="" />
      </div>

    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="../../js/end-empresa.js"></script>
  <script src="../../js/roll-login.js"></script>
  <script src="../../js/modal-cliente.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2({
        width: 'resolve',
      });

    });
  </script>

  <script>
    if (<?php echo $_SESSION['message_session']; ?> == 1) {

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

      toastr.error("Por favor, faça login para acessar nossos sistemas.", "Sessão Expirada...")

    }


    // -------------- LOGIN 

    if (<?php echo $_SESSION['message_login']; ?> == 1) {

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


      toastr.warning("Por favor, digite um <b>Email</b> ou uma <b>Senha</b> válida", "Oops...")

    } else if (<?php echo $_SESSION['message_login']; ?> == 2) {

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

      toastr.error("Ocorreu um probleminha, tente novamente mais tarde.", "Oops...")

    } else if (<?php echo $_SESSION['message_login']; ?> == 3) {

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

      toastr.warning("Por favor, preencha todos os campos.", "Oops...")


    }
  </script>

  <?php
    $_SESSION['message_session'] = 0;
    $_SESSION['message_login'] = 0;
  ?>

</body>

</html>