<section class="container-fluid">
    <h1 class="text-center">Publicações</h1>
    <br>
    <?php

    require_once("./connections/connection.php"); // We need the function!

    $link = newDBConection(); // Create a new DB connection

    $stmt = mysqli_stmt_init($link); // create a prepared statement

    $query = "SELECT livros2.idlivro,livros2.titulo,livros2.capa,livros2.sinopse,livros2.review,livros2.data_edicao,livros2.data_lancamento, autores.nome, editora.nome,
                                  categoria.nome, ambiente.nome, livros_has_leitores.livros_idlivros, leitores.nome
                                  FROM livros2
                                  INNER JOIN autores ON livros2.autor_id = autores.idautores
                                  INNER JOIN editora ON livros2.editora_id = editora.ideditora
                                  INNER JOIN categoria ON livros2.categoria_id = categoria.idcategoria
                                  INNER JOIN ambiente ON livros2.ambiente_id = ambiente.idambiente
                                  INNER JOIN livros_has_leitores ON livros2.idlivro = livros_has_leitores.livros_idlivros
                                  INNER JOIN leitores ON livros_has_leitores.leitores_idleitores = leitores.idleitores
                               ;"; // Define the query

    if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
        mysqli_stmt_execute($stmt); // Execute the prepared statement

        mysqli_stmt_bind_result($stmt, $idlivro, $titulo, $capa, $sinopse, $review, $data_edicao, $data_lancamento, $autor, $editora, $categoria, $ambiente, $id_leitor, $nome_leitor); // Bind results

        while (mysqli_stmt_fetch($stmt)) { // Fetch values
            echo "
    <div class='container'>
        <div class='row'>
            <div class='col-lg-6 col-md-5 mx-auto'>
                <div class='col-lg-12 col-12 mx-auto'>
                    <h1> $titulo </h1>
                      <img class='card-img' src='./img/capas/$capa.jpg'>
                </div>
                <p> $ambiente </p>
            </div>
            <div class='col-lg-6 mx-auto'>
                <h2>Autor: $autor </h2>
                <h3> $categoria</h3>
                <h4> Data Edição: $data_edicao | Lançado em $data_lancamento</h4>
                <h5 class='section-heading'>Sinopse</h5>
                <p>$sinopse</p>
                <h2>Review</h2>
                <p>$review</p>
                <p> Postador por <a href='3_perfil'> $nome_leitor </a> em 24 de Setembro, 2019</p> 
                <a href=./components/adicionar_comentario.php class='btn'>
                    <input type='hidden' name='idlivro' value=$idlivro>
                    <input type='hidden' name='idleitor' value=$id_leitor>
                 Adicionar Comentário
                  </a>
            </div>
        </div>
    </div>
</article>";

        }
        mysqli_stmt_close($stmt); // Close statement
    }
    mysqli_close($link); // Close connection

    ?>

</section>