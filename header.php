<?php
require_once 'core/init.php';

?> 
<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/gallery.css">



</head>

<body>

    <header>
        <a href="index.html" class="header-brand">mmtuts</a>
        <!-- NAVIGATION -->
        <nav>
            <ul>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="about.html">About me</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <a href="cases.html" class="header-cases">Cases</a>
        </nav>

        <!-- LOGIN SYSTEM FOR HEADER-->
        <div class="header-login">
            <?php
            // セッションがあるならログインｂーあーを表示させない
        //     if (isset($_SESSION['userId'])) {
        //         echo ' <form action="includes/logout.inc.php" method="post">
        //     <button type="submit" name="logout-submit">Logout</button>
        // </form>';
        //     } else {
        //         echo ' <form action="includes/login.inc.php" method="post">
        //     <input type="text" name="mailuid" placeholder="Username/E-mail">
        //     <input type="password" name="pwd" placeholder="Password">
        //     <button type="submit" name="login-submit">Login</button>
        //     </form>
        //     <a href="signup.php">Signup</a>';
        //     }
            ?>
        </div>
    </header>