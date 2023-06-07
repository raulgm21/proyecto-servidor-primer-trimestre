<?php

// ******************************************************************************************************************** //
// ******************************************************************************************************************** //
// ******************************************************************************************************************** //
// ************************************************ FUNCIONES INSERTAR ************************************************ //
// ******************************************************************************************************************** //
// ******************************************************************************************************************** //
// ******************************************************************************************************************** //



// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************** INSERCCIÓN DE LIBROS ************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN INSERTAR LIBRO: Nos ejecuta la sentencia INSERT si no existe la PK
    /--------------------------------------------------------------------------------*/

    function insertarLibro($valorprimaria)
    {   
        // Variables Globales
        global $isbn;               global $genero;    
        global $titulo;             global $cantidad;
        global $autor;              global $conn;
        global $paginas;            global $comprobar;
        
        // No existe la clave primaria
        if($valorprimaria == 0){            

            // --- mysqli_injection --- //

            $introducirlibro     = "INSERT INTO libros VALUES(?,?,?,?,?,?)";                    // Creamos Sentencia INSERT
            $sentencia            = $conn->prepare($introducirlibro);                           // Preparamos Sentencia INSERT
            $sentencia->bind_param("sssisi",$isbn,$titulo,$autor,$paginas,$genero,$cantidad);   // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                       // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar .= "Algo no salío como se esperaba <br>";
                header("Location: CRUD/insertar.php?error=$comprobar");

            }else{   

                // INSERT esta bien: Lo meterá a la BDD.
                $comprobar .= "Libro Metido <br>";
                header("Location: CRUD/insertar.php?correcto=$comprobar");
                
            }

        }else{
            // ERROR : Ya existe el ISBN
            $comprobar .= "El ISBN ya existe <br>";
            header("Location: CRUD/insertar.php?error=$comprobar");
            
        }

    }

// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************** INSERCCIÓN DE PERSONA ************************************************ //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN INSERTAR PERSONA: Nos ejecuta la sentencia INSERT si no existe la PK, y
      nos la meterá en la tabla apropiada determinando del tipo de persona.
    /--------------------------------------------------------------------------------*/
    

    function insertarPersona($valorprimaria){

        global $dni;            global $conn;
        global $nombre;         global $comprobar;
        global $fecha;          

    // No existe la clave primaria
    if($valorprimaria == 0){            

            // --- mysqli_injection --- //

            $introducirautor     = "INSERT INTO autor VALUES(?,?,?)";                    // Creamos Sentencia INSERT
            $sentencia            = $conn->prepare($introducirautor);                    // Preparamos Sentencia INSERT
            $sentencia->bind_param("sss",$dni,$nombre,$fecha);                           // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar .= "Algo no salío como se esperaba <br>";
                header("Location: CRUD/insertar.php?error=$comprobar");

            }else{

                // INSERT esta bien: Lo meterá a la BDD.
                $comprobar .= "Autor Metido <br>";
                header("Location: CRUD/insertar.php?correcto=$comprobar");
            }                 
        
        }else{
            // ERROR : Ya existe el DNI
            $comprobar .= "El DNI de ya existe<br>";
            header("Location: CRUD/insertar.php?error=$comprobar");
        
        }

    }

?>