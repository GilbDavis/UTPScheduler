<?php

    include '../Conexion/Connection.php';
    
    //Codigo para enviar correo electronico
    //Para realizar esto se debe modificar el mail function en php.ini
    //y en sendemail.ini
    
    try{
        //Crea un objeto datetime y obtiene el dia y fecha actual de la zona horaria America/Panama
        $dt = new DateTime("now", new DateTimeZone('America/Panama'));
        $fecha_hora = $dt->format('Y-m-d H:i'); //Formatea el dia y hora al estilo que yo quiera
        //SELECT JOIN para obtener todos los datos que se deben enviar al correo electronico
        $query = "SELECT notificacion.id_notificacion as idnotificacion, asunto.asunto as asunto, fechas.fecha_principal as fPrincipal, fechas.fecha_repeticion as fRepeticion, fechas.fecha_anterior as fAnterior, estado.id_estado as idestado, correos.correo as correos, notificacion.mensaje as mensaje FROM notificacion 
            JOIN asunto ON notificacion.id_asunto = asunto.id_asunto
            JOIN fechas ON notificacion.id_fechas = fechas.id_fechas
            JOIN estado ON notificacion.id_estado = estado.id_estado
            JOIN correos ON notificacion.id_correos = correos.id_correos 
            WHERE (fechas.fecha_anterior = '$fecha_hora') OR (fechas.fecha_principal = '$fecha_hora') OR (fechas.fecha_repeticion = '$fecha_hora');";
        //Se executa la sentencia y se guarda en la variable $result convirtiendola en un arreglo de los valores obtenidos.
        $result = $conn->query($query)->fetch_assoc();
        //Codigo para verificar si las fechas concuerdan con el actual para enviar los correos electronicos
        if($result){
            if($result['fAnterior'] == $fecha_hora && $result['idestado'] == 1 || $result['fAnterior'] < $fecha_hora && $result['idestado'] == 1){
                try{
                    $correos = explode(",", $result['correos']);
                    $correos = implode(", ", $correos);
                    if(mail($correos, $result['asunto'], $result['mensaje'])){
                        $query_anterior = $conn->query("UPDATE notificacion SET id_estado = 2 WHERE id_notificacion = " . $result['idnotificacion'] . ";");
                    }
                    echo "Entro al primer IF";
                }catch (Exception $ex){
                    throw $ex->getMessage();
                }
            }
            //Obtener el id_estado actualizado
            $actualizar_idestado = $conn->query("SELECT id_estado FROM notificacion WHERE id_notificacion = " . $result['idnotificacion'] . ";")->fetch_assoc();

            if($result['fRepeticion'] == $fecha_hora && $actualizar_idestado['id_estado'] == 2 || $result['fRepeticion'] < $fecha_hora && $actualizar_idestado['id_estado'] == 2){
                try{
                    $correos = explode(",", $result['correos']);
                    $correos = implode(", ", $correos);
                    if(mail($correos, $result['asunto'], $result['mensaje'])){
                        $query_repeticion = $conn->query("UPDATE notificacion SET id_estado = 3 WHERE id_notificacion = " . $result['idnotificacion'] . ";");
                    }
                    echo "Entro al segundo IF";
                }catch(Exception $ex){
                    throw $ex->getMessage();
                }
            }

            $actualizar_idestado2 = $conn->query("SELECT id_estado FROM notificacion WHERE id_notificacion = " . $result['idnotificacion'] . ";")->fetch_assoc();

            if($result['fPrincipal'] == $fecha_hora && $actualizar_idestado2['id_estado'] == 3 || $result['fPrincipal'] < $fecha_hora && $actualizar_idestado2['id_estado'] == 3){
                try{
                    $correos = explode(",", $result['correos']);
                    $correos = implode(", ", $correos);
                    if(mail($correos, $result['asunto'], $mensaje)){
                        $query_principal = $conn->query("UPDATE notificacion SET id_estado = 4 WHERE id_notificacion = " . $result['idnotificacion'] . ";");
                    }
                    echo "Entro al tercer IF";
                }catch(Exception $ex){
                    throw $ex->getMessage();
                }
            }
        }else{
            echo 'No hay Registros';
        }

    } catch (Exception $ex) {
        throw $ex->getMessage();

    }finally{
        $conn->close();
    }

?>