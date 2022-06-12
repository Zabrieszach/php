<?php

//iniciar sessão
session_start();

if (isset($_SESSION["mensagem"])) {         //verifico se a sessão existe
    echo $_SESSION["mensagem"];             //se existir, publico a mensagem
}

session_unset();                                 //limpo a sessão para a mensagem poder sair

//conexão
include_once "./connections/connection.php";
$link = newDBConection(); // Create a new DB connection


?>


<div class="container">
    <div class="row">
        <div class="col s12 mx-auto">
            <h2 class="text-center"> Tome a decisão e entre para esse universo infinito!</h2>
            <br>
            <h4>Registe-se</h4>

            <form class="form-horizontal" method="post" action="scripts/sc_user_register.php" >

                <!-- criei o formulário, com método POST e estou enviando a informação para a página login_control -->
                <div class="form-group">
                    <label for="username" class="col-lg-12 control-label"> Insira seu Nome </label>
                    <div class="com-sm-10">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group"> <!-- essa parte é para a senha -->
                    <label for="login" class="col-lg-12 control-label"> Insira seu Email</label>
                    <div>
                        <input type="text" class="form-control" name="login" id="login">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-lg-12 control-label"> Insira uma Senha </label>
                    <div>
                    <input type="password" class="form-control" name="pass" id="pass">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-lg-12 control-label"> Confirme a Senha </label>
                    <div>
                        <input type="password" class="form-control" name="passconfirm" id="passconfirm">
                    </div>
                </div>

                <button type="submit" name="btn-cadastrar" class="btn-dark">Cadastrar</button>

            </form>

        </div>
    </div>
</div>