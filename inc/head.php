<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <a href="index.php">Home</a>
        <!-- Logged in view -->
        <?php if (isset($_SESSION['logged_on'])) { ?>
            <a href="inc/logout.php">Logout</a>
        <!-- Not logged in view -->
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </header>
    <main>