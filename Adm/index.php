<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="../view/images/balão.png" type="image/x-icon">
      <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Área Administrativa</title>
</head>

<body>
    <main>
        <header id="header">
            <div class="overlay overlay-lg">
            </div>
            <nav>


                <div class="container">
                    <div class="logo">
                        <!-- <img src="./img/logo.png" alt="" require /> -->
                        <a href="#" class="logo"><img src="../view/images/partyCompleta.png" loading="lazy" title="Sua festa dos sonhos"></a>
                    </div>


                    <div class="icons">
                        <a href="../index.php" class="fa-solid fa-right-from-bracket" title="Sair"></a>
                    </div>
                    

                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                
                </div>
            </nav>
        </header>


        <div class="container-1">
            <section class="login-in">
                    <br>
                <form action="./valida-login.php" class="sign-in-form">
                    <h3 class="title1" data-title="Your Party"></h3>
                    <h2 class="title">Login - Administrador</h2> <br>
                    <div class="input-field">
                       
                        <input type="text" placeholder="Login" name="txLogin" />
                    </div>
                    <div class="input-field">
                       
                        <input type="password" placeholder="Password" name="txSenha" />
                    </div>
                    <Button type="submit">Log-in</Button>
            </section>
        </div>



</body>

</html>