<?php


// ************************************** DOCUMENTO CONECTADO A ANTIGA PÁGINA DE LOGIN *************************************** //


//Iniciando a Sessão
session_start();

require_once "../connections/connection.php";                             //Conexão com a BD


if (isset($_POST["login"]) && isset($_POST["pass"])) {               //"se existe uma super global POST com o campo "username" preenchido, eu quero que a $name fique com esse valor

    $link = newDBConection(); // Create a new DB connection

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT password_hash, nome FROM leitores WHERE email LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 's', $login);
        //associar o valor do post a variável
        $login = $_POST["login"];
        $pass = $_POST["pass"];

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $password_hash, $nome);

            if (mysqli_stmt_fetch($stmt)) {

                if (password_verify($pass, $password_hash)) {

                    // Guardar sessão de utilizador
                    session_start();
                    $_SESSION["username"] = $nome;
                    $_SESSION["login"] = $login;

                    // Feedback de sucesso
                    header("Location: ../0_index.php");
                } else {
                    // Password está errada
                    echo "Usuário e senha não conferem";
                    echo "<a href='../5_login.php'>Try again</a>";

                }
            } else {
                // O usuário não existe
                echo "Não existem dados cadastrados!";
                echo "<a href='../5_login.php'>Try again</a>";
            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        } else {
            // Acção de erro
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro
        echo "Error:" . mysqli_error($link);
        mysqli_close($link);
    }

}

?>