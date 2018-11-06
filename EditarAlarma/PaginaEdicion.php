<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>LEMS - Editar Alarma</title>
        <link type="text/css" rel="stylesheet" href="../Css/Menu.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="../Imagenes/logo-lems.jpeg" type="image/x-icon"/>
        <style> header, body{font-family: 'Lato';}</style>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
        <script type="text/javascript" src="../JS/TablaEdicion.js"></script>

        <div class="wrapper" style="margin-left: 5%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="background-color:white;">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:black;"><i><strong>Lista de recordatorios</strong></i></h2>
                    </div>
                    <?php
                    require '../Conexion/Connection.php';
                    
                    $sql = "SELECT notificacion.id_notificacion as idnotificacion, asunto.asunto as asunto, fechas.fecha_principal as fPrincipal, fechas.fecha_repeticion as fRepeticion, fechas.fecha_anterior as fAnterior, correos.correo as correos, notificacion.mensaje as mensaje FROM notificacion 
                        JOIN asunto ON notificacion.id_asunto = asunto.id_asunto
                        JOIN fechas ON notificacion.id_fechas = fechas.id_fechas
                        JOIN correos ON notificacion.id_correos = correos.id_correos;";
                    if($row = $conn->query($sql)){
                        $rowcnt = $row->num_rows;
                        if($rowcnt > 0){
                            echo "<table id='tablaEdicion' class='table table-striped table-bordered'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>ASUNTO</th>";
                                        echo "<th>CORREOS A ENVIAR</th>";
                                        echo "<th>MENSAJE</th>";
                                        echo "<th>Editar</th>";
                                        echo "<th>Eliminar</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($result = $row->fetch_assoc()){
                                    echo "<tr id='" . $result['idnotificacion'] ."'>";
                                        echo "<td data-target='idnot'>" . $result['idnotificacion'] . "</td>";
                                        echo "<td>" . $result['asunto'] . "</td>";
                                        echo "<td data-target='correos'>" . $result['correos'] . "</td>";
                                        echo "<td data-target='mensaje'>" . $result['mensaje'] . "</td>";
                                        echo "<td>";
                                            echo "<button data-role='update' data-id='" . $result['idnotificacion'] ."' class='btn btn-warning' data-target='#ModalUpdate' data-toggle='modal' style='margin:auto; display: block;'><span class='glyphicon glyphicon-pencil'></span></button>";
                                        echo '</td>';
                                        echo '<td>';
                                            echo "<button class='btn btn-danger' href='Eliminar.php?id=". $result['idnotificacion'] ."' title='Delete Record' data-toggle='tooltip' style='margin:auto; display: block;'><span class='glyphicon glyphicon-trash'></span></button>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                        } else{
                            echo "<p class='lead'><em>No fue econtrado</em></p>";
                        }
                    } else{
                        echo "ERROR: no se pudo ejecutar";
                    }
 
                    $conn->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <!-- Modal -->
    <div id="ModalUpdate" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificar recordatorio LEMS</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Correos a enviar:</label>
                <input type="text" id="correos" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Mensaje:</label>
                <textarea id="mensaje" class="form-control"></textarea>
            </div>
            <input type="hidden" id="notificacionId" class="form-control"/>
          </div>
          <div class="modal-footer">
            <a id="guardar" data-dismiss="modal" class="btn btn-primary pull-right">Actualizar</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            //Ingresa los valores de la columna seleccionada a los textbox del Modal
            $(document).on('click', 'button[data-role=update]', function(){
                var id = $(this).data('id');
                var correos = $('#'+id).children('td[data-target=correos]').text();
                var mensaje = $('#'+id).children('td[data-target=mensaje]').text();

                $('#correos').val(correos);
                $('#mensaje').val(mensaje);
                $('#notificacionId').val(id);
                $('#ModalUpdate').modal('toggle');
            });
            //Ahora crearemos los eventos para actualizar
            $('#guardar').click(function(){
                var id = $('#notificacionId').val();
                var correos = $('#correos').val();
                var mensaje = $('#mensaje').val();

                $.ajax({
                    url: 'Actualizar.php',
                    method: 'post',
                    data: {id : id, correos : correos, mensaje : mensaje},
                    success: function(response){
                        console.log(response)
                        //Actualizar los registros de la tabla
                        $('#'+id).children('td[data-target=correos]').text(correos);
                        $('#'+id).children('td[data-target=mensaje]').text(mensaje);
                        $('#ModalUpdate').modal('hide');
                    }
                });
            });
        });
    </script>
</html>