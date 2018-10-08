<?php session_start() ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'LEMS - ' . $_SESSION['user_nom'] . ' ' . $_SESSION['user_ape']; ?></title>
    </head>
    <body>
        
        <?php require '../Header_Footer/Header.php'; ?>
    </body>
</html>
