<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AGENDA LEMS - Menú Administrador</title>
        <link type="text/css" rel="stylesheet" href="../Css/Menu.css"/>
        <link rel="stylesheet" type="text/css" href="../Css/footer.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="../Imagenes/LOGO.png" type="image/x-icon"/>
        <style> header, body{font-family: 'Lato';}</style>
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>
        <br>
        <br>
        <br>
        <section class="recordatorio">
            <a href='../Email_Section/EPrincipal.php'>Crear recordatorio</a>
        </section>

        <section class="recordatorio">
            <a href="../Calendario/Calendario.php">Agenda</a>
        </section>

        <section class="recordatorio">
            <a href="../EditarAlarma/PaginaEdicion.php">Editar Recordatorio</a>
        </section>

        <section class="recordatorio">
            <a href="../SeccionAdmin/AgregarPersonal.php">Agregar Personal</a>
        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer class="foot"><center>
                <h4>GRUPO DE DESARROLLO DE SOFTWARE 2018: GILBERTO DAVIS, LEONARDO MONTERO,LINETH GUERRA Y CIRILO CASTRO.</h4>
        <center></footer>
    </body>
</html>
