<?php

    require ('../Conexion/Connection.php');
    //Se consultan los datos de la tabla asunto
    $result = $conn->query('SELECT id_asunto, asunto FROM Asunto;');
    //Se crea un <select> para mostrar los asuntos elejible en el formulario de
    //creacion de recordatorios
    echo '<label for="Asunto">Asunto: </label>';
    echo '<select id="asunto" name="asunto">';
    echo '<option value="0">Asuntos...</option>';
    //Mientras que haya valores el while lo reccorre y crear un tag <option>
    //Para mostrarlo en el combobox
    while($row = $result->fetch_assoc()){
        //Crea las opciones con su respectivo id
        echo '<option value="' . $row['id_asunto'] . '">' . utf8_encode($row['asunto']) . '</option>';
    }
    echo '</select>';

    $conn->close();
?>
