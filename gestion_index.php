<?php
// ******************************************************************************************************************* //
// *********************************************** INICIO DE SESIONES ************************************************ //
// ******************************************************************************************************************* // 

    /*--------------------------------------------------------------------------------/
      Creación inicial de la sesión de la aplicación web. Esta sesión cuenta con dos
      ficheros que las complementa que se encuentra en el directorio "sesiones".
        -> comprobar_sesion.php             (Donde se encontrará en los ficheros que requieran sesión)
        -> cerrar_sesion.php                (Donde se encontrará en los ficheros que requieran cerrar sesión)
    /--------------------------------------------------------------------------------*/

        session_start();

// ******************************************************************************************************************* //
// ********************************************* BASE DE DATOS CONEXIÓN ********************************************** //
// ******************************************************************************************************************* //       

    /*--------------------------------------------------------------------------------/
      Disponemos de un archivo PHP llamado "conexionbase.php", donde se encuentra 
      la creación y la conexión de nuestra base de datos "biblioteca".
    /--------------------------------------------------------------------------------*/

        require_once 'conexionbase.php';

// ******************************************************************************************************************* //
// **************************************************** FUNCIONES **************************************************** //
// ******************************************************************************************************************* //

        require_once 'admin/funciones/funciones_extra.php';        // Nos interesa la función "filtado"   
        require_once 'admin/funciones/funciones_usuario.php';
        require_once 'admin/funciones/funciones_password.php';

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
// ************************************************* INICIAR SESIÓN ************************************************** //
// ******************************************************************************************************************* //

if (isset($_POST["iniciar"])){

    comprobar($nombre,$contra);
    // Si no existe ningún error anteriormente empezará a comprobar el usuario y contraseña
   
    if($errores != 0){          // NO HAY NINGÚN ERROR

        // Nos comprobara que exista el nombre con la PK que usamos anteriormente, si la PK es 0, significa que no existe.

        if($valorprimaria != 0){    //EL USUARIO EXISTE EN LA BASE DE DATOS.

            // Comprobamos que el nombre escrito en formulario sea igual que el nombre estraido de la BDD.

            if($nombre == $valornombre){    // EL NOMBRE COINCIDE CON EL NOMBRE EXTRAIDO DE LA BDD.
                
                // Comprobamos que la contraseña escrita en formulario sea igual que la contraseña encriptada de la BDD.

                    $contrahash = desencriptar_password($nombre);

                    if (password_verify($contra, $contrahash)){
                        
                        // El usuario y contraseña es correcta pero el acceso se divira si es: admin u otro usuario.

                        if(comprobarAdmin($nombre) == 1){                   // 1. ES ADMINISTRADOR

                            // Accedemos a la página como administrador con nombre y contraseña establecidas en la BDD

                            // ***** INICIAMOS LA SESIÓN ***** //

                            $_SESSION['usuario'] = $nombre;
                            $_SESSION['tipo']    = "si";
                            header("Location: admin/index_admin.php");
                        }else{                                              // 2. ES USUARIO

                            // Accedemos a la página como usuario con nombre y contraseña establecidas en la BDD.

                            // ***** INICIAMOS LA SESIÓN ***** //

                            $_SESSION['usuario'] = $nombre;
                            $_SESSION['tipo']    = "no";
                            header("Location: usuario/index_usuario.php");
                        }
                        
                }else{
                    // ERROR: Cuando la contraseña no coincide con el hash
                    $errores = "Credenciales Invalidas <br>";
                    header("Location: index.php?error=$errores");
                }
                

            }else{
            
                // ERROR: Cuando el nombre no concuerda con la BDD.
                $errores = "Credenciales Inválidas <br>";
                header("Location: index.php?error=$errores");
            }
            
        
        }else{
            
            //El usuario NO existe en la BDD.
            $errores = "Credenciales Inválidas";
            header("Location: index.php?error=$errores");    
        }
        
    }

}

// ******************************************************************************************************************* //
// **************************************************** REGISTRAR **************************************************** //
// ******************************************************************************************************************* //

if (isset($_POST["registrar"])){

    $contra2  = filtrado($_POST['contra2']);        // Recoge la contraseña repetida

    // Si no existe ningún error anteriormente empezará a comprobar el usuario y contraseña
    
    if(comprobar($nombre,$contra) == true){  // NO HAY NINGÚN ERROR

        // El usuario NO existe en la BDD por lo cual podrá ser creado

        if($contra == $contra2){        // LAS CONTRASEÑAS DEBEN DE SER IGUALES

            if($valorprimaria == 0){    // EL USUARIO NO EXISTE

                // Comprueba que la contraseña tenga mínimo 8 caracteres
                // Encriptamos la contraseña
                $encriptada = encriptar_password($contra);

                // --- mysqli_injection --- //

                $introducirusuario     = "INSERT INTO usuarios VALUES(?,?,'no')";       // Creamos Sentencia INSERT
                $sentencia            = $conn->prepare($introducirusuario);               // Preparamos Sentencia INSERT
                $sentencia->bind_param("ss",$nombre,$encriptada);                         // Aplicamos bind y asignamos variables

                if(!$sentencia->execute() || $sentencia->affected_rows != 1){             // Debe ejecutarse o solo AFECTAR a 1

                    // ERROR : SENTENCIA NO APROPIADA
                    $comprobar .= "Algo no salío como se esperaba <br>";
                    header("Location: CRUD/index.php?error=$comprobar");

                }else{

                    // Si el INSERT esta bien lo meterá.
                    $errores .= "Usuario metido <br>";
                    header("Location: index.php?error=$errores");

                }


            }
            else{
                // ERROR: El usuario ya existe en la BDD
                $errores .= "Credenciales Inválidas <br>";
                header("Location: index.php?error=$errores");
            }

        }else{
            // ERROR: Las contraseñas no coinciden
            $errores .= "Credenciales Inválidas<br>";
            header("Location: index.php?error=$errores");
        }

    }else{
        header("Location: index.php?error=$errores");
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

            if($valoradmin == 0){

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
                        header("Location: index.php?error=$comprobar");
        
                    }else{
                        //CONTRASEÑA MODIFICADA
                         $errores = "¡Contraseña Modificada!";
                        header("Location: index.php?error=$errores"); 
                    }
        
                }else{
                    //Las contraseñas no coinciden
                    $errores = "Credenciales Inválidas";
                    header("Location: index.php?error=$errores"); 
                }

            }else{
                //Las contraseñas no coinciden
                $errores = "Credenciales Inválidas";
                header("Location: index.php?error=$errores"); 
            }
            

        }else{
            //Las contraseñas no coinciden
            $errores = "Credenciales Inválidas";
            header("Location: index.php?error=$errores"); 
        }
        

    }else{
        //El usuario NO existe en la BDD.
        $errores = "Credenciales Inválidas";
        header("Location: index.php?error=$errores"); 
    }


}







?>