$(document).ready(function(){
  var lista = document.getElementById('asunto');
  var asunto = document.getElementById('asunto_personal');

  //Al elejir un asunto seleccionable este lo escribe automaticamente en el textbox
  //de Asuntos
  lista.onchange = function(){
    asunto.value = lista.options[lista.selectedIndex].text;
  }
});
