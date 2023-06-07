<?php

// ******************************************************************************************************************* //
// ********************************************* BASE DE DATOS CONEXIÓN ********************************************** //
// ******************************************************************************************************************* //  

    /*--------------------------------------------------------------------------------/
      Disponemos de un archivo PHP llamado "conexionbase.php", donde se encuentra 
      la creación y la conexión de nuestra base de datos "biblioteca".
    /--------------------------------------------------------------------------------*/

    require_once '../conexionbase.php';

// ******************************************************************************************************************* //
// ************************************************ INICIO DE SESIÓN ************************************************* //
// ******************************************************************************************************************* // 
    
    session_start();

// ******************************************************************************************************************* //
// ***************************************************  FUNCIONES **************************************************** //
// ******************************************************************************************************************* //   
    
    require_once '../admin/funciones/funciones_password.php';           // Recoges funciones de password

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// **************************************************** PRESTAMOS **************************************************** //
// ******************************************************************************************************************* //  
// ******************************************************************************************************************* //

if(isset($_POST['enviar'])){

// ******************************************************************************************************************* //
// ********************************************** RECOGIDA DE VARIABLES ********************************************** //
// ******************************************************************************************************************* //

    $isbn       = $_POST['isbn'];
    $nombre     = $_POST['nombre'];
    $fecha      = $_POST['fecha'];
    $fechadev   = $_POST['fechadev'];

// ******************************************************************************************************************* //
// *********************************************** COMPROBACIÓN FECHA  *********************************************** //
// ******************************************************************************************************************* //

    

    if($fechadev > $fecha){                 // La fecha de devolución es superior a la de hoy


        // IMPLEMENTAR LA DIFERENCIA DEL MES
        // $error = 0; /descomentar

        $fechaRecibida   = new DateTime($fechadev);
        $ahora           = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($fechaRecibida);

        if($diferencia->format("%m") < 1){

            $error = 0;
            

        }else{
            $error = 1;
            $comprobar  = "Su prestamo es superior a un mes. Porfavor, vuelva al inicio:";
            header("Location: usuario_prestamo.php?error=$comprobar");
        }
        

    }else{
        // ERROR: La fecha de devolución es inferior a la actual
        $error = 1;
        $comprobar  = "La fecha de devolución no puede ser inferior/igual a la actual. Porfavor, vuelva al inicio:";
        header("Location: usuario_prestamo.php?error=$comprobar");
    }

    // --- Prestamo --- //

if($error == 0){

// ******************************************************************************************************************* //
// ******************************************* RECOGER CANTIDAD DEL ISBN  ******************************************** //
// ******************************************************************************************************************* //

    $sacarCantidad      = "SELECT cantidad FROM libros WHERE isbn='$isbn'";
    $consultarCantidad  = mysqli_query($conn, $sacarCantidad);

    foreach($consultarCantidad as $variable){        
        foreach($variable as $valor){
          $cantidad  = $valor;   
        }
    }

if($cantidad != 0){
    $cantidad--;        // Reducimos en uno la cantidad

// ******************************************************************************************************************* //
// *********************************************** INSERTAR PRESTAMO  ************************************************ //
// ******************************************************************************************************************* //

$prestamo           = "INSERT INTO prestamo VALUES('$isbn','$nombre','$fecha','$fechadev')";
$meterPrestamo      = mysqli_query($conn,$prestamo);

// ******************************************************************************************************************* //
// ***************************************** ACTUALIZAR CANTIDAD DEL ISBN  ******************************************* //
// ******************************************************************************************************************* //

    $quitarCantidad     = "UPDATE libros SET cantidad='$cantidad' WHERE isbn='$isbn'";
    $consultar          = mysqli_query($conn,$quitarCantidad);


// ******************************************************************************************************************* //
// ********************************************** PRESTAMO REALIZADO  ************************************************ //
// ******************************************************************************************************************* //

    $comprobar  = "Su prestamo ha sido realizado. Porfavor, vuelva al inicio:";
    header("Location: usuario_prestamo.php?error=$comprobar");

}else{
    $comprobar  = "El libro ya no esta disponible, lo sentimos :(. Porfavor, vuelva al inicio:";
    header("Location: usuario_prestamo.php?error=$comprobar");
} // Llave IF cantidad

} // Llave IF error
} // Llave IF formulario

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ********************************************* MODIFICAR CONTRA PERFIL ********************************************* //
// ******************************************************************************************************************* //  
// ******************************************************************************************************************* //

if(isset($_POST['modificarPerfil'])){

// ******************************************************************************************************************* //
// ********************************************** RECOGIDA DE VARIABLES ********************************************** //
// ******************************************************************************************************************* //

    $nombre       = $_SESSION['usuario'];
    $contra       = $_POST['contraMod'];
    $contra2      = $_POST['contraMod2'];


    if(strlen($contra) > 7 && strlen($contra2) > 7){            // Tamaño de minimo 8 caracteres

            if($contra == $contra2){                            // Las contraseñas son iguales

                $encriptada = encriptar_password($contra);
                $contraVieja = desencriptar_password($nombre);
                
                // --- mysqli_injection --- //
    
                $modificarcontra       = "UPDATE usuarios SET contra=(?) WHERE contra=(?)";   // Creamos Sentencia UPDATE
                $sentencia             = $conn->prepare($modificarcontra);                    // Preparamos Sentencia UPDATE
                $sentencia->bind_param("ss",$encriptada,$contraVieja);                               // Aplicamos bind y asignamos variables
    
                if(!$sentencia->execute() || $sentencia->affected_rows != 1){                // Debe ejecutarse o solo AFECTAR a 1
    
                    // ERROR : SENTENCIA NO APROPIADA
                    $comprobar .= "Algo no salío como se esperaba <br>";
                    header("Location: usuario_perfil.php?error=$comprobar");
    
                }else{
                    //CONTRASEÑA MODIFICADA
                     $errores = "¡Contraseña Modificada!";
                    header("Location: usuario_perfil.php?error=$errores"); 
                }
    
            }else{
                //Las contraseñas no coinciden
                $errores = "Credenciales Inválidas";
                header("Location: usuario_perfil.php?error=$errores"); 
            }

    }else{
        //Las contraseñas no coinciden
        $errores = "Credenciales Inválidas";
        header("Location: usuario_perfil.php?error=$errores"); 
    }

}


// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ********************************************* ELIMINAR USUARIO PERFIL ********************************************* //
// ******************************************************************************************************************* //  
// ******************************************************************************************************************* //

if(isset($_GET['borrar'])){

    $nombre             = $_SESSION['usuario'];

// ******************************************************************************************************************* //
// ********************************************** BORRAR RECOMENDACIONES ********************************************* //
// ******************************************************************************************************************* //

    $recomendacion      = "DELETE FROM recomendaciones WHERE nombre='$nombre'";
    $consultarReco      = mysqli_query($conn,$recomendacion);


// ******************************************************************************************************************* //
// ********************************************** BORRAR RECOMENDACIONES ********************************************* //
// ******************************************************************************************************************* //

    $borrarPrestamo    = "DELETE FROM prestamo WHERE nombre='$nombre'";
    $consultarBorra    = mysqli_query($conn,$borrarPrestamo);


// ******************************************************************************************************************* //
// ************************************************ BORRAR EL USUARIO ************************************************ //
// ******************************************************************************************************************* //
    
    $eliminar         = "DELETE FROM usuarios WHERE nombre='$nombre'";

    session_destroy();
    
    if(mysqli_query($conn, $eliminar)){
    // Si el DELETE esta bien lo borrara.
    header("Location: ../index.php");
    }

}

?>