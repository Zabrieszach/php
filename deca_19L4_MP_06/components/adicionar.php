<?php

session_start();

if (isset($_POST["comentario"]) && ($_POST["comentario"] != "")) {
    $comentario = $_POST["comentario"];
    $idlivro = $_SESSION["idlivro"];
    $id_leitor = $_SESSION["idleitor"];
    // We need the function!
    require_once("./connections/connection.php"); // We need the function!

    // Create a new DB connection
    $link = newDBConection(); // Create a new DB connection

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO comentario (idcomentarios, texto_comentario, ref_id_livro, ref_id_leitores) VALUES (NULL, $comentario, $id_leitor , $idlivro);";

    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "s", $nome_cidade);
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
header("Location: cidades_list.php");