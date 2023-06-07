// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //
// **************************************************** MANEJADOR DE EVENTOS **************************************************** //
// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //

window.onload = function (){

   
    document.getElementById('nombre').addEventListener('click',borrarErrores,false); 
    document.getElementById('contra').addEventListener('click',borrarErrores,false);        
    


}


/*--------------------------------------------------------------------------------/
FUNCIÓN BORRAR ERRORES: Al hacer click en los input de ambos formularios, nos
borrará la sección de errores y la sección de correcto.
/--------------------------------------------------------------------------------*/

function borrarErrores(){
var textoError           = document.getElementById("errorTexto");       // Seleccionamos el <p> errores
textoError.parentNode.removeChild(textoError);                          // Borramos el <p> errores
     
}
