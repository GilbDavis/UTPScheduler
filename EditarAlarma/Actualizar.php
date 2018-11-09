<?php
  require '../Conexion/Connection.php';

  if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];
    $correos = $_POST['correos'];
    $mensaje = $_POST['mensaje'];
    $fechas = $_POST['fecha'];

    $query = 'UPDATE notificacion JOIN correos ON notificacion.id_correos = correos.id_correos 
    JOIN fechas ON notificacion.id_fechas = fechas.id_fechas
    SET correos.correo = "' . $correos . '", notificacion.mensaje = "' . $mensaje . '", fechas.fecha_principal = "' . $fechas .'" WHERE notificacion.id_notificacion = ' . $id . ';';

    if($conn->query($query)){
      return "Datos actualizados";
    }
  }
  $conn->close();
 ?>