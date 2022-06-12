<?php

//Encerrando a Sessão
session_start(); //inicia a sessão
session_unset();  // limpa a sessão
session_destroy(); //fecha a sessão
header("Location: ../0_index.php");

?>
