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
// **************************************************** FUNCIONES **************************************************** //
// ******************************************************************************************************************* //

    require_once 'funciones/funciones_extra.php';        // Nos interesa la función "filtrado"
    require_once 'funciones/funciones_usuario.php';
    require_once 'funciones/funciones_password.php';

// ******************************************************************************************************************* //
// **************************************************** VARIABLES **************************************************** //
// ******************************************************************************************************************* //

    $nombre  = filtrado($_POST['nombre']);
    $contra  = filtrado($_POST['contra']);
    $errores = "";
    $patron  = "/^[[:alnum:]]+$/";

// ******************************************************************************************************************* //
// ******************************** COMPROBACIONES - PK, NOMBRE, CONTRASEÑA EN LA BDD ******************************** //
// ******************************************************************************************************************* //

    $valorprimaria = comprobarPK($nombre);
    $valornombre   = comprobarNombreBDD();

// ******************************************************************************************************************* //
// ************************************************ INTRODUCIR ADMIN ************************************************* //
// ******************************************************************************************************************* //

if (isset($_POST["iniciar"])){

    // Si no existe ningún error anteriormente empezará a comprobar el usuario y contraseña

    if(comprobar($nombre,$contra) == true){  // NO HAY NINGÚN ERROR

        // El usuario NO existe en la BDD por lo cual podrá ser creado

        if($valorprimaria == 0){    // EL USUARIO NO EXISTE

            $admin   = "si";        // Variable que hace que el usuario sea ADMINISTRADOR

            $encriptada = encriptar_password($contra);

            // --- mysqli_injection --- //

            $introduciradmin     = "INSERT INTO usuarios VALUES(?,?,?)";                 // Creamos Sentencia INSERT
            $sentencia            = $conn->prepare($introduciradmin);                    // Preparamos Sentencia INSERT
            $sentencia->bind_param("sss",$nombre,$encriptada,$admin);                    // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar .= "Algo no salío como se esperaba <br>";
                header("Location: CRUD/nuevoAdmin.php?error=$comprobar");

            }else{

                // Si el INSERT esta bien lo meterá.
                $errores .= "Administrador insertado <br>";
                header("Location: nuevoAdmin.php?error=$errores");
            }

        }
        else{
            // ERROR: El usuario ya existe en la BDD
            $errores .= "Ese usuario ya existe <br>";
            header("Location: nuevoAdmin.php?error=$errores");
        }

    }else{
        header("Location: nuevoAdmin.php?error=$errores");
    }
}


// ******************************************************************************************************************* //
// ************************************************* CAMBIAR CONTRA ************************************************** //
// ******************************************************************************************************************* //

if (isset($_POST["cambiarContra"])){

    // --- DECLARACIÓN DE VARIABLE --- //

    $nombre     = $_POST["nombreMod"];
    $contra     = $_POST["contraMod"];
    $contra2    = $_POST["contraMod2"];

    // --- COMPROBACIONES --- //
    $valorprimaria = comprobarPK($nombre); 
    $valoradmin    = comprobarAdmin($nombre);

    if($valorprimaria != 0){   //EL USUARIO EXISTE EN LA BASE DE DATOS.

        if(strlen($contra) > 7 && strlen($contra2) > 7){

            if($valoradmin != 0){

                if($contra == $contra2){

                    $encriptada = encriptar_password($contra);
                    $contraVieja = desencriptar_password($nombre);
        
                    // --- mysqli_injection --- //
        
                    $modificarcontra       = "UPDATE usuarios SET contra=(?) WHERE contra=(?)";   // Creamos Sentencia UPDATE
                    $sentencia            = $conn->prepare($modificarcontra);                    // Preparamos Sentencia UPDATE
                    $sentencia->bind_param("ss",$encriptada,$contraVieja);                               // Aplicamos bind y asignamos variables
        
                    if(!$sentencia->execute() || $sentencia->affected_rows != 1){                // Debe ejecutarse o solo AFECTAR a 1
        
                        // ERROR : SENTENCIA NO APROPIADA
                        $comprobar .= "Algo no salío como se esperaba <br>";
                        header("Location: nuevoAdmin.php?error=$errores");
        
                    }else{
                        //CONTRASEÑA MODIFICADA
                         $errores = "¡Contraseña Modificada!";
                        header("Location: nuevoAdmin.php?error=$errores");
                    }
        
                }else{
                    //Las contraseñas no coinciden
                    $errores = "Credenciales Inválidas";
                    header("Location: nuevoAdmin.php?error=$errores");
                }

            }else{
                //Las contraseñas no coinciden
                $errores = "Credenciales Inválidas us";
                header("Location: nuevoAdmin.php?error=$errores");
            }
            

        }else{
            //Las contraseñas no coinciden
            $errores = "Credenciales Inválidas";
            header("Location: nuevoAdmin.php?error=$errores");
        }
        

    }else{
        //El usuario NO existe en la BDD.
        $errores = "Credenciales Inválidas";
        header("Location: nuevoAdmin.php?error=$errores");
    }


}


?>