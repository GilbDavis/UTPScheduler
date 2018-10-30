<?php include('Login/Autenticacion.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>LEMS - Iniciar Sesión</title>
        <link rel="stylesheet" type="text/css" href="Css/Logins.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../Imagenes/logo-lems.jpeg" type="image/x-icon"/>
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
                <input type="submit" name="submit" value="Iniciar Sesion"/>
            </form>
        </div>
        
       <!-- Lineth / Cirilo, el footer puedes crearlo en un archivo php y añadirlo a todas las paginas web con un include
       
            <footer class="foot">
        <center>
            <a href="https://www.instagram.com/davis_0297/" target="_blank"><img src="../Imagenes/instagram-logo.png" alt="Instagram"/></a>
            <a href="https://www.facebook.com" target="_blank"><img src="../Imagenes/facebook-logo-button.png" alt="Facebook"/></a>
            <a href="https://api.whatsapp.com/send?phone=50763737013" target="_blank"><img src="../Imagenes/whatsapp.png" alt="Whatsapp"/></a>
            <a href="https://www.linkedin.com/in/gilbertodavis/" target="_blank"><img src="../Imagenes/linkedin.png" alt="Linkedin"/></a>
        <center>
    </footer> -->
        
    </body>
    
</html>
        
    </body>
</html>
