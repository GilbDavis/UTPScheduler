<?php include 'RegistroDatos.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>AGENDA LEMS - Agregar Personal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" type="text/css" href="../Css/Personal.css"/>
        <link rel="stylesheet" type="text/css" href="../Css/footer.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <style> header, body{font-family: 'Lato';}</style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../JS/ContraseñaVerificar.js"></script>
        <link rel="shortcut icon" href="../Imagenes/LOGO.png" type="image/x-icon"/>
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>

        <div class="Register-Container">
          <form method="post" id="registro" action="AgregarPersonal.php" autocomplete="off">
            <h2>Registrar Personal</h2>
            <!--Incluyo el archivo erroresRegistro para que se muestre en caso de que ocurra alguno
            Agrego el estilo aqui para que sea exclusivo para este formulario-->
            <?php include('erroresRegistro.php'); ?>
            <style>.error{
                    font-size:16px; 
                    color: #35c409; 
                    margin-bottom: 5px;
                    border-radius: 5px; 
                    border: 1px solid #a94442; 
                    margin-left: 20px;
                    margin-right: 100px; 
                    text-align: center; 
                    background: C;}</style>
            <label>Nombre: </label><br>
            <input class="inputs" type="text" name="nombre" placeholder="Nombre..."/ title="Se requiere este campo"><br>
            <label>Apellido: </label><br>
            <input class="inputs" type="text" name="apellido" placeholder="Apellido..."/><br>
            <label>Cedula: </label><br>
            <input class="inputs" type="text" name="cedula" placeholder="0-000-0000" required/><br>
            <label>Correo electrónico: </label><br>
            <input class="inputs" type="email" name="correo" placeholder="ejemplo@example.com"/><br>
            <label>Cargo: </label><br>
            <input class="inputs" type="text" name="cargo" placeholder="Cargo..."/><br>
            <label>Contraseña: </label><br>
            <input id="contra" class="inputs" type="password" name="contrasena" placeholder="***********"/><br>
            <label>Confirmar contraseña: </label><br>
            <input id="recontra" class="inputs" type="password" name="contrasenaverify"
             placeholder="***********" onchange="checkPasswordMatch()"/><br>
            <div class="contramatch" id="checkpassword"></div>
            <input id="btnRegistrar" class="btn btn-primary" type="submit" name="submit" value="Registrar Personal"/>
            <!--<input id="btnActualizar" class="btn btn-warning" type="submit" name="Actualizar" value="Actualizar Información"/> -->
            <!-- Si se usara el boton actualizar datos agregar esto al boton eliminar style="margin:10px 0px 0px 70px;" -->
            <input id="btnEliminar" class="btn btn-danger" type="submit" name="Eliminar" onclick="return confirm('Esta seguro que desea eliminar este usuario?');" value="Eliminar Personal"/>
          </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer class="foot"><center>
                <h4>GRUPO DE DESARROLLO DE SOFTWARE 2018: GILBERTO DAVIS, LEONARDO MONTERO,LINETH GUERRA Y CIRILO CASTRO.</h4>
        <center></footer>
    </body>
</html>
