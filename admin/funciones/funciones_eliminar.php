<?php

// ******************************************************************************************************************** //
// ******************************************************************************************************************** //
// ******************************************************************************************************************** //
// ************************************************ FUNCIONES ELIMINAR ************************************************ //
// ******************************************************************************************************************** //
// ******************************************************************************************************************** //
// ******************************************************************************************************************** //


// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************** ELIMINACIÓN DE LIBROS ************************************************ //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN BORRAR UN LIBRO: Elimina el libro que le digamos mediante ISBB, comprobará 
      que el ISBN existe, y si es así, borrara el Libro.
    /--------------------------------------------------------------------------------*/

    function borrarUnLibro($valorprimaria,$isbn)
    {
        global $comprobar;
        global $conn;           // Variable del PHP conexionbase.php

        // Existe la clave primaria
        if($valorprimaria != 0){

            if (isset($_POST["submitBorraLibros"])){

                // --- mysqli_injection --- //

                $borrarlibro          = "DELETE FROM libros WHERE isbn=(?)";        // Creamos Sentencia DELETE
                $sentencia            = $conn->prepare($borrarlibro);               // Preparamos Sentencia DELETE
                $sentencia->bind_param("s",$isbn);                                  // Aplicamos bind y asignamos variables

                if(!$sentencia->execute() || $sentencia->affected_rows != 1){       // Debe ejecutarse o solo AFECTAR a 1

                    // ERROR : SENTENCIA NO APROPIADA
                    $comprobar .= "Algo no salío como se esperaba <br>";
                    header("Location: CRUD/eliminar.php?error=$comprobar");

                }else{

                    // Borrar ISBN del Prestamo
                    $borrarPrestamo      = "DELETE FROM prestamo WHERE isbn='$isbn'";
                    $sentenciaPrestamo   = mysqli_query($conn,$borrarPrestamo);

                    // Si el DELETE esta bien lo borrara.
                    $comprobar .= "Libro Borrado <br>";
                    header("Location: CRUD/eliminar.php?correcto=$comprobar");

                }                

            }

            // CRUD GLOBAL ELIMINAR
            
            if(isset($_POST["textoBorrar"])){

                $borrarPrestamo   = "DELETE FROM prestamo WHERE isbn='$isbn'";
                $consulaPrestamo  = mysqli_query($conn,$borrarPrestamo);

                $borrarlibro      = "DELETE FROM libros WHERE isbn='$isbn'";
                
                if(mysqli_query($conn, $borrarlibro)){
        
                    // Si el DELETE esta bien lo borrara.
                    header("Location: CRUD/global_libros.php");
                }
                
            }

        }else{
            // ERROR : No existe el ISBN
            $comprobar .= "El ISBN no existe <br>";
            header("Location: CRUD/eliminar.php?error=$comprobar");
            
        }
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN BORRAR TODOS LIBRO: Elimina todos los libros de la base de datos.
    /--------------------------------------------------------------------------------*/

    function borrarTodosLibro()
    {
        global $comprobar;
        global $conn;           // Variable del PHP conexionbase.php

        if (isset($_POST["submitBorraLibrosTodo"])){


            $borrarPrestamo   = "DELETE FROM prestamo";
            $consulaPrestamo  = mysqli_query($conn,$borrarPrestamo);


            $borrarlibro      = "DELETE FROM libros";
            if(mysqli_query($conn, $borrarlibro)){
    
                // Si el DELETE esta bien lo borrara.
                $comprobar .= "Todos los libros han sido borrados <br>";
                header("Location: CRUD/eliminar.php?correcto=$comprobar");

            }else {
                // Error a la hora de meter el DELETE.
                $comprobar .= "Fallo al borrar todos los libros <br>";
                header("Location: CRUD/eliminar.php?correcto=$comprobar");
            }

        }

    }


// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************** ELIMINACIÓN DE PERSONA *********************************************** //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN BORRAR AUTOR: Elimina el autor que le digamos mediante DNI, comprobará 
      que el DNI existe, y si es así, borrara el Autor.
    /--------------------------------------------------------------------------------*/

    function borrarAutor($valorprimaria,$dni)
    {
        global $comprobar;
        global $conn;               // Variable del PHP conexionbase.php

        // Existe la clave primaria

        if($valorprimaria != 0){

            if (isset($_POST["submitBorraPersona"])){

                // --- mysqli_injection --- //

                $borrarautor          = "DELETE FROM autor WHERE dni=(?)";          // Creamos Sentencia DELETE
                $sentencia            = $conn->prepare($borrarautor);               // Preparamos Sentencia DELETE
                $sentencia->bind_param("s",$dni);                                   // Aplicamos bind y asignamos variables

                if(!$sentencia->execute() || $sentencia->affected_rows != 1){       // Debe ejecutarse o solo AFECTAR a 1

                    // ERROR : SENTENCIA NO APROPIADA
                    $comprobar .= "Algo no salío como se esperaba <br>";
                    header("Location: CRUD/eliminar.php?error=$comprobar");

                }else{

          
                    // Borramos el Autor en los Libros que tenga DEPENDENCIA
                 

                    $borrarAutorLibro   = "UPDATE libros SET dni_autor=null WHERE dni_autor='$dni'";
                
                    if(mysqli_query($conn, $borrarAutorLibro)){
        
                        // Si el DELETE esta bien lo borrara.
                        $comprobar .= "Autor Borrado <br>";
                        header("Location: CRUD/eliminar.php?correcto=$comprobar");
        
                    }
                   
                }

            }

            // CRUD GLOBAL ELIMINAR
            
            if(isset($_POST["autorBorrar"])){


                $borrarpersona      = "DELETE FROM autor WHERE dni='$dni'";
                $borrarAutorLibro   = "UPDATE libros SET dni_autor=null WHERE dni_autor='$dni'";

                if(mysqli_query($conn, $borrarAutorLibro) && mysqli_query($conn, $borrarpersona)){
        
                    // Si el DELETE esta bien lo borrara.
                    header("Location: CRUD/global_autor.php");
                }
                

            }
            
        }else{
            // ERROR : No existe el DNI
            $comprobar .= "El Autor no existe <br>" ;
            header("Location: CRUD/eliminar.php?error=$comprobar");
        }

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN BORRAR TODO AUTOR: Eliminara a todos los AUTORES de la Base de Datos
    /--------------------------------------------------------------------------------*/

    function borrarTodoAutor()
    {
        global $comprobar;
        global $conn;           // Variable del PHP conexionbase.php

        if (isset($_POST["submitBorraPersonaTodo"])){

            $borrarpersona      = "DELETE FROM autor";

            if(mysqli_query($conn, $borrarpersona)){
    
                // Si el DELETE esta bien lo borrara.
                $comprobar .= "Todos los autores han sido borrados <br>";
                header("Location: CRUD/eliminar.php?correcto=$comprobar");

            }else {
                // Error a la hora de meter el DELETE.
                $comprobar .= "Fallo al borrar todos los autores <br>";
                header("Location: CRUD/eliminar.php?correcto=$comprobar");
            }

        }
    }

?>