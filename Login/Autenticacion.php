 <?php

    $server = 'localhost';
    $user = "root";
    $pass = "0631212";
    $db = "Supermercado";
    $errors = array();
    $email = "";
    $contrasena = "";

    $con = new mysqli($server, $user, $pass, $db) or Die('No se pudo conectar...');
    
    if(isset($_POST['submit'])){
        $email = $_POST["correo_admin"];
        $contrasena = $_POST["contrasena_admin"];
        
        if(empty($email)){
            array_push($errors, "Se requiere su Correo electronico");
        }
        if(empty($contrasena)){
            array_push($errors, "Se requiere su contraseña");
        }
        if(count($errors) == 0){
            $sql = "SELECT email, pass FROM Administrador WHERE email = '$email' AND pass = '$contrasena'";
            $resultado = $con->query($sql);

            if($resultado->num_rows > 0){
                session_start();
                $_SESSION["user_session"] = $email;
                $_SESSION['Success'] = "Estas conectado!";
                header("Location: ../Menus/AdminMenu.php");
            }else{
                array_push($errors, "El e-mail/contraseña son invalidos");
            }
        }
    }
?>