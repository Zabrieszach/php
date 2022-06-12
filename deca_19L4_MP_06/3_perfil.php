<?php

require_once "connections/connection.php";

session_start();

// Verificação
if (!isset($_SESSION['login'])){
    header("Location: 5_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <?php include_once "./helpers/help_meta.php"; ?>

    <title>IMDBooks</title>

    <!-- Css -->
    <?php include_once "./helpers/help_css.php"; ?>

</head>

<body>

<!-- Page Navigation -->
<?php include_once "./components/cp_navigation.php"; ?>


<!-- Page Header -->
<?php include_once "./components/cp_header_perfil.php"; ?>

<!-- Main Content -->
<?php include_once "./components/cp_perfil_content.php"; ?>


<!-- Footer -->
<?php include_once "./components/cp_footer.php"; ?>


<!-- Js -->
<?php include_once "./helpers/help_js.php"; ?>

</body>

</html>
