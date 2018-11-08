<?php 
	
	include '../Conexion/Connection.php';

	if(isset($_POST['id']) && !empty($_POST['id'])){
		$id = $_POST['id'];

		$query = "DELETE FROM notificacion, fechas, correos USING notificacion 
		JOIN fechas ON fechas.id_fechas = notificacion.id_fechas 
		JOIN correos ON correos.id_correos = notificacion.id_correos 
		WHERE id_notificacion = " . $id;

		if($conn->query($query)){
			return "Datos Eliminados!";
		}
	}

	$conn->close();
 ?>