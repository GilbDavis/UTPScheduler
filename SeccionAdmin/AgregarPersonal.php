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
          <form method="post" id="registro" action="RegistroDatos.php">
            <h2>Registrar personal</h2>
            <label>Nombre: </label><br>
            <input class="inputs" type="text" name="nombre" placeholder="Nombre..."/><br>
            <label>Apellido: </label><br>
            <input class="inputs" type="text" name="apellido" placeholder="Apellido..."/><br>
            <label>Cedula: </label><br>
            <input class="inputs" type="text" name="cedula" placeholder="0-000-0000"/><br>
            <label>Correo: </label><br>
            <input class="inputs" type="email" name="correo" placeholder="ejemplo@example.com"/><br>
            <label>Cargo: </label><br>
            <input class="inputs" type="text" name="cargo" placeholder="Cargo..."/><br>
            <label>Contraseña: </label><br>
            <input id="contra" class="inputs" type="password" name="contrasena" placeholder="123456"/><br>
            <label>Confirmar contraseña: </label><br>
            <input id="recontra" class="inputs" type="password" name="contrasenaverify"
             placeholder="123456" onchange="checkPasswordMatch()"/><br>
            <div class="contramatch" id="checkpassword"></div>
            <input id="btnRegistrar" type="submit" name="submit" value="Registrar Personal"/>
          </form>
        </div>
    </body>

</html>

    </body>
</html>
