<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>LEMS - Crear recordatorio</title>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../JS/GetEmails.js"></script>
        <link rel="stylesheet" type="text/css" href="../Css/notificacion.css"/>
    </head>
    <body>
        
        <?php require '../Header_Footer/Header.php'; ?>
        
        <div id="Formulario">
            <form method="post" action="DB/EmailSender.php">
            <label for="Para">Para: </label><br>
            <input id="correos" type="text" name="correos" placeholder="example@server.com"/><br>
            <?php include '../Email_Section/Selector.php'; ?>
            <?php include '../Email_Section/Asunto.php'; ?>
            <textarea name="mensaje" id="mensaje" rows="10" cols="50" placeholder="Escriba su mensaje..."></textarea><br>
            <label class="container">
                <input type="checkbox" checked="checked" name="Repetir">
                <span class="checkmark"></span>
                ¿Desea que este recordatorio se repita?
            </label>
            <input type="submit" name="enviar" value="Enviar"/> 
        </form>
        </div>
        
    </body>
</html>
