<?php

    include '../Conexion/Connection.php';
    
    //Codigo para enviar correo electronico
    //Para realizar esto se debe modificar el mail function en php.ini
    //y en sendemail.ini
    
    $success = false;
    if(isset($_POST["enviar"])){
        $correo = array(filter_input(INPUT_POST, "correos"));
        $asunto = filter_input(INPUT_POST, "asunto");
        $mensaje = filter_input(INPUT_POST, "mensaje");
        
        $success = mail($correo, $asunto, $mensaje);    
    }
    
    if($success == true){
        header("Location: http://localhost/ScheduleNot/Email_Section/EPrincipal");
    }else{
        header("Location: Selector.php");
    }

?>