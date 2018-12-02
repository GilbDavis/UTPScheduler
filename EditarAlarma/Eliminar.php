<?php
	//Se implementa la conexion a la base de datos
	include '../Conexion/Connection.php';
//Condición para verificacion que se recibio el dato id y que no este vacio
	if(isset($_POST['id']) && !empty($_POST['id'])){
		//Se inicializan las variables
		$id = $_POST['id'];
		//Consulta para eliminar la columna y los datos referentes a esa columna con un JOIN
		$query = "DELETE FROM notificacion, fechas, correos USING notificacion
		JOIN fechas ON fechas.id_fechas = notificacion.id_fechas
		JOIN correos ON correos.id_correos = notificacion.id_correos
		WHERE id_notificacion = " . $id;
		//Si la consulta se realizo con exito se cumple la siguiente condición
		if($conn->query($query)){
			//Esto lo recibe el metodo de Eliminar en JS, en el archivo PaginaEdicion.php
			return "Datos Eliminados!";
		}
	}
	//Se cierra la conexión
	$conn->close();
 ?>
