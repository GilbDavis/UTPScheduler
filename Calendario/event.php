<?php
  include_once("../Conexion/Connection.php");

  $sqlEvents = 'SELECT notificacion.id_notificacion as idnotificacion,
   asunto.asunto as asunto, fechas.fecha_principal as fecha, fechas.fecha_anterior as fecha_ant FROM notificacion
    JOIN asunto ON notificacion.id_asunto = asunto.id_asunto
    JOIN fechas ON notificacion.id_fechas = fechas.id_fechas LIMIT 20';
  $result = $conn->query($sqlEvents);
  $calendar = array();
  $date = date('Y-m-d H:i:s');

  while ($rows = $result->fetch_assoc()) {
      if(empty($rows['fecha_ant'])){
          // convert date to milliseconds
          $start = strtotime($rows['fecha']) * 1000;
          $end = strtotime($rows['fecha']) * 1000;
          $calendar[] = array(
            'id' =>$rows['idnotificacion'],
            'title' => utf8_encode($rows['asunto']),
            'url' => "#",
            "class" => 'event-important',
            'start' => "$start",
            'end' => "$end"
          );
      }else{
          // convert date to milliseconds
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
  $calendarData = array(
  "success" => 1,
  "result"=>$calendar);
  echo json_encode($calendarData);
?>
