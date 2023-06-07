<?php

// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ************************************************* FUNCIONES USUARIO ************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR: Se encarga de comprobar los campos NOMBRE y CONTRASEÑA, si 
      existen y no están vacíos, y en caso del nombre solo contenga letras y en caso de 
      la contraseña que tenga una longitud mínima de 8 caracteres.
    /--------------------------------------------------------------------------------*/

    function comprobar($nom,$con)
    {

        // Variables Globales
        global $patron; 
        global $errores;

        // Variables Locales
        $fallo = "";

        // Comprobación del Nombre : Existe, No esta Vacía y solo hay caracteres: 

        if(isset($nom) && !empty($nom)){                              // Existe y no esta vacía NOMBRE       

            if(preg_match($patron, $nom)){                            // Solo pueden haber caracteres y números

                if(strlen($nom) <= 20){

                }else{$errores = "Credenciales Inválidas <br>";}

            }else{$errores = "Credenciales Inválidas <br>";}


        }else{$errores = "Credenciales Inválidas <br>";}

        // Comprobación de Contraseña: Existe, No esta Vacía y tiene mínimo 8 caracteres

        if(isset($con) && !empty($con)){                              // Existe y no esta vacía CONTRA
            
            if(strlen($con) > 7){                                     // Contraseña mínimo 8 caracteres

            }else{$errores= "Credenciales Inválidas <br>";}

        }else{$errores = "Credenciales Inválidas <br>";}

        // Guardamos los errores del ámbito glocal a fallos de ámbito local

        $fallos = $errores;

        // Comprobamos que existan o no errores: En caso de que no existan será TRUE, si existen será FALSE
        if(strlen($fallos) == 0){
            return true;
        }else{return false;}

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR PK: 
      Se encarga de comprobar que existe la clave primaria en nuestra Base de Datos.
    /--------------------------------------------------------------------------------*/

    function comprobarPK($nombre)
    {
        // Variables Globales
           
        global $conn;           // Variable del PHP conexionbase.php

        // ----- Comprobación de la PK - ¿Existe la PK en la BDD?
        $claveprimaria          = "SELECT COUNT(nombre) FROM usuarios WHERE nombre=('$nombre')";
        $consultaprimaria       = mysqli_query($conn,$claveprimaria);
        $valorprimaria          = "";

        // Sacamos el valor de la PK
        foreach($consultaprimaria as $variable){
            foreach($variable as $valor){
                $valorprimaria  = $valor;
            }
        }

        return $valorprimaria;
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR NOMBRE BDD: 
      Se encarga de comprobar que existe el nombre en nuestra Base de Datos.
    /--------------------------------------------------------------------------------*/

    function comprobarNombreBDD()
    {
        // Variables Globales
        global $nombre;     
        global $conn;           // Variable del PHP conexionbase.php

        // ----- Comprobación del Nombre - ¿Existe el nombre en la BDD?
        $cogernombre            = "SELECT nombre FROM usuarios WHERE nombre=('$nombre')";
        $consultanombre         = mysqli_query($conn,$cogernombre);
        $valornombre            = "";

        // Sacamos el valor del nombre de la BDD
        foreach($consultanombre as $variable){
            foreach($variable as $valor){
                $valornombre    = $valor;
            }
        }

        return $valornombre;
    }

    function comprobarAdmin()
    {
        // Variables Globales   
        global $nombre;
        global $conn;           // Variable del PHP conexionbase.php

        $cogerAdmin            = "SELECT COUNT(nombre) FROM usuarios WHERE nombre=('$nombre') AND admin='si'";
        $consultaAdmin         = mysqli_query($conn,$cogerAdmin);
        $valorAdmin            = "";

        foreach($consultaAdmin as $variable){
            foreach($variable as $valor){
                $valorAdmin    = $valor;
            }
        }
        
        return $valorAdmin;

    }
?>