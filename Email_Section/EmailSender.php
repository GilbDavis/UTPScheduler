<?php

    include '../Conexion/Connection.php';
    
    //Codigo para enviar correo electronico
    //Para realizar esto se debe modificar el mail function en php.ini
    //y en sendemail.ini
    
    try{
        
        $dt = new DateTime("now", new DateTimeZone('America/Panama'));
        $fecha_hora = $dt->format('Y-m-d H:i');

        $query = "SELECT notificacion.id_notificacion as idnotificacion, asunto.asunto as asunto, fechas.fecha_principal as fPrincipal, fechas.fecha_repeticion as fRepeticion, fechas.fecha_anterior as fAnterior, estado.id_estado as idestado, correos.correo as correos, notificacion.mensaje as mensaje FROM notificacion 
            JOIN asunto ON notificacion.id_asunto = asunto.id_asunto
            JOIN fechas ON notificacion.id_fechas = fechas.id_fechas
            JOIN estado ON notificacion.id_estado = estado.id_estado
            JOIN correos ON notificacion.id_correos = correos.id_correos 
            WHERE (fechas.fecha_anterior = '$fecha_hora') OR (fechas.fecha_principal = '$fecha_hora') OR (fechas.fecha_repeticion = '$fecha_hora');";
        
        $result = $conn->query($query)->fetch_assoc();

        if($result){
            echo 'Hay registros!';
        }else{
            echo 'No hay Registros';
        }

    } catch (Exception $ex) {
        throw $ex->getMessage();

    }

?>