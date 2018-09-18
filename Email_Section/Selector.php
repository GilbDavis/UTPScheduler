<?php

    $server = 'localhost';
    $user = 'root';
    $pass = "0631212";
    $db = "Schedule";
    
    $conn = new mysqli($server, $user, $pass, $db) or die("<p>No se pudo conectar</p>");
    
    $result = $conn->query("SELECT * FROM Usuarios");
    echo '<label for="Selectemail">Correos electronicos: </label>';
    echo '<select id="correosmysql">\n';
    echo '<option value ="0">Correos...</option>';
    while($row = $result->fetch_assoc()){
        echo '<option value="' . $row['id_usuario'] . '">' . $row['email'] . "</option>";
    }
    echo "</select>";
    
    $conn->close();

?>

