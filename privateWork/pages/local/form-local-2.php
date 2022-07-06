<?php
include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';

require_once '/xampp/htdocs/yourParty/Classes/Local.php';

if (isset($_SESSION['idEmpresa'])) {
    $id = $_SESSION['idEmpresa'];
}

$local = new Local();
$list = $local->listar($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Cadastro Local</title>
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
                        <a href="../seguranca/form-segurança-2.php">
                            <span class="icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Segurança </span>
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
                        <form id="enviando-dados-local" action="" autocomplete="off" enctype="multipart/form-data">

                            <div class="column-1">
                                <h3 class="header-title"> Cadastre um local </h3>
                            </div>

                            <div class="input-container">
                                <input type="text" class="input-tipo" name="nomeLocal" id="nomeLocal" placeholder="Nome Do Local:" require />

                                <input type="text" class="input-tipo" name="valorLocal" id="valorLocal" placeholder="Valor:" require />
                            </div>

                            <div class="input-container">
                                <input type="text" class="input-tipo" name="cepLocal" id="cepLocal" placeholder="Cep:" required onblur="pesquisacep(this.value)" />

                                <input type="text" class="input-end" name="endLocal" id="endLocal" placeholder="Endereço:" require />
                            </div>

                            <div class="input-container">
                                <input type="text" class="input-tipo" name="numLocal" id="numLocal" placeholder="Número:" require />

                                <input type="text" class="input-tipo" name="bairroLocal" id="bairroLocal" placeholder="Bairro:" require />
                            </div>

                            <div class="input-container">
                                <input type="text" class="input-tipo" name="cidadeLocal" id="cidadeLocal" placeholder="Cidade:" require />

                                <input type="text" class="input-tipo" name="estadoLocal" id="estadoLocal" placeholder="Estado:" require />
                            </div>

                            <div class="input-container">
                                <input type="file" name="fotoLocal" id="foto" class="input" placeholder="Foto:" require />
                            </div>

                            <input type="reset" value="Limpar" class="btn">
                            <input type="submit" value="Enviar" class="btn" require />

                        </form>
                    </div>
                </div>

                <div class="table_responsive">
                    <table>
                        <thead>
                            <tr>
                                <th> Código </th>
                                <th>Nome:</th>
                                <th>Valor:</th>
                                <th>Endereço</th>
                                <th>Cep:</th>
                                <th>Estado:</th>
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
                                    <td> <?php echo $row[7]; ?> </td>
                                    <td> <?php echo $row[8]; ?> </td>
                                    <td> <img src="../../<?php echo $row[9]; ?>" data-idImage="<?php echo $row[0]; ?>" data-image="<?php echo $row[9]; ?>" onclick="updateImageLocal(this)"> </td>
                                    <td>
                                        <span class="action_btn">
                                            <button data-id="<?php echo $row[0]; ?>" onclick="confirmDelete(this)" class="btn">Excluir</button>
                                            <button id="<?php echo $row[0]; ?>" onclick="listUpdateLocal(<?php echo $row[0]; ?>)" class="btn">Alterar</button>
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


    <!-- ==================================| MODAL - DELETAR LOCAL | ================================== -->
    <div id="toggle-delete-local">

        <div class="modal-local-delete">

            <form action="" id="form-delete-local">
                <div class="column-1">
                    <h3 class="header-title"> Excluir o <span> local</span>?</h3>
                </div>

                <input type="hidden" name="excIdLocal" id="excIdLocal">
            </form>

            <div class="alinhar-excluir">
                <button type="submit" form="form-delete-local" class="btn"> Excluir</button>
                <button id="btnCloseDelete" class="btn">Cancelar</button>
            </div>
        </div>

    </div>
    <!-- ==================================| ====================== | ================================== -->


    <!-- ==================================| MODAL - ATUALIZAR LOCAL | ================================== -->
    <div id="toggle-update-local">
        <div class="modal-update-local">

            <form action="" id="edit-form-local">
                <div class="column-1">
                    <h3 class="header-title"> Atualizar o <span> local</span>?</h3>
                </div>


                <div class="input-container">
                    <input type="hidden" name="idLocal" id="editIdLocal">
                    <input type="text" name="nomeLocal" id="editNomeLocal" class="input-tipo2" placeholder="Nome:" required />

                    <input type="number" name="valorLocal" id="editValorLocal" class="input-tipo2" placeholder="Valor:" required />
                </div>


                <div class="input-container">
                    <input type="text" name="cepLocal" id="editCepLocal" class="input-tipo2" placeholder="Cep:" onblur="pesquisarcep(this.value)" />

                    <input type="text" name="endLocal" id="editEndLocal" class="input-end2" placeholder="Endereço:" required />
                </div>

                <div class="input-container">
                    <input type="text" name="numLocal" id="editNumLocal" class="input-tipo2" placeholder="Número:" required />

                    <input type="text" name="bairroLocal" id="editBairroLocal" class="input-tipo2" placeholder="Bairro:" required />
                </div>

                <div class="input-container">
                    <input type="text" name="cidadeLocal" id="editCidadeLocal" class="input-tipo2" placeholder="Cidade:" required />
                    <input type="text" name="estadoLocal" id="editEstadoLocal" class="input-tipo2" placeholder="Estado:" required />
                </div>
            </form>



            <div class="alinhar-atualizar">
                <button type="submit" form="edit-form-local" class="btn">Atualizar</button>
                <button id="btnCloseUpdate" class="btn">Cancelar</button>
            </div>
            
        </div>
    </div>
    <!-- ==================================| ====================== | ================================== -->


    <!-- ==================================| MODAL - ATUALIZAR IMAGE | ================================== -->
    <div id="toggle-image-local">
        <div class="modal-update-image">

            <div class="column-2">
                <h3 class="header-title"> Alterar a <span> foto</span>?</h3>
            </div>

            <div class="image-update-local">

            </div>

            <form action="" id="edit-image-local" enctype="multipart/form-data">
                <input type="hidden" name="editIdImage" id="editIdImage">
                <input type="hidden" name="pathAtual" id="pathAtual">

                <div class="input-container-img">
                    <input type="file" name="editImageLocal" id="editImageLocal" class="input-modal-img" />
                </div>

            </form>

            <div class="alinhar-atualizar">
                <input type="submit" form="edit-image-local" class="btn" value="Atualizar">
                <button id="btnCloseImage" class="btn">Cancelar</button>
            </div>


        </div>
    </div>
    <!-- ==================================| ====================== | ================================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="../../js/complete-cep.js"></script>

    <script src="../../js/modal-local.js"></script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!-- https://youtu.be/rHC4_sJjNuQ -->

    <script src="../dashboard/assets/js/main.js"></script>
    <script src="../dashboard/assets/js/app.js"></script>

</body>