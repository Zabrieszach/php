<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto"></div>
        <div class="col-lg-12 col-12 pb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="text-center mb-4">Navegue pela Biblioteca</h3>
                    <table class="table-striped">
                        <thead>
                        <tr>
                            <th>Cód. Livro</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Categoria</th>
                            <th>Lançamento</th>
                            <th>Edição</th>
                            <th>Local</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // We need the function!
                        require_once("./connections/connection.php"); // We need the function!

                        // Create a new DB connection
                        $link = newDBConection(); // Create a new DB connection

                        /* create a prepared statement */
                        $stmt = mysqli_stmt_init($link);

                        $query = "SELECT livros2.idlivro, livros2.titulo,livros2.data_lancamento, livros2.data_edicao, autores.nome, editora.nome, categoria.nome, ambiente.nome
                                  FROM livros2
                                  INNER JOIN autores ON livros2.autor_id = autores.idautores
                                  INNER JOIN editora ON livros2.editora_id = editora.ideditora
                                  INNER JOIN categoria ON livros2.categoria_id = categoria.idcategoria
                                  INNER JOIN ambiente ON livros2.ambiente_id = ambiente.idambiente
                               ";                           //vou até a base de dados e seleciono todos os dados que estiverem dentro da tabela usuários

                        if (mysqli_stmt_prepare($stmt, $query)) {
                            /* execute the prepared statement */
                            if (mysqli_stmt_execute($stmt)) {
                                /* bind result variables */
                                mysqli_stmt_bind_result($stmt, $idlivro, $titulo, $data_lancamento, $data_edicao, $autor, $editora, $categoria, $ambiente);
                                /* fetch values */
                                while (mysqli_stmt_fetch($stmt)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $idlivro; ?></td>
                                        <td><?php echo $titulo; ?></td>
                                        <td><?php echo $autor; ?></td>
                                        <td><?php echo $editora; ?></td>
                                        <td><?php echo $categoria; ?></td>
                                        <td><?php echo $data_lancamento; ?></td>
                                        <td><?php echo $data_edicao; ?></td>
                                        <td><?php echo $ambiente; ?></td>
                                        <td>
                                            <a href="../components/editar_comentario.php?id=<?php echo $idlivro ?>"
                                               class="btn">
                                                Editar
                                            </a>
                                        </td>
                                        <td>
                                            <form action="../components/delete_comentario.php" method="post">
                                                <input type="hidden" name="id"
                                                       value="<?php echo $idlivro; ?>">
                                                <button type="submit" name="btn-deletar" class="btn ">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // Acção de erro
                                echo "Error:" . mysqli_stmt_error($stmt);
                            }
                            /* close statement */
                            mysqli_stmt_close($stmt);
                        } else {
                            echo("Error description: " . mysqli_error($link));
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>