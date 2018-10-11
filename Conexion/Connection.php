<?php
    //Se conecta a la base de datos local para simplemente importar cuando se necesite
    //acceder a la base de datos
    $server = 'localhost';
    $user = "usuario";
    $pass = "LEMSutp2018";
    $db = "Notificacion";

    $conn = new mysqli($server, $user, $pass, $db) or Die('No se pudo conectar...');

?>
