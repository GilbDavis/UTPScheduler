<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>LEMS - Menú Administrador</title>
        <link type="text/css" rel="stylesheet" href="../Css/Menu.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <style>
            header, body{
                font-family: 'Lato';
            }
        </style>
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
       
        <section class="recordatorio">
            <a href='#'>Crear recordatorio</a>
        </section>

        <section class="recordatorio2">
            <a href="*">Mi Agenda</a>
        </section>

       <!-- <footer class="foot"><center>
            <a href="https://www.instagram.com/davis_0297/" target="_blank"><img src="../Imagenes/instagram-logo.png" alt="Instagram"/></a>
            <a href="https://www.facebook.com" target="_blank"><img src="../Imagenes/facebook-logo-button.png" alt="Facebook"/></a>
            <a href="https://api.whatsapp.com/send?phone=50763737013" target="_blank"><img src="../Imagenes/whatsapp.png" alt="Whatsapp"/></a>
            <a href="https://www.linkedin.com/in/gilbertodavis/" target="_blank"><img src="../Imagenes/linkedin.png" alt="Linkedin"/></a>
            <center></footer> -->
            
    </body>
</html>
