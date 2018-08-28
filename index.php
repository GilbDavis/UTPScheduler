<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>UTP - Schedule</title>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="JS/GetEmails.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/Index.css"/>
    </head>
    <body>
        
        <h1>Bienvenido al sistema de Notificacion de la UTP - Centro Regional de Bocas del Toro</h1><br>
        
        <div id="Formulario">
            <form method="post" action="DB/EmailSender.php">
            <label for="Para">Para: </label><br>
            <input id="correos" type="text" name="correos" placeholder="example@server.com"/><br>
            <?php include 'DB/Selector.php'; ?>
            <label for="Asunto">Asunto: </label><br>
            <input name="asunto" type="text" placeholder="Asunto"/><br>
            <textarea name="mensaje" id="mensaje" rows="4" cols="50" placeholder="Escriba su mensaje..."></textarea><br>
            <input type="submit" name="enviar" value="Enviar"/> 
        </form>
        </div>
        
    </body>
</html>
