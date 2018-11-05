<?php
  session_start();
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
          try {
              //Este pedazo de codigo le resta 1 dia a la fecha insertada
              $fecha_anterior = new DateTime($fecha);
              $intervalo = new DateInterval('P1D');
              $fecha_anterior->sub($intervalo);
              $fecha_anterior = $fecha_anterior->format('Y-m-d H:i');
              //Cambia la hora de la fecha al predeterminado por el laboratorio que es
              //a las 8:00 AM
              $fecha_repeticion = new DateTime($fecha);
              $fecha_repeticion->setTime(8, 00, 00);
              $fecha_repeticion = $fecha_repeticion->format('Y-m-d H:i');

              $sql1 = 'INSERT INTO correos(correo) VALUES ("' . $correo . '");';
              $db1 = $conn->query($sql1);
              $idcorreos = $conn->insert_id;

              $sql2 = 'INSERT INTO fechas(fecha_principal, fecha_repeticion, fecha_anterior) '
                    . 'VALUES ("' . $fecha . '", "' . $fecha_repeticion . '", "' .
                    $fecha_anterior . '");';
              $db2 = $conn->query($sql2);
              $idfechas = $conn->insert_id;

              $sql3 = 'INSERT INTO notificacion(id_usuario, id_asunto, id_fechas,'
                    . ' id_estado, id_correos, mensaje) VALUES (' . $_SESSION['user_id'] .
                    ', ' . $asunto . ', ' . $idfechas . ', 1, ' . $idcorreos . ', "' . $mensaje . '");';
              $db3 = $conn->query($sql3);

              if ($db3) {
                  echo '<script language="javascript">';
                  echo 'alert("Guardado con exito!");';
                  echo '</script>';
              }
          } catch (Exception $ex) {
              echo $ex->getMessage();
          }
      } else {
          try {
              $sql1 = 'INSERT INTO correos(correo) VALUES ("' . $correo . '");';
              $db1 = $conn->query($sql1);
              $idcorreos = $conn->insert_id;

              $sql2 = 'INSERT INTO fechas(fecha_principal) '
                    . 'VALUES ("' . $fecha . '");';
              $db2 = $conn->query($sql2);
              $idfechas = $conn->insert_id;

              $sql3 = 'INSERT INTO notificacion(id_usuario, id_asunto, id_fechas,'
                    . ' id_estado, id_correos, mensaje) VALUES (' . $_SESSION['user_id'] .
                    ', ' . $asunto . ', ' . $idfechas . ', 1, ' . $idcorreos . ', "' . $mensaje . '");';
              $db3 = $conn->query($sql3);

              if ($db3) {
                  echo '<script language="javascript">';
                  echo 'alert("Guardado con exito!");';
                  echo '</script>';
              }
          } catch (Exception $ex) {
              echo $ex->getMessage();
          }
      }
  }
