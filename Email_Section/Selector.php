<?php

    include '../Conexion/Connection.php';
    //Se consultan los correos guardados en la tabla
    $result = $conn->query("SELECT id_usuario, correo FROM Usuarios");
    //Se crea un selection con opciones para que el usuario pueda elejir
    echo '<label for="Selectemail">Correos electronicos: </label>';
    echo '<select id="correosmysql">\n';
    echo '<option value ="0">Correos...</option>';
    while($row = $result->fetch_assoc()){
        echo '<option value="' . $row['id_usuario'] . '">' . $row['correo'] . "</option>";
    }
    echo "</select>";

    $conn->close();

?>
