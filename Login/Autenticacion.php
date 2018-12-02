<?php
  //Se incluye la conexion a la base de datos
  require 'Conexion/Connection.php';
  //Se definen las varias a utilizar
  //el arreglo errors tendra los errores que va a manejar la autenticacion
  $errors = array();
  $cedula = "";
  $contrasena = "";
  //Si haces click al boton submit se activa el If
  if (isset($_POST['submit'])) {
      //Se obtienen los datos del formulario del login y se guardan en sus variables
      $cedula = filter_input(INPUT_POST, 'cedula');
      $contrasena = filter_input(INPUT_POST, 'contrasena');
      //Se inicia el manejo de errores segun lo obtenido del formulario
      if (empty($cedula)) {
          array_push($errors, "Se requiere su Cedula");
      }
      if (empty($contrasena)) {
          array_push($errors, "Se requiere su contraseña");
      }
      if (count($errors) == 0) {
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
          //En esta condicion se verifica si las contraseñas coinciden
          if (password_verify($contrasena, $contraup)) {
            //Si estas concuerdan se consultan los datos del usuario para inicializar las variables de sesion
              $sql = "SELECT id_usuario, nombre, apellido, cedula, clave, rol, cargo, correo FROM Usuarios WHERE"
                    . " cedula = '$cedula' AND clave = '$contraup'";
              $resultado = $conn->query($sql);
              $row = $resultado->fetch_assoc();

              if ($resultado->num_rows > 0) {
                  //Si la consulta retorna 1 valor iniciara la sesion e iniciará las variables de sesion
                  //Se inicializan las variables de sesion y se redirecciona al menu del administrador
                  if ($row['rol'] == 'Admin') {
                      session_start();
                      $_SESSION['user_id'] = $row['id_usuario'];
                      $_SESSION['user_ced'] = $row['cedula'];
                      $_SESSION['user_nom'] = $row['nombre'];
                      $_SESSION['user_ape'] = $row['apellido'];
                      $_SESSION['user_corr'] = $row['correo'];
                      $_SESSION['user_cargo'] = $row['cargo'];
                      $_SESSION['user_rol'] = $row['rol'];
                      header('Location: SeccionAdmin/AdminMenu.php');
                  } else {
                      //El mismo procedimiento pero se redireccion al menu del Personal
                      if ($row['rol'] == 'Member') {
                          session_start();
                          $_SESSION['user_id'] = $row['id_usuario'];
                          $_SESSION['user_ced'] = $row['cedula'];
                          $_SESSION['user_nom'] = $row['nombre'];
                          $_SESSION['user_ape'] = $row['apellido'];
                          $_SESSION['user_corr'] = $row['correo'];
                          $_SESSION['user_cargo'] = $row['cargo'];
                          $_SESSION['user_rol'] = $row['rol'];
                          header('Location: SeccionMember/MemberMenu.php');
                      }
                  }
              }
              $conn->close();
              $row->close();
          } else {
              //Si las contraseñas no coinciden o la cedula no coincide se enviara este error
              array_push($errors, "La cedula/contraseña son invalidos");
          }
      }
  }
