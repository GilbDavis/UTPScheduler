<?php
  //Se inicia la sesion
  session_start();
  //Se importa la conexion a la base de datos
  require '../Conexion/Connection.php';

  //Creacion de variables
  $correos = '';
  $fecha = '';
  $asunto = '';
  $mensaje = '';
  $repetir = '';
  //Si el boton enviar es cliqueado
  if (isset($_POST['enviar'])) {
      $correo = filter_input(INPUT_POST, 'correos');
      $fecha = filter_input(INPUT_POST, 'fecha');
      $asunto  = filter_input(INPUT_POST, 'asunto_personalizado');
      $mensaje = filter_input(INPUT_POST, 'mensaje');
      $repetir = filter_input(INPUT_POST, 'Repetir');
      //Elimina la ultima coma y espacio de los correos seleccionados
      $correosubs = substr($correo, 0, -2);
      //Si el usuario quiere que se repita la alarma entra en esta condicion (Si el checkbox esta habilitado)
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
              //Esta consulta ingresa los correos a enviar el recordatorio en la base de datos
              $sql1 = 'INSERT INTO correos(correo) VALUES ("' . $correosubs . '");';
              $db1 = $conn->query($sql1);
              $idcorreos = $conn->insert_id; //Obtiene el ultimo id insertado
              //Convierte el formato de la hora a 24 horas para facilitar el envio del correo al sistema
              $conversion_24horas  = date("Y-m-d H:i", strtotime($fecha));
              //Esta consulta inserta las fechas en que se enviara el recordatorio
              $sql2 = 'INSERT INTO fechas(fecha_principal, fecha_repeticion, fecha_anterior) '
                    . 'VALUES ("' . $conversion_24horas . '", "' . $fecha_repeticion . '", "' .
                    $fecha_anterior . '");';
              $db2 = $conn->query($sql2);
              $idfechas = $conn->insert_id; //Obtiene el ultimo id insertado
              //Inserta el nuevo asunto a la BD
              $sql3 = 'INSERT INTO asunto(asunto) VALUES ("' . $asunto . '");';
              $db3 = $conn->query($sql3);
              $id_asunto = $conn->insert_id;
              //Inserta el mensaje junto con el id de fecha y correos creados
              $sql4 = 'INSERT INTO notificacion(id_usuario, id_asunto, id_fechas,'
                    . ' id_estado, id_correos, mensaje) VALUES (' . $_SESSION['user_id'] .
                    ', ' . $id_asunto . ', ' . $idfechas . ', 1, ' . $idcorreos . ', "' . $mensaje . '");';
              $db4 = $conn->query($sql4);
              //Si llega a la consulta 3 y este se ejecuta exitosamente se envia una alerta al navegador
              //Indicando que el recordatorio se guardo exitosamente!
              if ($db4) {
                  echo '<script language="javascript">';
                  echo 'alert("Guardado con exito!");';
                  echo '</script>';
              }
          } catch (Exception $ex) {
              echo $ex->getMessage();
          }
          //Esta seccion es igual que la misma con la diferencia en que esta ocurre si el checkbox no esta habilitado
          //Osea que el usuario no desea que la alarma se repita
      } else {
          try {
              $sql1 = 'INSERT INTO correos(correo) VALUES ("' . $correo . '");';
              $db1 = $conn->query($sql1);
              $idcorreos = $conn->insert_id;
              //Convierte el formato de la hora a 24 horas para facilitar el envio del correo al sistema
              $conversion_24horas  = date("Y-m-d H:i", strtotime($fecha));
              $sql2 = 'INSERT INTO fechas(fecha_principal) '
                    . 'VALUES ("' . $conversion_24horas . '");';
              $db2 = $conn->query($sql2);
              $idfechas = $conn->insert_id;

              //Inserta el nuevo asunto a la BD
              $sql3 = 'INSERT INTO asunto(asunto) VALUES ("' . $asunto . '");';
              $db3 = $conn->query($sql3);
              $id_asunto = $conn->insert_id;

              $sql4 = 'INSERT INTO notificacion(id_usuario, id_asunto, id_fechas,'
                    . ' id_estado, id_correos, mensaje) VALUES (' . $_SESSION['user_id'] .
                    ', ' . $id_asunto . ', ' . $idfechas . ', 1, ' . $idcorreos . ', "' . $mensaje . '");';
              $db4 = $conn->query($sql4);

              if ($db4) {
                  echo '<script language="javascript">';
                  echo 'alert("Guardado con exito!");';
                  echo '</script>';
              }
          } catch (Exception $ex) {
              echo $ex->getMessage();
          }
      }
  }
