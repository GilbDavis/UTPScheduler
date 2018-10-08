<?php

    require ('../Conexion/Connection.php');
    
    $result = $conn->query('SELECT id_asunto, asunto FROM Asunto;');
    echo '<label for="Asunto">Asunto: </label>';
    echo '<select id="asunto">';
    echo '<option value="0">Asuntos...</option>';
    
    while($row = $result->fetch_assoc()){
        echo '<option value="' . $row['id_usuario'] . '">' . $row['asunto'] . '</option>';
    }
    echo '</select>';
    
    $conn->close();
?>

