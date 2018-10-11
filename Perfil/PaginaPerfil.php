<?php session_start() ?>
<!DOCTYPE html>
<!-- Este documento contiene el header principal que se utiliza en todo el proyecto
junto con su Css -->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'LEMS - ' . $_SESSION['user_nom'] . ' ' . $_SESSION['user_ape']; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <style> header, body, footer{font-family: 'Lato';}</style>
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>

    </body>
</html>
