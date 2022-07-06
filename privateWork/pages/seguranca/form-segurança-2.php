<?php
include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';

require_once '/xampp/htdocs/yourParty/Classes/Seguranca.php';

if (isset($_SESSION['idEmpresa'])) {
    $id = $_SESSION['idEmpresa'];
}

$seguranca = new Seguranca();
$list = $seguranca->listar($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Cadastro Segurança </title>
    <!-- ======= Styles ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="../dashboard/assets/css/style-local.css">
    <link rel="stylesheet" href="../dashboard/assets/css/style-modal.css">

    <!-- <link rel="stylesheet" href="../../../view/css/stylepainel.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="../dashboard/assets/img/balão.png" type="image/x-icon">
</head>

<body>



    <main>
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
                            <span class="title-1">Painel</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Buffet</span>
                        </a>
                    </li>

                    <li>
                        <a href="../decoracao/index-decoracao-2.php">
                            <span class="icon">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                            </span>
                            <span class="title-1">Decoração </span>
                        </a>
                    </li>

                    <li>
                        <a href="../local/form-local-2.php">
                            <span class="icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Local </span>
                        </a>
                    </li>

                    
                    <li>
                    <a href="../avaliacao/index.php">
                        <span class="icon">
                            <i class="fa-solid fa-lock" aria-hidden="true"></i>
                        </span>
                        <span class="title-1">Orçamentos Concluídos</span>
                    </a>
                </li>
                
                <li>
                    <a href="../avaliacao/budgetpendentes.php">
                        <span class="icon">
                            <i class="fa-solid fa-question" aria-hidden="true"></i>
                        </span>
                        <span class="title-1">Orçamentos Pendentes</span>
                    </a>
                </li>


                    <li>
                        <a href="../local/index-local-2.php">
                            <span class="icon">
                                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Voltar</span>
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



                <div class="container-from">
                    <div class="contact-form">

                        <form id="enviando-dados" action="" autocomplete="off" enctype="multipart/form-data">

                            <div class="column-1">
                                <h3 class="header-title"> Cadastre uma segurança </h3>
                            </div>

                            <div class="input-container">
                                <input type="text" name="nomeSeg" class="input" placeholder="Nome Da Equipe:" require />
                            </div>

                            <div class="input-container">
                                <input type="text" name="valorSeg" class="input" placeholder="Valor:" require />
                            </div>

                            <div class="input-container">
                                <input type="number" name="qtdeSeg" class="input" placeholder="Quantidade:" require />
                            </div>

                            <div class="input-container">
                                <input type="file" name="fotoSeg" id="foto" class="input" placeholder="Foto Do Buffet" require />
                            </div>


                            <input type="reset" value="Limpar" class="btn">
                            <input type="submit" value="Enviar" class="btn" />

                        </form>
                    </div>
                </div>

                <div class="table_responsive">
                    <table>
                        <thead>
                            <tr>
                                <th> Código: </th>
                                <th> Nome: </th>
                                <th> Valor: </th>
                                <th> Quantidade: </th>
                                <th> Foto: </th>
                                <th> ? </th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($list as $row) { ?>
                                <tr>
                                    <td> <?php echo $row[0]; ?> </td>
                                    <td> <?php echo $row[1]; ?> </td>
                                    <td> <?php echo $row[2]; ?> </td>
                                    <td> <?php echo $row[3]; ?> </td>
                                    <td> <img src="../../<?php echo $row[4]; ?>" width="50px" height="50px" data-id="<?php echo $row[0]; ?>" data-image="<?php echo $row[4]; ?>" onclick="updateImage(this)"> </td>
                                    <td>
                                        <span class="action_btn">
                                            <button data-id="<?php echo $row[0]; ?>" onclick="confirmDelete(this)" class="btn"> Excluir</button>
                                            <button id="<?php echo $row[0]; ?>" onClick="updateSeguranca(<?php echo $row[0]; ?>)" class="btn">Alterar</button>
                                        </span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <br>

            </div>
        </div>

    </main>

    <!-- ==================================| MODAL - ATUALIZAR SEGURANÇA | ================================== -->
    <div id="toggle-update-seg">
        <div class="update-modal-seg">

            <form action="" id="edit-form-seguranca">
                <div class="column-1">
                    <h3 class="header-title-att"> Atualizar a <span> Segurança</span>?</h3>
                </div>

                <div class="input-container">
                    <input type="hidden" name="editIdSeg" id="editIdSeg">
                    <input type="text" placeholder="Nome:" name="editNomeSeg" class="input-modal" id="editNomeSeg">
                </div>

                <div class="input-container">
                    <input type="number" placeholder="Valor:" name="editValorSeg" class="input-modal" id="editValorSeg">
                </div>

                <div class="input-container">
                    <input type="text" placeholder="Quantidade:" name="editQtdeSeg" class="input-modal" id="editQtdeSeg">
                </div>


            </form>

            <div class="alinhar-update-seg">
                <input type="submit" form="edit-form-seguranca" class="btn" value="Cadastrar">
                <button class="btn" id="btnCloseUpdate">Cancelar</button>
            </div>

        </div>
    </div>
    <!-- ==================================| =========================== | ================================== -->



    <!-- ==================================| MODAL - DELETAR SEGURANÇA | ================================== -->
    <div id="toggle-delete-seg">
        <div class="modal-content">

            <form action="" id="form-delete-seg">
                <div class="column-1">
                    <h3 class="header-title-att"> Excluir a <span> segurança</span>?</h3>
                </div>

                <input type="hidden" name="excIdSeguranca" id="excIdSeguranca">
            </form>

            <div class="alinhar-excluir-seg">
                <button type="submit" form="form-delete-seg" class="btn"> Excluir </button>
                <button id="btnCloseDelete" class="btn"> Fechar </button>
            </div>

        </div>
    </div>
    <!-- ==================================| =========================== | ================================== -->



    <!-- ==================================| MODAL - ATUALIZAR IMAGEM | ================================== -->
    <div id="toggle-image-seg">
        <div class="modal-image">
            <div class="column-1">
                <h3 class="header-title-image"> Alterar a <span> foto</span>?</h3>
            </div>
            <div id="image-update">

            </div>
            <div id="image-alert-msg">

            </div>

            <div>

                <form action="" id="edit-image-seg" enctype="multipart/form-data">
                    <input type="hidden" name="editIdSeguranca" id="editIdSeguranca">
                    <input type="hidden" name="pathAtual" id="pathAtual">

                    <div class="input-container-img">
                        <input type="file" name="editFotoSeguranca" id="editFotoSeguranca" class="input-modal-img" />
                    </div>
                </form>

                <div class="alinhar-img">
                    <input id="btnAtualizar" type="submit" class="btn" form="edit-image-seg" value="Atualizar">
                    <button id="btnCloseImage" class="btn"> Fechar </button>
                </div>

            </div>

        </div>
    </div>
    <!-- ==================================| =========================== | ================================== -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="../../js/modal-seguranca.js"></script>


    <script src="../../js/complete-cep.js"></script>

    <script src="../../js/modal-local.js"></script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!-- https://youtu.be/rHC4_sJjNuQ -->

    <script src="../dashboard/assets/js/main.js"></script>

</body>

</html>