<?php

  require 'Conexion/Connection.php';
  //Se definen las varias a utilizar
  $errors = array();
  $cedula = "";
  $contrasena = "";
  //Si haces click al boton submit se activa el If
  if(isset($_POST['submit'])){
      //Se obtienen los datos del formulario del login y se guardan en sus variables
      $cedula = filter_input(INPUT_POST, 'cedula');
      $contrasena = filter_input(INPUT_POST, 'contrasena');
      //Se inicia el manejo de errores segun lo obtenido del formulario
      if(empty($cedula)){
          array_push($errors, "Se requiere su Cedula");
      }
      if(empty($contrasena)){
          array_push($errors, "Se requiere su contraseña");
      }
      if(count($errors) == 0){
          //Obtenemos el hash de la base de datos para compararlo con la contraseña
          //ingresada por el usuario
          $sqlpass = "SELECT clave FROM usuarios WHERE cedula = '$cedula'";
          $result = $conn->query($sqlpass);
          $col = $result->fetch_assoc();
          $contraup = $col['clave'];
          //Utilizo password_verify para desencriptar el hash obtenido y compararlo con la
          //contraseña ingresada y si son correctas buscar en la tabla el usuario e ingresar
          //P.D: Este codigo esta mal optimizado, a futuro debo cambiar esto ya que esta utilizando
          //recursos innnecesariamente
          if(password_verify($contrasena, $contraup)){
            $sql = "SELECT id_usuario, nombre, apellido, cedula, clave, rol FROM Usuarios WHERE"
                    . " cedula = '$cedula' AND clave = '$contraup'";
            $resultado = $conn->query($sql);
            $row = $resultado->fetch_assoc();

            if($resultado->num_rows > 0){
              //Si la consulta retorna 1 valor iniciara la sesion e iniciará las variables de sesion
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
