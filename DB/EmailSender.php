<?php

    $server = 'localhost';
    $user = 'root';
    $pass = "0631212";
    $db = "Schedule";
    
    $conn = new mysqli($server, $user, $pass, $db) or die("<p>No se pudo conectar</p>");
    
    //Codigo para enviar correo electronico
    //Para realizar esto se debe modificar el mail function en php.ini
    // y en sendemail.ini
    
    if(isset($_POST["enviar"])){
        $correo = filter_input(INPUT_POST, "correos");
        $asunto = filter_input(INPUT_POST, "asunto");
        $mensaje = filter_input(INPUT_POST, "mensaje");
        
        mail($correo, $asunto, $mensaje);
    }

?>