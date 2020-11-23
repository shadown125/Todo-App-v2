<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:title" content="Todo App" >
    <meta property="og:type" content="website" >
    <meta property="og:description" content="This App gonna be your best friend in evey day journey" >
    <meta property="og:locale" content="pl_PL" >
    <meta property="og:locale:alternate" content="en_GB" >

    <title>Todo App</title>

    <link rel="stylesheet" href="./build/main.css">

    <script src="./build/runtime.js" defer></script>
    <script src="./build/vendor.js" defer></script>
    <script src="./build/main.js" defer></script>
</head>
<body>
<?php require_once('templates/includes/header.php'); ?>
<main class="page-body">
    <div class="wrapper">
        <div class="container">
            <?php require_once("templates/includes/main-navigation-sidebar.php"); ?>
            <div class="content-container">
                <?php require_once("templates/pages/$page.php")?>
            </div>
        </div>
    </div>
</main>
<footer class="page-footer">
    <div class="wrapper">
        <div class="container">

        </div>
    </div>
</footer>
</body>
</html>
