// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //
// **************************************************** MANEJADOR DE EVENTOS **************************************************** //
// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //

window.onload = function (){
 
    // --- OLVIDAR CONTRASEÑA --- //
    document.getElementById('cambiarContraTexto').addEventListener('click',cambiarContra);     
    document.getElementById('cambiarAtras').addEventListener('click',cerrarContra);        

}

function cambiarContra(){
    window.cambiarContraModal.showModal();
  }

  function cerrarContra(){
    window.cambiarContraModal.close();
  }