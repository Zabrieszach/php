<?php

function newDBConection()  //criando essa função eu preciso apenas colocar o require_once "connection.php" em todas as páginas que eu precisar
{
    /*
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "deca_19L4_MP_06";
    * Login: deca_19L4_MP_06
    Pass: SI7nkYAK
    * o:st_na
*/
    $hostname = "labmm.clients.ua.pt";
    $username = "deca_19L4_MP_06_web";
    $password = "wQha40X2";
    $dbname = "deca_19L4_MP_06";

    //aqui é o momento em que a ligação é feita
    $local_link = mysqli_connect(
        $hostname,                         //servidor em que eu quero me conectar
        $username,                              //ulitizador que vai aceder a base de dados
        $password,                                  // a senha
        $dbname            //o nome da base de dados que está nesse servidor
    );

    //se a ligação falhar ela morre e mostra os erros, se não houver erros não mostra nada
    if (!$local_link) {
        die("Falha na Conexão:" . mysqli_connect_error());
    }

    //define o charset para caracteres especiais
    mysqli_set_charset($local_link, "utf8");

    //retorna o valor da função para o link de ligação indicado lá em cima
    return $local_link;
}

?>



