<?php

//iniciar a sessão
session_start();

require_once "../connections/connection.php";
$link = newDBConection(); // Create a new DB connection


if (isset($_POST["btn-deletar"])) {

    $id = mysqli_escape_string($link, $_POST["id"]);

    //agora precisamos inserir essas dados no banco de dados

    $sql = "DELETE FROM leitores WHERE idleitores = '$id'";  //estou inserindo na base de dados as informações novas que eu gerei

    if (mysqli_query($link, $sql)) {
        $_SESSION["mensagem"] = "Detelado com Sucesso!";
        header("Location: ../1_registo.php");
    } else {
        $_SESSION["mensagem"] = "Erro ao deletar!";
        header("Location: ../1_registo.php");
    }
}

?>

