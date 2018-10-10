function checkPasswordMatch() {
  var password = $("#contra").val();
  var confirmPassword = $("#recontra").val();

  if (password != confirmPassword)
    $("#checkpassword").html("La contraseña no coincide!");
  else
    $("#checkpassword").html("La contraseña coincide!");
}

$(document).ready(function() {
  $("#contra",
    "#recontra").keyup(checkPasswordMatch);
});
