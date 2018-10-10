for (var i = 0; i < document.links.length; i++) {
  if (document.links[i].href == document.URL) {
    document.links[i].className = 'active';
  } else {
    document.links[0].className = 'active';
  }
}
