<?php

//iniciar a sessão para poder pegar a variável no final
session_start();

require_once "../connections/connection.php";

if (isset($_POST["btn-cadastrar"])) {                       //verificar se existe na variável POST o indice btn-cadastrar

    if ($_POST["pass"] == $_POST["passconfirm"]) {           //verificar se a senha foi digitada corretamente

        // antes de passar o indice da btn-cadastrar é preciso filtrar a informação antes
        $nome = $_POST["username"];
        $login = $_POST["login"];
        $password_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);

        $link = newDBConection(); // Create a new DB connection

        $stmt = mysqli_stmt_init($link);

        //agora precisamos inserir essas dados no banco de dados

        $query = "INSERT INTO leitores (nome,email,password_hash) VALUE (?,?,?)";               //estou inserindo na base de dados as informações novas que eu gerei

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'sss', $nome, $login, $password_hash);

            // Devemos validar também o resultado do execute!
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($link);

                //Acção de sucesso
                $_SESSION["mensagem"] = "Cadastrado com Sucesso!";
                header("Location: ../1_registo.php");

            } else {
                //Acção de erro
                echo "Error:" . mysqli_stmt_error($stmt);
                header("Location: ../1_registo.php");
            }
        } else {
            // Acção de erro
            echo "Error:" . mysqli_error($link);
            mysqli_close($link);
        }
    } else {
        $_SESSION["mensagem"] = "As senhas estão diferentes!";
        header("Location: ../1_registo.php");
    }

}

?>


