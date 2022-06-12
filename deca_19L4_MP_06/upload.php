<?php

include_once "connections/connection.php";

$msg = false;

if (isset($_FILES["arquivo"])) {

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));  //pega a extensão do arquivo
    $novo_nome = $_FILES . $extensao; //define o nome do arquivo
    $diretorio = "img/upload/"; //define o diretorio para onde enviaremos o arquivo


    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); //efetua o upload
    $link = newDBConection(); // Create a new DB connection
    $stmt = mysqli_state_init($link);

    $query = "INSERT INTO arquivo (codigo, arquivo) VALUES (null ,'$novo_nome')";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, "si", $novo_nome);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);
            header("Location:0_insert.php");

        }

    }
}
?>
<h1>Upload de PHP</h1>
<?php if ($msg != false) {
    echo "<p> $msg </p>";
} ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Arquivo <input type="file" required name="arquivo">
    Botão de Envio <input type="submit" value="Salvar">
</form>
