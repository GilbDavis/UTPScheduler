<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AGENDA LEMS - Calendario de Eventos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../Css/calendar.css">
        <link rel="stylesheet" href="../Css/footer.css">
        <script type="text/javascript" src="../JS/language/es-MX.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="../Imagenes/LOGO.png" type="image/x-icon"/>
        <style> header, body{font-family: 'Lato';}</style>
    </head>
    <body>
      <!--Se incluye el archivo del header-->
        <?php require '../Header_Footer/Header.php'; ?>
        <!--Todo esto contiene la seccion del calendario-->
        <div class="container">
          <div class="page-header">
            <div class="pull-right form-inline">
              <div class="btn-group">
                <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                <button class="btn btn-default" data-calendar-nav="today">Hoy</button>
                <button class="btn btn-primary" data-calendar-nav="next">Sig >></button>
              </div>
              <div class="btn-group">
                <button class="btn btn-warning" data-calendar-view="year">Año</button>
                <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                <button class="btn btn-warning" data-calendar-view="day">Dia</button>
              </div>
            </div>
            <h3></h3>
            <!--Titulo de bienvenida del calendario-->
            <small>Bienvenido al Calendario de eventos de la AGENDA LEMS</small>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div id="showEventCalendar"></div>
            </div>
            <div class="col-md-3">
              <h4>Lista de todos los eventos</h4>
              <ul id="eventlist" class="nav nav-list"></ul>
            </div>
          </div>
        </div>
        <!--Aqui se llaman los archivos necesarios para ejecutar el Bootstrap Calendar y los archivos con su respectivo codigo-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script type="text/javascript" src="../JS/calendar.js"></script>
        <script type="text/javascript" src="../JS/events.js"></script>
        <br>
        <br>
        <br>
        <footer class="foot" style="margin-top: 40px;clear: both;position: relative;height: 40px;"><center>
                <h4>GRUPO DE DESARROLLO DE SOFTWARE 2018: GILBERTO DAVIS, LEONARDO MONTERO,LINETH GUERRA Y CIRILO CASTRO.</h4>
        <center></footer>
    </body>
</html>
