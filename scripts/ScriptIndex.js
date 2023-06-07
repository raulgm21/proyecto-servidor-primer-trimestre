// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //
// **************************************************** MANEJADOR DE EVENTOS **************************************************** //
// ****************************************************************************************************************************** //
// ****************************************************************************************************************************** //

  window.onload = function (){

      // --- APARTADO DE FORMULARIO --- //
      document.getElementById('nombre').addEventListener('click',borrarErrores,false);       
      document.getElementById('contra').addEventListener('click',borrarErrores,false);   
                    
      // --- APARTADO DE COOKIES --- //
      setTimeout(mostrar, 1500);
      document.getElementById('aceptarCookie').addEventListener('click',cerrar);            
      document.getElementById('denegarCookie').addEventListener('click',cerrar);  
           
      // --- OLVIDAR CONTRASEÑA --- //
      document.getElementById('cambiarContra').addEventListener('click',cambiarContra);     
      document.getElementById('cambiarAtras').addEventListener('click',cerrarContra);      
      
      // --- REGISTRAR --- //
      document.getElementById('registrarBoton').addEventListener('click',mostrarRegistrar);   
      document.getElementById('cerrarRegistrar').addEventListener('click',cerrarRegistrar); 

      // --- RGPD - DATOS --- //
      document.getElementById('datos').addEventListener('click',mostrarPrivacidad,false);       
      document.getElementById('volverA').addEventListener('click',cerrarPrivacidad,false);    
  
      // --- RGPD - AVISO --- //
      document.getElementById('avisoPulsa').addEventListener('click',mostrarAviso,false);       
      document.getElementById('volverP').addEventListener('click',cerrarAviso,false);  

  }

// ******************************************************************************************************************** //
// **************************************************** FORMULARIO **************************************************** //
// ******************************************************************************************************************** //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN BORRAR ERRORES: Al hacer click en los input tanto nombre o contraseña, 
      se nos borrará el texto de los errores
    /--------------------------------------------------------------------------------*/

    function borrarErrores(){
    
        var textoError           = document.getElementById("errorTexto");       // Seleccionamos el <p> errores
        textoError.parentNode.removeChild(textoError);                          // Borramos el <p> errores
    }

// **************************************************************************************************************** //
// **************************************************** COOKIE **************************************************** //
// **************************************************************************************************************** //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN MOSTRAR: Muestra la ventana emergente de las cookies. Solo se muestra una
      vez a la hora de iniciar el INDEX de la página con un setTimeout del manejador de eventos.
    /--------------------------------------------------------------------------------*/
    function mostrar(){
      var URL = window.location;
      if(URL == "http://localhost/php/000%20PROYECTO%20PRIMER%20TRIMESTRE/PROYECTO%20SERVIDOR/"){
          window.modalCookie.showModal();
      }
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN CERRAR: Al hacer click en cualquiera de los botones nos cerrará la 
      ventana emergente.
    /--------------------------------------------------------------------------------*/
    function cerrar(){
        window.modalCookie.close();
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN CAMBIAR CONTRA: Muestra modal para cambiar la contraseña.
    /--------------------------------------------------------------------------------*/
    function cambiarContra(){
      window.cambiarContraModal.showModal();
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN CERRAR CONTRA : Cierra modal para cambiar la contraseña.
    /--------------------------------------------------------------------------------*/
    function cerrarContra(){
      window.cambiarContraModal.close();
    }

    /*--------------------------------------------------------------------------------/
     FUNCIÓN REGISTRAR MOSTRAR: Muestra modal para registrar.
    /--------------------------------------------------------------------------------*/
    function mostrarRegistrar(){
      window.modalRegistrar.showModal();
    }

    /*--------------------------------------------------------------------------------/
     FUNCIÓN REGISTRAR CERRAR: Cierra modal para registrar.
    /--------------------------------------------------------------------------------*/
    function cerrarRegistrar(){
      window.modalRegistrar.close();
    }

    /*--------------------------------------------------------------------------------/
     FUNCIÓN PRIVACIDAD MOSTRAR: Muestra modal para privacidad.
    /--------------------------------------------------------------------------------*/
    function mostrarPrivacidad(){
          window.dialogPrivacidad.showModal();
    }

    /*--------------------------------------------------------------------------------/
     FUNCIÓN PRIVACIDAD CERRAR: Cierra modal para privacidad.
    /--------------------------------------------------------------------------------*/
    function cerrarPrivacidad(){
        window.dialogPrivacidad.close();
    }

    /*--------------------------------------------------------------------------------/
     FUNCIÓN AVISO MOSTRAR: Muestra modal para aviso.
    /--------------------------------------------------------------------------------*/
    function mostrarAviso(){
      window.dialogAviso.showModal();
    }

    /*--------------------------------------------------------------------------------/
     FUNCIÓN AVISO CERRAR: Cierra modal para aviso.
    /--------------------------------------------------------------------------------*/
    function cerrarAviso(){
      window.dialogAviso.close();
    }
