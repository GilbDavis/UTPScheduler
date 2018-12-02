<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AGENDA LEMS - Editar Alarma</title>
        <!--Algunos de estos links y scripts son para utilizar bootstrap y Jquery en el proyecto ya que son fundamentales para el buen funcionamiento del sistema-->
        <link type="text/css" rel="stylesheet" href="../Css/Menu.css"/>
        <link type="text/css" rel="stylesheet" href="../Css/footer.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="../Imagenes/logo-lems.jpeg" type="image/x-icon"/>
        <style> header, body{font-family: 'Lato';}</style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script
              src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
              integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
              crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
    </head>
    <body>
        <!-- Se incluye el archivo Header.php que contiene el encabezado del sistema-->
        <?php require '../Header_Footer/Header.php'; ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- Este archivo cambia el lenguaje del DataTable a español-->
        <script type="text/javascript" src="../JS/TablaEdicion.js"></script>
        <!-- Comienza la seccion del DataTable -->
        <div class="wrapper" style="margin-left: 5%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="background-color:white;">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:black;"><i><strong>Lista de recordatorios</strong></i></h2>
                    </div>
                    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
                    <?php
                    //Se añade la conexion a la base de datos
                    require '../Conexion/Connection.php';
                    //Sentencia para rellenar el DataTable con los datos correspondientes
                    $sql = "SELECT notificacion.id_notificacion as idnotificacion, asunto.asunto as asunto, fechas.fecha_principal as fPrincipal, fechas.fecha_repeticion as fRepeticion, fechas.fecha_anterior as fAnterior, correos.correo as correos, notificacion.mensaje as mensaje FROM notificacion
                        JOIN asunto ON notificacion.id_asunto = asunto.id_asunto
                        JOIN fechas ON notificacion.id_fechas = fechas.id_fechas
                        JOIN correos ON notificacion.id_correos = correos.id_correos;";
                    //Si la sentencia se ejecuta con exito entra en la siguiente condición
                    if($row = $conn->query($sql)){
                        //Se cuenta el numero de filas obtenidos
                        $rowcnt = $row->num_rows;
                        //Si el numero de filas es mayor a 0 entra en la siguiente condición
                        if($rowcnt > 0){
                          //Se crea la tabla con su respectivas columnas y filas
                            echo "<table id='tablaEdicion' class='table table-striped table-bordered'>";
                            //Aqui comienza el encabezado de la tabla
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>ASUNTO</th>";
                                        echo "<th>CORREOS A ENVIAR</th>";
                                        echo "<th>MENSAJE</th>";
                                        echo "<th>FECHA PRINCIPAL</th>";
                                        echo "<th>Editar</th>";
                                        echo "<th>Eliminar</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                //Aca termina el encabezado de la tabla
                                echo "<tbody>";
                                //El siguiente ciclo no termina hasta que no se recorran todos los valores obtenidos de la base de datos
                                while($result = $row->fetch_assoc()){
                                        //Se rellenan las columnas con su valor correspondiente de la base de datos
                                        echo "<tr id='" . $result['idnotificacion'] ."'>";
                                        echo "<td data-target='idnot'>" . $result['idnotificacion'] . "</td>";
                                        echo "<td>" . utf8_encode($result['asunto']) . "</td>";
                                        echo "<td data-target='correos'>" . $result['correos'] . "</td>";
                                        echo "<td data-target='mensaje'>" . $result['mensaje'] . "</td>";
                                        echo "<td data-target='fecha'>" . $result['fPrincipal'] . "</td>";
                                        echo "<td>";
                                        //Los 2 buttons que estan dentro son los botones utilizados para eliminar y editar los registros del DataTabla y de la base de recordatorios
                                        //los metodo data-role, data-id son para enviar los valores a JS y hacer mas facil el proceso utilizando Modal de bootstrap
                                        //data-target y data-toggle son necesarios para saber que Modal se abrira dependiendo de su ID
                                            echo "<button data-role='update' data-id='" . $result['idnotificacion'] ."' class='btn btn-warning' data-target='#ModalUpdate' style='margin:auto; display: block;'><span class='glyphicon glyphicon-pencil'></span></button>";
                                        echo '</td>';
                                        echo '<td>';
                                            echo "<button class='btn btn-danger' data-toggle='modal' data-target='#ModalDelete' data-role='delete' data-id='". $result['idnotificacion'] ."' style='margin:auto; display: block;'><span class='glyphicon glyphicon-trash'></span></button>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            //Aqui termina la tabla
                        } else{
                          //Mostrara este mensaje si no hay registros en la base de datos
                            echo "<p class='lead'><em>No fue econtrado</em></p>";
                        }
                    } else{
                        //Si hay algun problema de conexion se mostrara esto
                        echo "ERROR: no se pudo ejecutar";
                    }
                    //Se cierra la conexion
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Aqui termina el DataTable de Bootstrap -->

    <!-- Modal para eliminar datos -->
    <div id="ModalDelete" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Recordatorio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Esta seguro que desea eliminar este recordatorio?</p>
                    <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar"/>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="Eliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin del Modal de eliminar -->
    <!-- Modal para actualizar datos-->
    <div id="ModalUpdate" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Contenido del Modal-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificar recordatorio LEMS</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Correos a enviar:</label>
                <input type="text" id="correos" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Mensaje:</label>
                <textarea id="mensaje" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Fecha Principal:</label>
                <input type='text' id="fecha" class="form-control" name="fecha" required/>
            </div>
            <input type="hidden" id="notificacionId" class="form-control"/>
          </div>
          <div class="modal-footer">
            <a id="guardar" data-dismiss="modal" data-dismiss="modal" class="btn btn-primary pull-right">Actualizar</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <footer class="foot" style="margin-top: 40px;clear: both;position: relative;height: 40px;"><center>
                <h4>GRUPO DE DESARROLLO DE SOFTWARE 2018: GILBERTO DAVIS, LEONARDO MONTERO,LINETH GUERRA Y CIRILO CASTRO.</h4>
    <center></footer>
    </body>

    <!-- Codigo JS que dependiendo que boton del datatable menciona mas arriba es utilizado reciba los datos y haga la funcion establecida -->
    <script type="text/javascript">
        //Se utiliza JQUERY para que este solo se ejecute cuando la pagina se cargue por completo o este lista
        $(document).ready(function(){
            //Ingresa los valores de la columna seleccionada a los textbox del Modal para su actualización
            $(document).on('click', 'button[data-role=update]', function(){

                var id = $(this).data('id'); //Esta variable obtiene el id de la columna mediante el data-id del boton Actualizar
                //Estas variables obtienen el texto de la columna y fila correspondiente por medio del id del data target
                var correos = $('#'+id).children('td[data-target=correos]').text();
                var mensaje = $('#'+id).children('td[data-target=mensaje]').text();
                var fecha = $('#'+id).children('td[data-target=fecha]').text();
                //En esta seccion se establecen los datos a su repesctivo textbox o input en el Modal de Actualizar
                //Por lo que inicializa los datos del Modal Actualizar con los datos de la fila elejida
                $('#correos').val(correos);
                $('#mensaje').val(mensaje);
                $('#notificacionId').val(id);
                $('#fecha').val(fecha);
                $('#ModalUpdate').modal('toggle');
            });
            //Ahora crearemos los eventos para actualizar
            $('#guardar').click(function(){
                //Se obtienen los datos que cambiamos en el Modal Actualizar para luego enviarlos al archivo Actualizar.php de forma asincrona
                //Para su posterior actualizacion en el base de datos
                var id = $('#notificacionId').val();
                var correos = $('#correos').val();
                var mensaje = $('#mensaje').val();
                var fecha  = $('#fecha').val();
                //Se utiliza la funcion Ajax para enviar los datos modificados al archivo Actualizar.php para que esta cumpla con su funcion de actualizar
                $.ajax({
                    url: 'Actualizar.php',
                    method: 'post',
                    data: {id : id, correos : correos, mensaje : mensaje, fecha : fecha},
                    success: function(response){
                        //Actualizar los registros de la tabla de forma asincrona si se cumplieron las condicion en el archivo Actualizar.php
                        $('#'+id).children('td[data-target=correos]').text(correos);
                        $('#'+id).children('td[data-target=mensaje]').text(mensaje);
                        $('#'+id).children('td[data-target=fecha]').text(fecha);
                        $('#ModalUpdate').modal('hide');
                    }
                });
            });
        });
    </script>
    <!-- Script para eliminar datos con ajax -->
    <!-- El mismo procedimiento que el de actualizar pero se envia a Eliminar.php -->
    <script type="text/javascript">
        $(document).on('click', 'button[data-role=delete]', function(){
            var id = $(this).data('id');

            $('#Eliminar').click(function(){
                $.ajax({
                    url: 'Eliminar.php',
                    method: 'POST',
                    data: {id:id},
                    success:function(data){
                        //A futuro se debe hallar una forma de mitigar esto ya que de lo contrario tendria que recargarse la pagina
                        //Cada vez que se elimina un recordatorio
                        location.reload();
                    }
                });
            });
        });
    </script>
</html>
