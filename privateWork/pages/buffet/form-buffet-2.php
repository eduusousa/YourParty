<?php
include_once '/xampp/htdocs/yourParty/privateWork/pages/validar-login.php';

require_once '/xampp/htdocs/yourParty/Classes/Conexao.php';
require_once '/xampp/htdocs/yourParty/Classes/Buffet.php';

if (isset($_SESSION['idEmpresa'])) {

    $id = $_SESSION['idEmpresa'];
}

$buffet = new Buffet();
$list = $buffet->listar($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Your Party - Buffet</title>
    <!-- ======= Styles ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="../dashboard/assets/css/style-buffet.css">
    <link rel="stylesheet" href="../dashboard/assets/css/style-modal.css">

    <!-- <link rel="stylesheet" href="../../../view/css/stylepainel.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="../dashboard/assets/img/balão.png" type="image/x-icon">
</head>

<body>

    <main>
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
                    <a href="./form-item-buffet-2.php">
                        <span class="icon">
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                        </span>
                        <span class="title-1">Ítem De Buffet</span>
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



        <div class="main">

            <br>
           

            <div class="container-from">
                <div class="contact-form">

                    <form id="insert-form-buffet" action="" autocomplete="off" enctype="multipart/form-data">

                        <div class="column-1">
                            <h3 class="header-title"> Cadastre um buffet </h3>
                        </div>

                        <div class="input-container">
                            <input type="text" name="nomeBuffet" class="input" placeholder="Nome Do Buffet" require />
                        </div>

                        <div class="input-container textarea">
                            <textarea placeholder="Descrição Do Buffet:" name="descBuffet" class="input" require></textarea>
                        </div>

                        <div class="input-container">
                            <input type="number" name="valorBuffet" class="input" placeholder="Valor do Buffet:" require />
                        </div>

                        <div class="input-container">
                            <input type="file" name="fotoBuffet" id="foto" class="input" placeholder="Foto Do Buffet" require />
                        </div>


                        <input type="reset" value="Limpar" class="btn">

                        <input type="submit" name="cadastrarBuffet" value="Enviar" class="btn" />
                    </form>
                </div>

            </div>

            <div class="table_responsive">
                <table>
                    <thead>
                        <tr>
                            <th> Código: </th>
                            <th> Foto: </th>
                            <th> Nome: </th>
                            <th> Descrição: </th>
                            <th> Valor: </th>
                            <th> ? </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) { ?>
                            <tr>
                                <td> <?php echo $row[0] ?> </td>
                                <td> <img src="../../<?php echo $row[4] ?>" alt="" data-id="<?php echo $row[0] ?>" data-image="<?php echo $row[4] ?>" onclick="updateImage(this)"> </td>
                                <td> <?php echo $row[1] ?> </td>
                                <td> <?php echo $row[2] ?> </td>
                                <td> <?php echo $row[3] ?> </td>
                                <td>
                                    <span class="action_btn">
                                        <button id="<?php echo $row[0] ?>" onclick="confirmDelete(this)" class="btn">Excluir</button>

                                        <button data-id="" onclick="listUpdateBuffet(<?php echo $row[0] ?>)" class="btn">Alterar</button>
                                    </span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


            <br>
            <br>
            
        </div>


        

    </main>

    <!-- ==================================| MODAL - DELETAR BUFFET | ================================== -->
    <div id="toggle-delete-buffet">
        <div class="modal-delete-buffet">

            <form action="" id="form-delete-buffet">
                <div class="column-1">
                    <h3 class="header-title1"> Excluir o <span> buffet</span>? </h3>
                </div>

                <input type="hidden" name="excIdBuffet" id="excIdBuffet">
            </form>

            <br>

            <div class="alinhar-excluir">
                <button type="submit" form="form-delete-buffet" class="btn">Excluir</button>
                <button id="closeDeleteBuffet" class="btn">Cancelar</button>
            </div>

        </div>
    </div>
    <!-- ==================================| =======================| ================================== -->


    <!-- ==================================| MODAL - ATUALIZAR BUFFET | ================================== -->
    <div id="toggle-update-buffet">
        <div class="modal-update-buffet">

            <div class="formulario">

                <form action="" id="edit-form-buffet">
                    <div class="column-1">
                        <h3 class="header-title"> Atualizar o <span> buffet</span>?</h3>
                    </div>

                    <div class="input-container">
                        <input type="hidden" name="editIdBuffet" id="editIdBuffet">
                        <input type="text" name="editNomeBuffet" id="editNomeBuffet" class="input-modal" placeholder="Nome:" required />
                    </div>

                    <div class="input-container">
                        <input type="text" name="editDescBuffet" id="editDescBuffet" class="input-modal" placeholder="Descrição:" required />
                    </div>

                    <div class="input-container">
                        <input type="number" name="editValorBuffet" id="editValorBuffet" placeholder="Valor:" class="input-modal" required />
                    </div>


                </form>

                <div class="alinhar">
                    <button type="submit" form="edit-form-buffet" class="btn">Atualizar</button>
                    <button id="closeUpdateBuffet" class="btn">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <!-- ==================================| =======================| ================================== -->


    <!-- ==================================| MODAL - ATULIZAR IMAGEM | ================================== -->
    <div id="toggle-image-update">
        <div class="modal-image-update">
<br>    
<br>
            <div class="column-1">
                <h3 class="header-title "> Alterar a <span> foto</span>?</h3>
            </div>
<br>
<br>
            <div id="image-atual"> </div>

            <form action="" id="edit-image-buffet" enctype="multipart/form-data">
                <input type="hidden" name="editIdImage" id="editIdImage">
                <input type="hidden" name="pathAtual" id="pathAtual">

                <div class="input-container-img">
                    <input type="file" name="editImage" id="editImage" class="input-modal-img">
                </div>


            </form>

            <div class="alinhar-img">
                <button type="submit" form="edit-image-buffet" class="btn">Atualizar</button>
                <button id="btnCloseImage" class="btn">Cancelar</button>
            </div>

        </div>

        <div id="aviso-toast" class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
        </div>
    </div>
    <!-- ==================================| =======================| ================================== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- https://youtu.be/rHC4_sJjNuQ -->


    <script src="../dashboard/assets/js/app.js"></script>
    <script src="../../js//modal-buffet.js"></script>

</body>

</html>