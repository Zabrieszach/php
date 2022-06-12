<?php
session_start();
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
<?php include_once "./components/cp_header_login.php"; ?>

<!-- Main Content -->
<?php include_once "./components/cp_login_user.php"; ?>


<!-- Footer -->
<?php include_once "./components/cp_footer.php"; ?>


<!-- Js -->
<?php include_once "./helpers/help_js.php"; ?>

</body>

</html>
