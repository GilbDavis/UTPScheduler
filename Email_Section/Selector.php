<?php

    include '../Conexion/Connection.php';
    
    $result = $conn->query("SELECT * FROM Usuarios");
    echo '<label for="Selectemail">Correos electronicos: </label>';
    echo '<select id="correosmysql">\n';
    echo '<option value ="0">Correos...</option>';
    while($row = $result->fetch_assoc()){
        echo '<option value="' . $row['id_usuario'] . '">' . $row['correo'] . "</option>";
    }
    echo "</select>";
    
    $conn->close();

?>

