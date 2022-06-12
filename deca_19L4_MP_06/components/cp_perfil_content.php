

<div class="container">
    <div class="row">
        <h2 class="text-center col-lg-12 mx-auto"> Minhas Publicações </h2>
        <div class="col-lg-12 mx-auto">
            <br>
            <div class="post-preview">
                <h2 class="post-title">
                    Man must explore, and this is exploration at its greatest
                </h2>
                <h3 class="post-subtitle">
                    Problems look mighty small from 150 miles up
                </h3>
                <p class="post-meta">Posted by
                    <a href="03_perfil"><?php echo $_SESSION["username"]; ?>
                        em 24 de Setembro, 2019</p>
            </div>
            <hr>
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>

        </div>
    </div>
    <div class="row">
        <h2 class="text-center col-lg-12 mx-auto"> Meus Livros </h2>
        <?php
        // We need the function!
        require_once("./connections/connection.php"); // We need the function!

        // Create a new DB connection
        $link = newDBConection(); // Create a new DB connection

        /* create a prepared statement */
        $stmt = mysqli_stmt_init($link);

        $query = "SELECT livros2.capa,livros2.idlivro, livros2.titulo,livros2.sinopse, livros2.data_edicao, autores.nome, editora.nome, categoria.nome, ambiente.nome
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
                mysqli_stmt_bind_result($stmt,$capa, $idlivro, $titulo, $sinopse,$data_edicao, $autor, $editora, $categoria, $ambiente);

                /* fetch values */
                while (mysqli_stmt_fetch($stmt)) {
                    ?>
                    <div class="col-lg-3  mt-4">
                        <img style="width: 100%;" src='./img/capas/<?php echo $capa?>.jpg'>
                    </div>
                    <div class="col-lg-9">
                        <div class="card my-4">
                            <div class="card-body">
                                <h3 class="card-title text-center"><?php echo $titulo; ?>
                                </h3>
                                <span style="font-size: 3vh; font-weight: normal">
                                    Escrito por: <?php echo $autor; ?> | Edição de: <?php echo $data_edicao; ?>
                                </span>
                                <h5> Editora: <?php echo $editora; ?> | Categoria: <?php echo $categoria; ?> </h5>
                                <h5>Armazenado:<?php echo $ambiente; ?></h5>
                                <p class="card-text"><?php echo $sinopse; ?></P>
                                <div class="row">
                                    <a href="components/editar_livros.php?id=<?php echo $idlivro ?>"
                                       class="btn-warning btn col-lg-3" >
                                        Editar
                                    </a>
                                    <form class="col-lg-6" action="components/delete_usuarios.php" method="post">
                                        <input type="hidden" name="id"
                                               value="<?php echo $idlivro; ?>">
                                        <button type="submit" name="btn-deletar" class="btn-danger btn"
                                                >Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </div>
    <div>

    </div>

    <hr>