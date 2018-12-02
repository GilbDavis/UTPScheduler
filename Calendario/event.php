<?php
  include_once("../Conexion/Connection.php");
  //La variable sqlEvents guarda la sentencia que sera consultada a la base de datos
  $sqlEvents = 'SELECT notificacion.id_notificacion as idnotificacion,
   asunto.asunto as asunto, fechas.fecha_principal as fecha, fechas.fecha_anterior as fecha_ant FROM notificacion
    JOIN asunto ON notificacion.id_asunto = asunto.id_asunto
    JOIN fechas ON notificacion.id_fechas = fechas.id_fechas LIMIT 20';
    //La variables $result guarda los datos consultados
  $result = $conn->query($sqlEvents);
  //Esta variable sera utilizada para guardar los datos que se consultaron para posteriormente enviarlos por JSON
  $calendar = array();
  $date = date('Y-m-d H:i:s');
  //Mientras que haya datos en la variable $rows no se detendra el ciclo
  while ($rows = $result->fetch_assoc()) {
      if(empty($rows['fecha_ant'])){
          // La funcion de baja transforma la fecha en milisegundos
          //Esta variable contiene la fecha principal y representa el inicio de la notificación
          //P.D: Esta seccion representa lo que ocurre cuando la alarma no se repite (vease archivo GuardarRecordatorio.php)
          $start = strtotime($rows['fecha']) * 1000;
          //Esta variable guarda la fecha final de la notificación
          $end = strtotime($rows['fecha']) * 1000;
          //Arreglo que guardara los datos obtenidos
          $calendar[] = array(
            'id' =>$rows['idnotificacion'],
            'title' => utf8_encode($rows['asunto']),
            'url' => "#",
            "class" => 'event-important',
            'start' => "$start",
            'end' => "$end"
          );
      }else{
          //El mismo procedimiento anterior pero esta seccion es para las notificaciones que sí se repiten
          $start = strtotime($rows['fecha_ant']) * 1000;
          $end = strtotime($rows['fecha']) * 1000;
          $calendar[] = array(
            'id' =>$rows['idnotificacion'],
            'title' => utf8_encode($rows['asunto']),
            'url' => "#",
            "class" => 'event-important',
            'start' => "$start",
            'end' => "$end"
          );
      }
  }
  //CalendarData guarda todos los datos del arreglo $calendar y los envia a event.js por medio de JSON
  $calendarData = array(
  "success" => 1,
  "result"=>$calendar);
  echo json_encode($calendarData);
?>
