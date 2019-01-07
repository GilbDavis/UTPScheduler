 //Espera a que el documento cargue para ejecutar el codigo
$(document).ready(function() {

  var lista = document.getElementById('correosmysql');
  var corr = document.getElementById('correos');
  //Al elejir un correo del selector este lo copia al textbox de correos
  lista.onchange = function() {
    corr.value += lista.options[lista.selectedIndex].text + ", ";
  }
});
