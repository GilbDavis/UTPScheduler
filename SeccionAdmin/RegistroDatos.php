<?php
  require '../Conexion/Connection.php';

  //Definir las variables
  $errores = array();
  $nombre = "";
  $apellido = "";
  $cedula = "";
  $correo = "";
  $cargo = "";
  $contrasena = "";
  $recontrasena = "";
  $rol = "Member";

  if (isset($_POST['submit'])) {
      //Obtener los valores del formulario
      $nombre = filter_input(INPUT_POST, 'nombre');
      $apellido = filter_input(INPUT_POST, 'apellido');
      $cedula = filter_input(INPUT_POST, 'cedula');
      $correo = filter_input(INPUT_POST, 'correo');
      $cargo = filter_input(INPUT_POST, 'cargo');
      $contrasena = password_hash(filter_input(INPUT_POST, 'contrasena'), PASSWORD_DEFAULT);
      $recontrasena = password_hash(filter_input(INPUT_POST, 'contrasenaverify'), PASSWORD_DEFAULT);
      //Manejo de errores del formulario
      if (empty($nombre)) {
          array_push($errores, "Se requiere su nombre");
      }
      if (empty($apellido)) {
          array_push($errores, "Se requiere su apellido");
      }
      if (empty($cedula)) {
          array_push($errores, "Se requiere su Cedula!");
      }
      if (empty($cargo)) {
          array_push($errores, "Ingrese su cargo");
      }
      if (empty($contrasena)) {
          array_push($errores, "Ingrese su contraseña");
      }
      if (empty($recontrasena)) {
          array_push($errores, "Se requiere que verifique su contraseña");
      }
      //Si no hay errores se registra normalmente al usuario.
      if (count($errores) == 0) {
          try {
              $sql = "INSERT INTO usuarios(nombre, apellido, cedula, correo, clave,
           rol, cargo) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$recontrasena',
           '$rol', '$cargo');";
              $resultado = $conn->query($sql);
              //Al momento en que se inserten los datos mostrara un alerta con un mensaje!
              echo '<script language="javascript">';
              echo 'alert("Registrado con exito!");';
              echo 'window.location.href="../SeccionAdmin/AgregarPersonal.php"';
              echo '</script>';
          } catch (Exception $ex) {
              echo '<script language="javascript">';
              echo 'alert(' . $ex->getMessage() . ')';
              echo '</script>';
          }
      } else { //Si los textbox del formulario estan vacios enviara este error universal
          array_push($errores, "No ha ingresado ningun dato!");
      }
  }
  /*//Actualizar informacion, Se necesita llenar 
  if(isset($_POST['Actualiar'])){
    //Obtener los valores del formulario
      $nombre = filter_input(INPUT_POST, 'nombre');
      $apellido = filter_input(INPUT_POST, 'apellido');
      $cedula = filter_input(INPUT_POST, 'cedula');
      $correo = filter_input(INPUT_POST, 'correo');
      $cargo = filter_input(INPUT_POST, 'cargo');
      $contrasena = password_hash(filter_input(INPUT_POST, 'contrasena'), PASSWORD_DEFAULT);
      $recontrasena = password_hash(filter_input(INPUT_POST, 'contrasenaverify'), PASSWORD_DEFAULT);
      //Manejo de errores del formulario
      if (empty($nombre)) {
          array_push($errores, "Se requiere su nombre");
      }
      if (empty($apellido)) {
          array_push($errores, "Se requiere su apellido");
      }
      if (empty($cedula)) {
          array_push($errores, "Se requiere su Cedula!");
      }
      if (empty($cargo)) {
          array_push($errores, "Ingrese su cargo");
      }
      if (empty($contrasena)) {
          array_push($errores, "Ingrese su contraseña");
      }
      if (empty($recontrasena)) {
          array_push($errores, "Se requiere que verifique su contraseña");
      }
      //Si no hay errores se registra normalmente al usuario.
      if(count($errores) == 0){
        try {

        } catch (Exception $e) {
          throw $e->getMessage();
        }
      }
  }*/

  if (isset($_POST['Eliminar'])) {
      //Obtener los valores del formulario
      $cedula = filter_input(INPUT_POST, 'cedula');
      //Manejo de errores del formulario
      if (empty($cedula)) {
          array_push($errores, "Se requiere su Cedula!");
      }
      //Si no hay errores se registra normalmente al usuario.
      if (count($errores) == 0) {
          try {

              $sql = "DELETE FROM usuarios WHERE cedula = '" . $cedula . "';";

              if($conn->query($sql)){
                //Al momento en que se inserten los datos mostrara un alerta con un mensaje!
                echo '<script language="javascript">';
                echo 'alert("Eliminado con exito!");';
                echo 'window.location.href="../SeccionAdmin/AgregarPersonal.php"';
                echo '</script>';
              }
          } catch (Exception $ex) {
              echo '<script language="javascript">';
              echo 'alert("Ocurrio un error al internet eliminar este usuario")';
              echo '</script>';
              console.log($ex->getMessage());
          }
      } 
  }
  $conn->close();
?>