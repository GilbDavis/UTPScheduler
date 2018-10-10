<?php
  include 'Connection.php';

  $nombre = "Gilberto";
  $apellido = "Davis";
  $cedula = "1-741-815";
  $correo = "peter01@hotmail.es";
  $cargo = "Programador";
  $contrasena = "0631212";
  $hash_contra = password_hash($contrasena, PASSWORD_DEFAULT);
  $rol = "Admin";

  try{
  $sql = "INSERT INTO usuarios(nombre, apellido, cedula, correo, clave,
     rol, cargo) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$hash_contra',
     '$rol', '$cargo');";
     $resultado = $conn->query($sql);
   }catch (Exception $ex){
     $ex->getMessage();
   }
 ?>
