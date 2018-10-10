<?php
  require '../Conexion/Connection.php';

  //Definir las variables
  $errors = array();
  $nombre = "";
  $apellido = "";
  $cedula = "";
  $correo = "";
  $cargo = "";
  $contrasena = "";
  $recontrasena = "";
  $rol = "Member";

  if(isset($_POST['submit'])){
    //Obtener los valores del formulario
    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellido = filter_input(INPUT_POST, 'apellido');
    $cedula = filter_input(INPUT_POST, 'cedula');
    $correo = filter_input(INPUT_POST, 'correo');
    $cargo = filter_input(INPUT_POST, 'cargo');
    $contrasena = password_hash(filter_input(INPUT_POST, 'contrasena'), PASSWORD_DEFAULT);
    $recontrasena = password_hash(filter_input(INPUT_POST, 'contrasenaverify'), PASSWORD_DEFAULT);
    $rol = "Member";
    //Manejo de errores del formulario
    if(empty($nombre)){
      array_push($errors, "Se requiere su nombre");
    }
    if(empty($apellido)){
      array_push($errors, "Se requiere su apellido");
    }
    if(empty($cedula)){
      array_push($errors, "Se requiere su Cedula!");
    }
    if(empty($cargo)){
      array_push($errors, "Ingrese su cargo");
    }
    if(empty($contrasena)){
      array_push($errors, "Ingrese su contraseña");
    }
    if(empty($recontrasena)){
      array_push($errors, "Se requiere que verifique su contraseña");
    }
    //Si no hay errores se registra normalmente al usuario.
    if(count($errors) == 0){
      try{
        $sql = "INSERT INTO usuarios(nombre, apellido, cedula, correo, clave,
           rol, cargo) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$recontrasena',
           '$rol', '$cargo');";
           $resultado = $conn->query($sql);
           echo '<script language="javascript">';
           echo 'alert("Registrado con exito!");';
           echo 'window.location.href="../SeccionAdmin/AgregarPersonal.php"';
           echo '</script>';
      }catch (Exception $ex){
        echo '<script language="javascript">';
        echo 'alert(' . $ex->getMessage() . ')';
        echo '</script>';
      }

    }else{
      array_push($errors, "");
    }
  }
  $conn->close();
 ?>
