<?php
  require '../Conexion/Connection.php';

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $correos = $_POST['correos'];
    $mensaje = $_POST['mensaje'];

    $query = 'UPDATE notificacion JOIN correos ON notificacion.id_correos = correos.id_correos 
    SET correos.correo = "' . $correos . '", notificacion.mensaje = "' . $mensaje . '"
    WHERE notificacion.id_notificacion = ' . $id . ';';

    if($conn->query($query)){
      return "Datos actualizados";
    }
  }
 ?>