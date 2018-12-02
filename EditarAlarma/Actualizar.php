<?php
  //Se importa la conexion a la base de datos
  require '../Conexion/Connection.php';
  //Condicion para verificar si recibio el dato id y que este no este vacio.
  if(isset($_POST['id']) && !empty($_POST['id'])){
    //Se inicializan las variables con su respectivo POST
    $id = $_POST['id'];
    $correos = $_POST['correos'];
    $mensaje = $_POST['mensaje'];
    $fechas = $_POST['fecha'];
    //La sentencia para actualizar, utilize inner join para facilitar el update y no tener que hacer multiples Querys
    $query = 'UPDATE notificacion JOIN correos ON notificacion.id_correos = correos.id_correos
    JOIN fechas ON notificacion.id_fechas = fechas.id_fechas
    SET correos.correo = "' . $correos . '", notificacion.mensaje = "' . $mensaje . '", fechas.fecha_principal = "' . $fechas .'" WHERE notificacion.id_notificacion = ' . $id . ';';

    if($conn->query($query)){
      //Este mensaje sera obtenido por el metodo ajax del archivo PaginaEdicion.php
      return "Datos actualizados";
    }
  }
  //Se cierra la conexion al finalizar
  $conn->close();
 ?>
