<?php
require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';
include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';


if (isset($_SESSION['idEmpresa'])) {
    $id = $_SESSION['idEmpresa'];
}


$buffet = new Buffet();
$lista = $buffet->listar($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Ítem </title>
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
                        <a href="./form-buffet-2.php">
                            <span class="icon">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Ítem De Buffet</span>
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
                        <a href="./index-buffet-2.php">
                            <span class="icon">
                            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                            </span>
                            <span class="title-1"> Voltar</span>
                        </a>
                    </li>
                </ul>
            </div>
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

                    <form action="" id="insert-item-buffet" autocomplete="off" enctype="multipart/form-data">

                        <div class="column-1">
                            <h3 class="header-title1"> Cadastre um ítem</h3>
                        </div>

                        <div class="forml" id="formulario">

                            <select name="nomeBuffet" id="format" class="input-select">
                                <option selected disabled> Escolha Um Buffet </option>
                                <?php foreach ($lista as $row) { ?>
                                    <option value="<?php echo $row[0]; ?>">
                                        <?php echo $row[1]; ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <div class="input-container">
                                <input class="input-item" type="text" name="itemBuffet[]" placeholder="Ítem Do Pacote" />
                                <button class="mais" type="button" id="add-campo"> + </button>
                            </div>

                        </div>

                        <script>
                            var cont = 1;
                            $("#add-campo").click(function() {
                                cont++;
                                $('#formulario').append(' <div class="input-container" id="campo' + cont + '"> <input class="input-item" type="text" name="itemBuffet[]" placeholder="Ítem Do Pacote" /> <button type="button" id="' + cont + '" class="mais" > - </button> </div> ');
                            });

                            $('form').on('click', '.mais', function() {
                                var button_id = $(this).attr("id");
                                $('#campo' + button_id + '').remove();
                            });
                        </script>

                        <input type="reset" value="Limpar" class="btn">
                        <input type="submit" name="cadastrarItemBuffet" value="Enviar" class="btn" />
                    </form>

                    <hr>

                    <div class="contact-form">
                        <form method="POST" id="popup" autocomplete="off" enctype="multipart/form-data">
                            <div class="forml" id="formulario">
                                <div class="column-1">
                                    <h3 class="header-title"> Liste um ítem </h3>
                                </div>

                                <div class="input-container">


                                    <select name="idBuffet" id="format" class="input-select" required>
                                        <option selected disabled> Escolha Um Buffet Para Listar </option>
                                        <?php foreach ($lista as $row) { ?>

                                            <option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?></option>

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
                            <th> Código </th>
                            <th> Ítem </th>
                            <th> ? </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        if (isset($_POST['listarItem'])) {
                            $idBuf = $_POST['idBuffet'];

                            $list = $buffet->listarItem($idBuf);
                        ?>

                            <?php foreach ($list as $row) { ?>

                                <tr>
                                    <td> <?php echo $row[0]; ?> </td>
                                    <td> <?php echo $row[1]; ?></td>
                                    <td>
                                        <span class="action_btn">
                                            <button data-id="<?php echo $row[0] ?>" onclick="deleteItem(this)" class="btn"> Excluir </button>
                                            <button id="<?php echo $row[0]; ?>" onclick="updateItem(<?php echo $row[0]; ?>)" class="btn">Alterar</button>
                                        </span>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>






            <!-- ==================| MODAL - DELETAR ITEM | ================== -->
            <div id="toggle-delete-item">
                <div class="modal-delete-item">

                    <form action="" id="form-delete-item">
                        <div class="column-1">
                            <h3 class="header-title"> Excluir o <span> Ítem</span>?</h3>
                        </div>

                        <input type="hidden" name="excItemBuffet" id="excItemBuffet" />

                    </form>

                    <div class="alinhar-excluir-buff">
                        <button type="submit" form="form-delete-item" class="btn">Excluir</button>
                        <button id="closeItemDelete" class="btn">Cancelar</button>
                    </div>

                </div>
            </div>
            <!-- ==================| ==================== | ================== -->

            <!-- ==================| MODAL - ATUALIZAR ITEM | ================== -->
            <div id="toggle-update-item">
                <div class="modal-update-item">

                    <form action="" id="edit-item-buffet">

                        <div class="column-1">
                            <h3 class="header-title"> Atualizar o <span> Ítem</span>?</h3>
                        </div>

                        <div class="form-group">

                            <input type="hidden" name="editItemBuffet" id="editItemBuffet" />

                            <div class="input-container">
                                <input type="text" name="editNomeItem" id="editNomeItem" class="input-modal" placeholder="Ítem:">
                            </div>



                        </div>
                    </form>

                    <div class="alinhar-excluir-buff">
                        <button class="btn" type="submit" form="edit-item-buffet"> Alterar </button>
                        <button class="btn" id="closeUpdateItem"> Voltar</button>
                    </div>



                </div>
            </div>
            <!-- ==================| ==================== | ================== -->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

            <script src="../../js/modal-item-buffet.js"></script>
            <script src="../dashboard/assets/js/main.js"></script>


</body>

</html>