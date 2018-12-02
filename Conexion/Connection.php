<?php
    //Se conecta a la base de datos local para simplemente importar cuando se necesite
    //acceder a la base de datos
    //El proyecto se implementa en un ambiente cerrado por lo que utilizar localhost es el mejor recurso para mentener el
    //Software a disponibilidad exclusiva del personal de LEMS.
    $server = 'localhost';
    $user = "usuario";
    $pass = "LEMSutp2018";
    $db = "Notificacion";
    //El proyecto esta estructura con la metodologia de conexion MySQLi Object-Oriented
    $conn = new mysqli($server, $user, $pass, $db) or Die('No se pudo conectar...');

?>
