<?php

//iniciar a sessão
session_start();

if (isset($_POST["btn-editar"])) {

if (isset($_POST["nome"]) && ($_POST["nome"] != "") && (isset($_SESSION["idlivro"]))){
    $nome_livro = $_POST["nome"];
    $idlivro = $_SESSION["idlivro"];

    // We need the function!
    require_once "../connections/connection.php";

    // Create a new DB connection
    $link = newDBConection(); // Create a new DB connection

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE livros2
              SET nome = ?
              WHERE idlivro = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "si", $nome_livro, $idlivro);
        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    /* close connection */
    mysqli_close($link);

}
    header("Location: ../2_colecao.php");
}

?>


