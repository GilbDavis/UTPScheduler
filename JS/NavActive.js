//Este codigo es para agregar la clase active al elemento  del header
//para remarcar en seccion se encuentra
//P.D: Por implementar, mientras se ha omitido por falta de necesidad
for (var i = 0; i < document.links.length; i++) {
  if (document.links[i].href == document.URL) {
    document.links[i].className = 'active';
  } else {
    document.links[0].className = 'active';
  }
}