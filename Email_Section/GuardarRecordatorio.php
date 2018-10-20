<?php

  require '../Conexion/Connection.php';

  //Creacion de variables
  $correos = '';
  $fecha = '';
  $asunto = '';
  $mensaje = '';
  $repetir = '';

  if (isset($_POST['enviar'])) {
      $correo = filter_input(INPUT_POST, 'correos');
      $fecha = filter_input(INPUT_POST, 'fecha');
      $asunto  = filter_input(INPUT_POST, 'asunto');
      $mensaje = filter_input(INPUT_POST, 'mensaje');
      $repetir = filter_input(INPUT_POST, 'Repetir');

      if ($repetir) {
          //Este pedazo de codigo le resta 1 dia a la fecha insertada
        $fecha_anterior = new DateTime($fecha);
        $intervalo = new DateInterval('P1D');
        $fecha_anterior->sub($intervalo);
        $fecha_anterior = $fecha_anterior->format('Y-m-d H:i:s');
        //Cambia la hora de la fecha al predeterminado por el laboratorio que es 
        //a las 8:00 AM
        $fecha_repeticion = new DateTime($fecha);
        $fecha_repeticion->setTime(8, 00, 00);
        $fecha_repeticion = $fecha_repeticion->format('Y-m-d H:i:s');
        
        $sql = 'INSERT INTO correos(correo) VALUES ("' . $correo . '");';
        $sql .= 'INSERT INTO fechas(fecha_principal, fecha_repeticion, fecha_anterior) '
                . 'VALUES ("' . $fecha . '", "' . $fecha_repeticion . '", "' .
                $fecha_anterior . '");';
        $sql .= '';
        
        if($conn->multi_query($sql)){
            
        }
      }else{
          
      }
  }
