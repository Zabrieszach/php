<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="./0_index.php">Bem vindo <?php
            if (!isset($_SESSION["username"])){
                echo "Leitor";
            }else{
                echo $_SESSION["username"];
            }?>     </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link " href="./0_index.php">Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./1_registo.php">Registe-se!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./3_perfil.php"> Meu Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./4_post.php">Publicações!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./2_colecao.php">Coleção</a>
                <li class="nav-item">
                    <?php

                    if (!isset($_SESSION["login"])) {                                                //se não existir informação dentro do username na sessão
                        echo '<a class="nav-link js-scroll-trigger" href="./5_login.php">Entrar</a>';       //deve aparecer um link com uma ligação para se fazer login
                    } else {
                        echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" 
                        aria-haspopup="true" aria-expanded="false">' . $_SESSION['login'] . '</a>
               
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./scripts/sc_logout.php">Logout</a>
                        </div>';

                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>