<?php 
    include 'GuardarRecordatorio.php'; 
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>AGENDA LEMS - Crear recordatorio</title>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../JS/GetEmails.js"></script>
        <link rel="stylesheet" type="text/css" href="../Css/notificacion.css"/>
        <link rel="stylesheet" type="text/css" href="../Css/footer.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="../Imagenes/LOGO.png" type="image/x-icon"/>
        <style> header, body{font-family: 'Lato';}</style>
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>

        <div id="Formulario">
            <form method="post" action="EPrincipal.php" autocomplete="off">
            <label for="Para">Para: </label><br>
            <input id="correos" type="text" name="correos" placeholder="example@server.com" readonly="readonly" required/><br>
            <?php include '../Email_Section/Selector.php'; ?>

            <div class="form-group">
                  <label class="control-label">Hora de recordatorio</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' id="form-control" name="fecha" required/>
                    <span id="calendario" class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                   </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
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
        <br>
        <br>
        <br>
        <br>
        <footer class="foot" style="margin-top: 40px;clear: both;position: relative;height: 40px;"><center>
                <h4>GRUPO DE DESARROLLO DE SOFTWARE 2018: GILBERTO DAVIS, LEONARDO MONTERO,LINETH GUERRA Y CIRILO CASTRO.</h4>
        <center></footer>
    </body>
</html>
