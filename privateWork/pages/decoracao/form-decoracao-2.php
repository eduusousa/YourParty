<?php
include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';

if (isset($_SESSION['idEmpresa'])) {
    $id = $_SESSION['idEmpresa'];
}

$decoracao = new Decoracao();
$list = $decoracao->listar($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Decoração</title>
    <!-- ======= Styles ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="../dashboard/assets/css/style-decoracao.css">
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
                        <a href="../buffet/index-buffet-2.php">
                            <span class="icon">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                            </span>
                            <span class="title-1">Buffet</span>
                        </a>
                    </li>

                    <li>
                        <a href="../decoracao/form-item-decoracao-2.php">
                            <span class="icon">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                            </span>
                            <span class="title-1">Ítem De Decoração </span>
                        </a>
                    </li>

                    <li>
                        <a href="../local/index-local-2.php">
                            <span class="icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span>
                            <span class="title-1">Local / Segurança </span>
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
                        <a href="./index-decoracao-2.php">
                            <span class="icon">
                                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Voltar</span>
                        </a>
                    </li>
                </ul>
            </div>

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
                        <form id="insert-form-decoracao" action="" autocomplete="off" enctype="multipart/form-data">

                            <div class="column-1">
                                <h3 class="header-title"> Cadastre uma decoração </h3>
                            </div>

                            <div class="input-container">
                                <input type="text" class="input" name="nomeDec" placeholder="Nome Da Decoração:" require />
                            </div>

                            <div class="input-container">
                                <input placeholder="Descrição:" name="descDec" class="input" require />
                            </div>

                            <div class="input-container">
                                <input type="text" class="input" name="temaDec" placeholder="Tema:" require />
                            </div>

                            <div class="input-container">

                                <input type="text" class="input" name="tipoDec" placeholder="Tipo:" require />
                            </div>

                            <div class="input-container">
                                <input type="number" class="input" name="valorDec" placeholder="Valor:" require />
                            </div>

                            <div class="input-container">
                                <input type="file" name="fotoDec" id="foto" class="input" placeholder="Foto:" require />
                            </div>
                            <input type="reset" value="Limpar" class="btn">


                            <input type="submit" name="cadastrarDecoracao" value="Enviar" class="btn" />

                        </form>
                    </div>
                </div>

                <br>
                <br>


                <div class="table_responsive">
                    <table>
                        <thead>
                            <tr>
                                <th> Código </th>
                                <th>Nome:</th>
                                <th>Valor:</th>
                                <th> Descrição</th>
                                <th>Tipo:</th>
                                <th>Tema:</th>
                                <th>Foto:</th>
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
                                    <td> <?php echo $row[4]; ?> </td>
                                    <td> <?php echo $row[5]; ?> </td>
                                    <td data-label="Foto do Buffet">
                                        <img src="../../<?php echo $row[6] ?>" alt="" data-id="<?php echo $row[0]; ?>" data-image="<?php echo $row[6] ?>" onclick="updateImage(this)">
                                    </td>
                                    <td>
                                        <span class="action_btn">
                                            <button data-id="<?php echo $row[0]; ?>" onclick="confirmDelete(this)" class="btn">Excluir</button>
                                            <button id="<?php echo $row[0]; ?>" onclick="updateDecoracao(<?php echo $row[0]; ?>)" class="btn">Alterar</button>
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


        <br>
    </main>


    <!-- ==================================| MODAL - DELETAR DECORAÇÃO | ================================== -->
    <div id="toggle-delete-decoracao">
        <div class="modal-delete-decoracao">

            <form action="" id="form-delete-decoracao">
                <div class="column-1">
                    <h3 class="header-title1"> Excluir a <span> Decoração</span>?</h3>
                </div>
                <input type="hidden" name="excDecoracao" id="excDecoracao">
            </form>

            <br>

            <div class="alinhar-excluir-buff">
                <button type="submit" form="form-delete-decoracao" class="btn">Excluir</button>
                <button id="closeDeleteDec" class="btn">Cancelar</button>
            </div>

        </div>

    </div>
    <!-- ==================================| ========================= | ================================== -->


    <!-- ==================================| MODAL - ATUALIZAR DECORAÇÃO | ================================== -->
    <div id="toggle-update-decoracao">
        <div class="modal-update-decoracao">
            <form action="" id="edit-form-decoracao">

                <div class="column-1">
                    <h3 class="header-title-att"> Atualizar a <span> decoração</span>?</h3>
                </div>

                <div class="input-container">
                    <input type="hidden" name="editIdDec" id="editIdDec">
                    <input type="text" name="editNomeDec" id="editNomeDec" class="input-modal" placeholder="Nome:" required />
                </div>


                <div class="input-container">
                    <input type="text" name="editTipoDec" id="editTipoDec" class="input-modal" placeholder="Tipo:" required />
                </div>


                <div class="input-container">
                    <input type="text" name="editTemaDec" id="editTemaDec" class="input-modal" placeholder="Tema:" required />
                </div>

                <div class="input-container">
                    <input type="text" name="editValorDec" id="editValorDec" class="input-modal" placeholder="Valor:" required />
                </div>

                <div class="input-container">
                    <input type="text" name="editDescDec" id="editDescDec" class="input-modal" placeholder="Descrição:" required />
                </div>

            </form>

            <div class="alinhar-excluir-buff">
                <button class="btn" type="submit" form="edit-form-decoracao">Atualizar</button>
                <button class="btn" id="closeUpdateDec">Cancelar</button>
            </div>


        </div>
    </div>
    <!-- ==================================| ========================= | ================================== -->


    <!-- ==================================| MODAL - ATUALIZAR IMAGEM | ================================== -->
    <div id="toggle-image-decoracao">
        <div class="modal-image-decoracao">
             <br>
             <br>
            <div class="column-1">
                <h3 class="header-title"> Alterar a <span> foto</span>?</h3>
            </div>

            <br>
            <br>

            <div id="image-atual"></div>

            <form action="" id="edit-image-decoracao" enctype="multipart/form-data">
                <input type="hidden" name="editIdImage" id="editIdImage">
                <input type="hidden" name="pathAtual" id="pathAtual">

                <div class="input-container-img">
                    <input type="file" name="editImage" id="editImage" class="input-modal-img">
                </div>


                <div class="alinhar-excluir-buff">
                    <input type="submit" class="btn" value="Atualizar">
                    <input id="closeImageDec" class="btn" type="button" value="Cancelar">
                </div>
            </form>
        </div>
        <!-- ==================================| ========================= | ================================== -->



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <script src="../../js/modal-decoracao.js"></script>


</body>

</html>