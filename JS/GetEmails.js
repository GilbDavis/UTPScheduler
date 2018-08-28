/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var lista = document.getElementById('correosmysql');
    var corr = document.getElementById('correos');
    
    lista.onchange = function(){
        corr.value += " " + lista.options[lista.selectedIndex].text;
    }
});

