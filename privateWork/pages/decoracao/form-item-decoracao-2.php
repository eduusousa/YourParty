<?php
include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';
require_once '/xampp/htdocs/yourParty/Classes/Decoracao.php';

if (isset($_SESSION['idEmpresa'])) {
    $id = $_SESSION['idEmpresa'];
}

$dec = new Decoracao();
$listDec = $dec->listar($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Dashboard</title>
    <!-- ======= Styles ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


    <link rel="stylesheet" href="../dashboard/assets/css/style-buffet.css">
    <link rel="stylesheet" href="../dashboard/assets/css/style-modal.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


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
                        <a href="../buffet/form-item-buffet-2.php">
                            <span class="icon">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Buffet</span>
                        </a>
                    </li>

                    <li>
                        <a href="../decoracao/form-decoracao-2.php">
                            <span class="icon">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Decoração </span>
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

                <form id="insert-item" action="" autocomplete="off" enctype="multipart/form-data">

                    <div class="column-1">
                        <h3 class="header-title1"> Cadastre um ítem </h3>
                    </div>

                    <div class="forml" id="formulario">

                        <select name="idDecoracao" id="format" class="input-select">
                            <option selected disabled> Escolha Uma Decoração </option>
                            <?php foreach ($listDec as $row) { ?>
                                <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?> </option>
                            <?php } ?>
                        </select>

                        <div class="input-container">
                            <input class="input-item" type="text" name="itemDecoracao[]" placeholder="Ítem Do Pacote" required />
                            <button class="mais" type="button" id="add-campo"> + </button>
                        </div>

                    </div>

                    <script>
                        var cont = 1;
                        $("#add-campo").click(function() {
                            cont++;
                            $('#formulario').append(' <div class="input-container" id="campo' + cont + '"> <input class="input-item" type="text" name="itemDecoracao[]" placeholder="Ítem Do Pacote" /> <button type="button" id="' + cont + '" class="mais" > - </button> </div> ');
                        });

                        $('form').on('click', '.mais', function() {
                            var button_id = $(this).attr("id");
                            $('#campo' + button_id + '').remove();
                        });
                    </script>

                    <input type="reset" value="Limpar" class="btn">
                    <input type="submit" name="cadastrarItemDecoracao" value="Enviar" class="btn" />
                </form>

                <hr>

                <div class="contact-form">
                    <form method="POST" id="popup" autocomplete="off" enctype="multipart/form-data">
                        <div class="forml" id="formulario">
                            <div class="column-1">
                                <h3 class="header-title"> Liste um ítem </h3>
                            </div>

                            <div class="input-container">

                                <select name="idDecoracao" id="format" class="input-select" required>
                                    <option selected disabled> Escolha Uma Decoração Para Listar </option>
                                    <?php foreach ($listDec as $row) { ?>
                                        <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?> </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <input class="btn" type="submit" value="Listar" name="listarItem">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="table_responsive">
            <table>
                <thead>
                    <tr>
                        <th> Código: </th>
                        <th> Ítem: </th>
                        <th> Código Da Decoração:</th>
                        <th> ? </th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    if (isset($_POST['listarItem'])) {
                        $idList = $_POST['idDecoracao'];
                        $list = $dec->listarItem($idList);

                    ?>
                        <?php foreach ($list as $row) { ?>

                            <tr>
                                <td> <?php echo $row[0]; ?> </td>
                                <td> <?php echo $row[1]; ?> </td>
                                <td> <?php echo $row[2]; ?> </td>

                                <td>
                                    <span class="action_btn">
                                        <button data-id="<?php echo $row[0]; ?>" onclick="confirmDelete(this)" class="btn">Excluir</button>
                                        <button id="<?php echo $row[0]; ?>" onclick="updateItem(<?php echo $row[0]; ?>)" class="btn">Alterar</button>
                                    </span>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <br>

    </main>


    <!-- ==================================| MODAL - DELETAR ITEM DECORAÇÃO | ================================== -->
    <div id="toggle-delete-itemDec">
        <div class="modal-item-dec">

            <form action="" id="delete-itemDec">
                <div class="column-1">
                    <h3 class="header-title"> Excluir o <span> Ítem</span>?</h3>
                </div>
                <input type="hidden" name="excItem" id="excItem">
            </form>

            <div class="alinhar-excluir-buff">
                <button type="submit" form="delete-itemDec" class="btn">Excluir</button>
                <button id="closeDeleteItem" class="btn">Cancelar</button>
            </div>

        </div>
    </div>
    <!-- ==================================| ============================== | ================================== -->


    <!-- ==================================| MODAL - ATUALIZAR ITEM DECORAÇÃO | ================================== -->
    <div id="toggle-update-item">
        <div class="modal-update-item">

            <form action="" id="edit-form-item">
            <div class="column-1">
                    <h3 class="header-title"> Atualizar o <span> Ítem</span>?</h3>
                </div>
                <div class="input-container">
                <input type="hidden" name="editIdItem" id="editIdItem">
                <input type="text" name="editNomeItem" id="editNomeItem" class="input-modal" placeholder="Ítem:">
                </div>
            </form>

            <div class="alinhar-excluir-buff">
            <button type="submit" class="btn" form="edit-form-item">Atualizar</button>
            <button class="btn" id="closeUpdateItem">Cancelar</button>
            </div>
        </div>
    </div>
    <!-- ==================================| ================================= | ================================== -->
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <!-- =========== Scripts =========  -->
        <script src="../dashboard/assets/js//main.js"></script>
        <script src="../../js/modal-item-dec.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>





</body>

</html>