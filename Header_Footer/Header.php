<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }; 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../Css/Header.css"/>
    </head>
    <body>
        <header>
            <div class="wrapper">
                <img src='../Imagenes/logo-lems.jpeg' alt='Logo LEMS'/>
                <div class="logo">
                    <a href="../SeccionAdmin/AdminMenu.php">Agenda LEMS ©2018</a>
                </div>
                <nav>
                    <a href='#'><?php echo $_SESSION['user_nom'] . ' ' . $_SESSION['user_ape']; ?></a>
                    <a href="../Login/CerrarSesion.php">Cerrar Sesion</a>
                </nav>
            </div>
        </header>
    </body>
</html>
