 <?php

    require 'Conexion/Connection.php';
    
    $errors = array();
    $cedula = "";
    $contrasena = "";
    
    if(isset($_POST['submit'])){
        $cedula = filter_input(INPUT_POST, 'cedula');
        $contrasena = filter_input(INPUT_POST, 'contrasena');
        
        if(empty($cedula)){
            array_push($errors, "Se requiere su Cedula");
        }
        if(empty($contrasena)){
            array_push($errors, "Se requiere su contraseña");
        }
        if(count($errors) == 0){
            $sql = "SELECT cedula, clave FROM Usuarios WHERE cedula = '$cedula' AND clave = '$contrasena'";
            $resultado = $conn->query($sql);

            if($resultado->num_rows > 0)  {
                session_start();
                $_SESSION["user_ced"] = $cedula;
                $_SESSION['Success'] = "Estas conectado!";
                echo 'Sesión inciada!';
            }else{
                array_push($errors, "El e-mail/contraseña son invalidos");
            }
        }
    }
?>