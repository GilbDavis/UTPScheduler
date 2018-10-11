//Funcion para validar si la contraseña en los 2 campos coinciden
function checkPasswordMatch() {
  var password = $("#contra").val();
  var confirmPassword = $("#recontra").val();

  if (password != confirmPassword)
    $("#checkpassword").html("La contraseña no coincide!");
  else
    $("#checkpassword").html("La contraseña coincide!");
}
//Con jquery espera a que la pagina se cargue completamente para cargar el codigo JS
$(document).ready(function() {
  $("#contra",
    "#recontra").keyup(checkPasswordMatch);
});
