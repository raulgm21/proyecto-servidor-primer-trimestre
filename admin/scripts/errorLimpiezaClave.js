// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //
// **************************************************** MANEJADOR DE EVENTOS **************************************************** //
// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //

window.onload = function (){

    // --- Libro ---

    document.getElementById('isbn').addEventListener('click',borrarErroresLibro,false);  
    document.getElementById('isbnNuevo').addEventListener('click',borrarErroresLibro,false);

    // --- Persona ---

    document.getElementById('dni').addEventListener('click',borrarErroresPersona,false);
    document.getElementById('dniNuevo').addEventListener('click',borrarErroresPersona,false);

}


/*--------------------------------------------------------------------------------/
FUNCIÓN BORRAR ERRORES: Al hacer click en los input de ambos formularios, nos
borrará la sección de errores y la sección de correcto.
/--------------------------------------------------------------------------------*/

function borrarErroresLibro(){
var textoError           = document.getElementById("errorTexto");       // Seleccionamos el <p> errores
textoError.parentNode.removeChild(textoError);                          // Borramos el <p> errores


}

/*--------------------------------------------------------------------------------/
FUNCIÓN BORRAR ERRORES: Al hacer click en los input de ambos formularios, nos
borrará la sección de errores y la sección de correcto.
/--------------------------------------------------------------------------------*/

function borrarErroresPersona(){
    var textoError           = document.getElementById("errorTexto");       // Seleccionamos el <p> errores
    textoError.parentNode.removeChild(textoError);                          // Borramos el <p> errores
    
    
}
