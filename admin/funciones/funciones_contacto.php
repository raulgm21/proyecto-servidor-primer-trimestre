<?php           session_start();

// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ************************************************ FUNCIONES CONTACTO ************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
    
    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR CONTACTO: Comprueba los diferentes valores recibidos del
      formulario para comprobar que no exista ningún fallos en los valores.
    /--------------------------------------------------------------------------------*/

    function comprobarContacto($nombre,$recomendacion,$estrella){

        global $errores;        
        global $anonimo;

        // --- Comprobación del Nombre --- //

        if(isset($nombre)){                                         // Existe la variable

            if(empty($nombre)){                                     // Si esta vacio el nombre, nos pondrá ANONIMO
                $anonimo = "ANONIMO";
            }else{
                $nombre = $_SESSION['usuario'];
            } 
        }

        // --- Comprobación del Recomendacion --- //

        if(isset($recomendacion) && !empty($recomendacion)){        // Existe y no esta vacía

        }else{$errores = "Credenciales Invalidas";}

        // --- Comprobación del Estrella --- //

        if(isset($estrella) && !empty($estrella)){                  // Existe y no esta vacía

        }else{$errores = "Credenciales Invalidas";}

        // Comprobamos que existan o no errores: En caso de que no existan será TRUE, si existen será FALSE
        if(strlen($errores) == 0){
            return true;
        }else{return false;}

    }

     /*--------------------------------------------------------------------------------/
      FUNCIÓN INSERTAR RECOMENDACION: Inserta la recomendacion una vez comprobada. En caso
      que sea anonima, el nombre será guardado con ANONIMO. Mientras que si tiene nombre,
      deberá de existir en la tabla USUARIOS.
    /--------------------------------------------------------------------------------*/

    function insertarRecomendacion($nombre,$recomendacion,$estrella){

        global $errores;
        global $anonimo;
        global $conn;           // Variable de conexionbase.php

        if($anonimo == "ANONIMO"){

            // --- mysqli_injection --- //

            $introducirrecomendaciones     = "INSERT INTO recomendaciones VALUES(?,?,?)";      // Creamos Sentencia INSERT
            $sentencia            = $conn->prepare($introducirrecomendaciones);                 // Preparamos Sentencia INSERT
            $sentencia->bind_param("sss",$anonimo,$recomendacion,$estrella);                    // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                       // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar .= "Algo no salío como se esperaba <br>";
                header("Location: CRUD/contacto.php?error=$comprobar");

            }else{

                // Si el INSERT esta bien lo meterá.
                $errores = "¡Recomendación mandada con éxito! <br>";
                header("Location: contacto.php?error=$errores");
            }

        }else{

            $nombre = $_SESSION['usuario'];
            
            // --- mysqli_injection --- //

            $introducirrecomendaciones     = "INSERT INTO recomendaciones VALUES(?,?,?)";      // Creamos Sentencia INSERT
            $sentencia            = $conn->prepare($introducirrecomendaciones);                 // Preparamos Sentencia INSERT
            $sentencia->bind_param("sss",$nombre,$recomendacion,$estrella);                    // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                       // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar .= "Algo no salío como se esperaba <br>";
                header("Location: CRUD/contacto.php?error=$comprobar");

            }else{

                // Si el INSERT esta bien lo meterá.
                $errores = "¡Recomendación mandada con éxito! <br>";
                header("Location: contacto.php?error=$errores");
            }

        }       

    }
?>