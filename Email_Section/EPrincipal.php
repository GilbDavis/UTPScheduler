<?php
    //Se incluye este archivo para que cumpla la funcion de ingresar los datos a la base de datos
    include 'GuardarRecordatorio.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Enlaces requeridos para utilizar Css, bootstrap y JQUERY-->
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
        <!-- Se incluye el encabezado del sistema-->
        <?php require '../Header_Footer/Header.php'; ?>
        <!-- Inicio del formulario para la creacion del recordatorio -->
        <div id="Formulario">
            <form method="post" action="EPrincipal.php" autocomplete="off">
            <label for="Para">Para: </label><br>
            <input id="correos" type="text" name="correos" placeholder="example@server.com" readonly="readonly" required/><br>
            <?php include '../Email_Section/Selector.php'; ?>
            <!-- En esta seccion se utiliza el datetimepicker de Bootstrap para facilitar la eleccion
          de la fecha y hora del recordatorio -->
            <div class="form-group">
                  <label class="control-label">Hora de recordatorio</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' id="form-control" name="fecha" required/>
                    <span id="calendario" class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                   </div>
            </div>
            <!-- Enlaces de script para importar el DateTimePicker -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
            <!-- DateTimePicker.js contiene la configuracion del formato de fecha y hora -->
            <script type="text/javascript" src="../JS/DateTimePicker.js"></script>
            <!-- Se crea una caja de texto para ingresar un asunto personalizado -->
            <label>Asunto:</label>
            <input id="asunto_personal" name="asunto_personalizado" type="text" name="asuntorecordatorio"/>
            <script type="text/javascript" src="../JS/ObtenerAsunto.js"></script>
            <!-- Se importa el selector de asunto del sistema -->
            <?php include '../Email_Section/Asunto.php'; ?>
            <textarea name="mensaje" id="mensaje" rows="10" cols="50" placeholder="Escriba su mensaje..." required></textarea><br>
            <label class="container">
              <!-- Checkbox para decidir si quiere que la alarma se repita o no -->
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
