<?php include 'RegistroDatos.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>LEMS - Agregar Personal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../Css/Personal.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <style> header, body{font-family: 'Lato';}</style>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../JS/ContraseñaVerificar.js"></script>
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>

        <h1>Formulario de Registro</h1>
        <div class="Register-Container">
          <form method="post" id="registro" action="AgregarPersonal.php" autocomplete="off">
            <h2>Registrar personal</h2>
            <!--Incluyo el archivo erroresRegistro para que se muestre en caso de que ocurra alguno
            Agrego el estilo aqui para que sea exclusivo para este formulario-->
            <?php include('erroresRegistro.php'); ?>
            <style>.error{font-size:16px; color: #a94442; margin-bottom: 5px;
              border-radius: 5px; border: 1px solid #a94442; margin-left: 20px;
              margin-right: 100px; text-align: left; background: #f2dede;}</style>
            <label>Nombre: </label><br>
            <input class="inputs" type="text" name="nombre" placeholder="Nombre..."/ title="Se requiere este campo" required><br>
            <label>Apellido: </label><br>
            <input class="inputs" type="text" name="apellido" placeholder="Apellido..." required/><br>
            <label>Cedula: </label><br>
            <input class="inputs" type="text" name="cedula" placeholder="0-000-0000" required/><br>
            <label>Correo: </label><br>
            <input class="inputs" type="email" name="correo" placeholder="ejemplo@example.com" required/><br>
            <label>Cargo: </label><br>
            <input class="inputs" type="text" name="cargo" placeholder="Cargo..." required/><br>
            <label>Contraseña: </label><br>
            <input id="contra" class="inputs" type="password" name="contrasena" placeholder="***********" required/><br>
            <label>Confirmar contraseña: </label><br>
            <input id="recontra" class="inputs" type="password" name="contrasenaverify"
             placeholder="***********" onchange="checkPasswordMatch()" required/><br>
            <div class="contramatch" id="checkpassword"></div>
            <input id="btnRegistrar" type="submit" name="submit" value="Registrar Personal"/>
          </form>
        </div>
    </body>
</html>
