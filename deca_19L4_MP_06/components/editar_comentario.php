<?php

if (isset($_GET["idlivro"])) {

    $id = $_GET["idlivro"];

    // We need the function!
    include_once "../connections/connection.php";
    // Create a new DB connection
    $link = newDBConection(); // Create a new DB connection
    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "SELECT idlivro. titulo, autor_id, data_lancamento, data_edicao,categoria_id,editora_id,ambiente_id 
              FROM livros2
              WHERE idlivro = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $idlivro, $titulo, $autor, $data_lancamento, $data_edicao, $categoria, $editora, $ambiente);

            /* fetch values */
            if (!mysqli_stmt_fetch($stmt)) {

                // Isto significa que não há resultado da query
                header("Location: ../2_colecao.php");
            }
            session_start();
            $_SESSION["idlivros"] = $id;
        } else {
            // Acção de erro
            echo "Error:" . mysqli_stmt_error($stmt);
        }
        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }

    /* close connection */
    mysqli_close($link);
} else {
    header("Location: ../0_index.php");
}

?>

<div class="container">
    <div class="row">
        <div class="col s12 mx-auto">
            <h3>Editar Livro</h3>
            <form action="../scripts/sc_livros_update.php" method="post">
                <input type="text" name="titulo" id="nome" value="<?php $titulo; ?>">
                <select name="autor_id">
                    <option value="<?php $autor; ?>"><?php $autor; ?></option>
                </select>
                <select name="autor_id">
                    <option value="<?php $autor; ?>"><?php $autor; ?></option>
                </select>
                <select name="autor_id">
                    <option value="<?php $autor; ?>"><?php $autor; ?></option>
                </select>
                <input type="text" name="data_lancamento" id="nome" value="<?php $data_lancamento; ?>">
                <input type="text" name="data_edicao" id="nome" value="<?php $data_edicao; ?>">
                <select name="autor_id">
                    <option value="<?php $autor; ?>"><?php $autor; ?></option>
                </select>

                <input type="hidden" name="id" value="<?php ['idlivro']; ?>">
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" value="<?php $nome; ?>">
                    <label for="nome"> Nome</label>
                </div>
                <button type="submit" name="btn-editar" class="btn ">Atualizar</button>
                <a href="../2_colecao.php" type="submit" class="btn ">Voltar para Biblioteca</a>

            </form>

        </div>
    </div>
</div>
