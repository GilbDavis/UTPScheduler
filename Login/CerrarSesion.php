<?php
    //Este codigo es simplemente para cerrar la sesion, destruir las variables de sesion
    //y redireccionar al usuario a la ventana principal o de inicio de sesión
    session_start();
    unset($_SESSION);
    session_destroy();
    session_write_close();
    header('Location: ../index.php');
    die;

?>
