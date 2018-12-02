<?php include('Login/Autenticacion.php');

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>AGENDA LEMS - Iniciar Sesión</title>
        <link rel="stylesheet" type="text/css" href="Css/Logins.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="Imagenes/LOGO.png" type="image/x-icon"/>
    </head>
    <body>
        
        <div class="loginbox">
            <img src="Imagenes/user.png" alt="usuario" class="avatar"/>
            <h1>Inicio de Sesión</h1>
            
            <form action="index.php" method="POST">
                <?php include ('Login/erroresLogin.php'); ?><style><?php include 'Css/Logins.css'; ?></style>
                <p>Cédula:</p>
                <input type="text" name="cedula" placeholder="Ingrese su cédula..."/>
                <p>Contraseña:</p>
                <input type="password" name="contrasena" placeholder="*******"/>
                <br>
                <br>
                <br>
                <input type="submit" name="submit" value="Iniciar Sesion"/>
            </form>
        </div>
             
    </body>
    
</html> 
    </body>
</html>
