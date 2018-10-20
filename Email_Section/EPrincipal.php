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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>

        <div id="Formulario">
            <form method="post" action="DB/EmailSender.php">
            <label for="Para">Para: </label><br>
            <input id="correos" type="text" name="correos" placeholder="example@server.com" required/><br>
            <?php include '../Email_Section/Selector.php'; ?>

            <div class="form-group">
                  <label class="control-label">Hora de recordatorio</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' id="form-control" required/>
                    <span id="calendario" class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                   </div>
            </div>

            <script type="text/javascript" src="../JS/DateTimePicker.js"></script>

            <?php include '../Email_Section/Asunto.php'; ?>
            <textarea name="mensaje" id="mensaje" rows="10" cols="50" placeholder="Escriba su mensaje..." required></textarea><br>
            <label class="container">
                <input type="checkbox" checked="checked" name="Repetir">
                <span class="checkmark"></span>
            ¿Desea que este recordatorio se repita?</label>
            <input id="formButton" type="submit" name="enviar" value="Guardar"/>
        </form>
        </div>

    </body>
</html>
