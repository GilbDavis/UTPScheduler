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
        //Obtener la clave para compararlo con password_verify
          $sqlpass = "SELECT clave FROM usuarios WHERE cedula = '$cedula'";
          $result = $conn->query($sqlpass);
          $col = $result->fetch_assoc();
          $contraup = $col['clave'];

      if(password_verify($contrasena, $contraup)){
        $sql = "SELECT id_usuario, nombre, apellido, cedula, clave, rol FROM Usuarios WHERE"
                . " cedula = '$cedula' AND clave = '$contraup'";
        $resultado = $conn->query($sql);
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows > 0){
            if($row['rol'] == 'Admin'){
                session_start();
                $_SESSION['user_id'] = $row['id_usuario'];
                $_SESSION['user_ced'] = $row['cedula'];
                $_SESSION['user_nom'] = $row['nombre'];
                $_SESSION['user_ape'] = $row['apellido'];
                header('Location: SeccionAdmin/AdminMenu.php');
            }else{
                if($row['rol'] == 'Member'){
                    session_start();
                    $_SESSION['user_id'] = $row['id_usuario'];
                    $_SESSION['user_ced'] = $row['cedula'];
                    $_SESSION['user_nom'] = $row['nombre'];
                    $_SESSION['user_ape'] = $row['apellido'];
                    header();
                }
            }
          }
        }else{
            array_push($errors, "El e-mail/contraseña son invalidos");
      }
    }
  }
?>
