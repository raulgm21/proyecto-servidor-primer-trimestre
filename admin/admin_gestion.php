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


    /*--------------------------------------------------------------------------------/
      Las funciones están creadas en diferentes ficheros según la funcionalidad de
      estas a la hora de su uso.
    /--------------------------------------------------------------------------------*/

        require_once 'funciones/funciones_comprobar.php';
        require_once 'funciones/funciones_insertar.php';
        require_once 'funciones/funciones_extra.php';
        require_once 'funciones/funciones_eliminar.php';
        require_once 'funciones/funciones_consultar.php';
        require_once 'funciones/funciones_modificar.php';


// ******************************************************************************************************************* //
// **************************************************** VARIABLES **************************************************** //
// ******************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      Variables estándar para facilitar a los demás procesos del trabajo.
    /--------------------------------------------------------------------------------*/

        $comprobar          = "";
        $patronNum          = "/^[[:digit:]]+$/";
        $patronNoSimbolos   = "/^[[:alnum:]]+$/";
        $patronLetras       = "/(^$)|[a-zA-Z]/";
        $conAutor           = "";
        $sinAutor           = "";


// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ************************************************** INSERTAR LIBRO ************************************************* //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if (isset($_POST["submitLibros"])){

    // ************ VARIABLES - DECLARACIÓN ************ // 

    $isbn           = filtrado($_POST['isbn']);
    $titulo         = filtrado($_POST['titulo']);
    $autor          = filtrado($_POST['autor']);
    $paginas        = filtrado($_POST['paginas']);
    $genero         = filtrado($_POST['genero']);
    $cantidad       = filtrado($_POST['cantidad']);

    // ************ VARIABLES - COMPROBACIÓN ************ //

    $valorPKLibros  = comprobarLibrosPK($isbn);
    $valorautor     = comprobarAutorPK($autor);

    // Comprobamos que no exista ningún error mediante la función comprobarInsertarLibro

    if(comprobarInsertarLibro($isbn,$titulo,$autor,$paginas,$genero,$cantidad) == true){

        // OPCIÓN: Hay un autor escrito.

        if($conAutor == 1){

            if($valorautor != 0){       //El autor existe 

                $autor = actualizaDNI($autor);                          

                insertarLibro($valorPKLibros);

            }else{
                // ERROR : El autor NO existe
                $comprobar .= "No existe el autor";
                header("Location: CRUD/insertar.php?error=$comprobar");
            }

        }
        // OPCIÓN: No hay un autor escrito.

        if($sinAutor == 1){
            insertarLibro($valorPKLibros);
        }

    }else{

        // ERROR : Comprobación en conjunto
        header("Location: CRUD/insertar.php?error=$comprobar");

    }

}

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ************************************************* INSERTAR PERSONA ************************************************ //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if (isset($_POST["submitPersona"])){

    // ************ VARIABLES - DECLARACIÓN  ************ //

    $dni            = filtrado($_POST['dni']);
    $nombre         = filtrado($_POST['nombre']);
    $fecha          = filtrado($_POST['fecha']);

    if(comprobarInsertarPersona($dni,$nombre,$fecha) == true){

    // ************ VARIABLES - COMPROBACIÓN ************ //

        $dni             = actualizaDNI($dni);
        $valorPKAutor    = comprobarAutorPK($dni);
    
        insertarPersona($valorPKAutor);
        
    }else{

    // ERROR : Comprobación en conjunto
    header("Location: CRUD/insertar.php?error=$comprobar");

    }
}

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// *************************************************** BORRAR LIBRO ************************************************** //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

// Borramos un libro de forma Individual

if (isset($_POST["submitBorraLibros"])){

    // ************ VARIABLES - DECLARACIÓN ************ // 

    $isbn           = filtrado($_POST['isbn']);

    if(comprobarISBN($isbn) == true){

    // ************ VARIABLES - COMPROBACIÓN ************ //

        $valorPKLibros  = comprobarLibrosPK($isbn);
        borrarUnLibro($valorPKLibros,$isbn);

    }else
    {
        // ERROR : Comprobación en conjunto
        header("Location: CRUD/eliminar.php?error=$comprobar");
    }
    
}

// Borramos TODOS los libros.

if (isset($_POST["submitBorraLibrosTodo"])){

    borrarTodosLibro();

}


// Borramos Libro con CRUD

if (isset($_POST["textoBorrar"])){
    
    $isbn       = $_GET['isbnBorrar'];
    $valorPKLibros  = comprobarLibrosPK($isbn);
    borrarUnLibro($valorPKLibros,$isbn);

}


// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ************************************************** BORRAR PERSONA ************************************************* //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

// Borramos una persona de forma Individual

if (isset($_POST["submitBorraPersona"])){

    // ************ VARIABLES - DECLARACIÓN ************ //

    $dni            = filtrado($_POST['dni']);


        if(comprobarDNI($dni) == true){

            $valorPKAutor  = comprobarAutorPK($dni);
            borrarAutor($valorPKAutor,$dni);


        }else{
            // ERROR : Comprobación en conjunto
            header("Location: CRUD/eliminar.php?error=$comprobar");
        }

}

// Borramos a todas las personas

if (isset($_POST["submitBorraPersonaTodo"])){

    borrarTodoAutor();
        
}

// Borramos Libro con CRUD

if (isset($_POST["autorBorrar"])){
    
    $dni            = $_GET['dniBorrar'];

    $valorPKAutor   = comprobarAutorPK($dni);
    borrarAutor($valorPKAutor,$dni);

}



// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ************************************************* CONSULTAR LIBRO ************************************************* //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if (isset($_POST["submitLibrosConsulta"])){

    $isbn           = filtrado($_POST['isbn']);

    if(comprobarISBN($isbn) == true){

        $valorPKLibros  = comprobarLibrosPK($isbn);
        
        consultarLibro($valorPKLibros);

    }else
    {
        // ERROR : Comprobación en conjunto
        header("Location: CRUD/consultar.php?error=$comprobar");
    }
    
}

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ************************************************ CONSULTAR PERSONA ************************************************ //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if (isset($_POST["submitPersonaConsulta"])){

    // ************ VARIABLES - DECLARACIÓN ************ //

    $dni            = filtrado($_POST['dni']);


    if(comprobarDNI($dni) == true){
                
        $valorPKAutor  = comprobarAutorPK($dni);
        consultarAutor($valorPKAutor);
            
    }else{
        // ERROR : Comprobación en conjunto
        header("Location: CRUD/consultar.php?error=$comprobar");
    }

}

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ******************************************* MODIFICAR LIBRO - PARAMETROS ****************************************** //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if(isset($_POST["submitLibrosModificar"])){

    // ************ VARIABLES - DECLARACIÓN ************ // 

    $isbn           = filtrado($_POST['isbn']);
    $titulo         = filtrado($_POST['titulo']);
    $autor          = filtrado($_POST['autor']);
    $paginas        = filtrado($_POST['paginas']);
    $genero         = filtrado($_POST['genero']);
    $cantidad       = filtrado($_POST['cantidad']);

    // ************ VARIABLES - COMPROBACIÓN ************ //

    $valorPKLibros  = comprobarLibrosPK($isbn);

    // Comprobamos que existe el libro que vamos a modificar.

    if($valorPKLibros == 1){

        modificarLibroParametros($isbn,$titulo,$autor,$paginas,$genero,$cantidad);
    
    }else{
        // ERROR : Comprobación de ISBN
        $comprobar .= "El ISBN no existe";
        header("Location: CRUD/modificarParametros.php?error=$comprobar");
    }

}

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ********************************************* MODIFICAR LIBRO - CLAVES ******************************************** //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if(isset($_POST["submitLibrosModificarISBN"])){

    // ************ VARIABLES - DECLARACIÓN ************ // 

    $isbn               = filtrado($_POST['isbn']);
    $isbnNuevo          = filtrado($_POST['isbnNuevo']);

    // ************ VARIABLES - COMPROBACIÓN ************ //

    $valorPKLibros      = comprobarLibrosPK($isbn);
    $valorPKLibrosNuevo = comprobarLibrosPK($isbnNuevo);

    // Comprobamos que existe el libro que vamos a modificar.

        if($valorPKLibros == 1){

            if($valorPKLibrosNuevo == 0){
        
                modificarLibroClave($isbn,$isbnNuevo);
                
            }else{
                // ERROR : Comprobación de ISBN
                $comprobar .= "El ISBN que queremos modificar existe ya";
                header("Location: CRUD/modificarClaves.php?error=$comprobar");
            }
        
        }else{
            // ERROR : Comprobación de ISBN
            $comprobar .= "El ISBN a Modificar no existe";
            header("Location: CRUD/modificarClaves.php?error=$comprobar");
        }
    
}


// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ****************************************** MODIFICAR PERSONA - PARAMETROS ***************************************** //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //


if(isset($_POST["submitPersonaModificar"])){

    // ************ VARIABLES - DECLARACIÓN ************ // 

    $dni            = filtrado($_POST['dni']);
    $nombre         = filtrado($_POST['nombre']);
    $fecha          = filtrado($_POST['fecha']);

    $valorPKAutor  = comprobarAutorPK($dni);

    if($valorPKAutor == 1){

        modificarAutorParametros($dni,$nombre,$fecha);

    }else{
        // ERROR : Comprobación de TIPO
        $comprobar .= "El AUTOR no existe";
        header("Location: CRUD/modificarParametros.php?error=$comprobar");
    }

}

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ******************************************** MODIFICAR PERSONA - CLAVES ******************************************* //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if(isset($_POST["submitPersonaModificarDNI"])){

    // ************ VARIABLES - DECLARACIÓN ************ // 

    $dni            = filtrado($_POST['dni']);
    $dniNuevo       = filtrado($_POST['dniNuevo']);

        // En caso de que queramos MODIFICAR un AUTOR:
        
    $valorPKAutor       = comprobarAutorPK($dni);
    $valorPKAutorNuevo  = comprobarAutorPK($dniNuevo);

    if($valorPKAutor == 1){

        if($valorPKAutorNuevo == 0){

            modificarAutorClave($dni,$dniNuevo);

        }else{
            // ERROR : Comprobación de ISBN
            $comprobar .= "El Autor que queremos modificar existe ya";
            header("Location: CRUD/modificarClaves.php?error=$comprobar");
        }
            
    }else{
        // ERROR : Comprobación de TIPO
        $comprobar .= "El AUTOR no existe";
        header("Location: CRUD/modificarClaves.php?error=$comprobar");
    }

}

// ******************************************************************************************************************* //
// ******************************************************************************************************************* //
// ************************************************** BORRAR PRESTAMO ************************************************* //
// ******************************************************************************************************************* //
// ******************************************************************************************************************* //

if(isset($_POST['prestamoBorrar'])){

    $isbn                = $_GET['isbnGET'];
    $nombre              = $_GET['nombreGET'];
    $fecha_entrega       = $_GET['fechaEntrega'];
    $fecha_devolucion    = $_GET['fechaDevolucion'];

    $borrarPrestamo      = "DELETE FROM prestamo WHERE isbn='$isbn' AND nombre='$nombre' AND fecha_entrega='$fecha_entrega' AND fecha_devolucion='$fecha_devolucion'";
    $sentenciaPrestamo   = mysqli_query($conn,$borrarPrestamo);
    header("Location: CRUD/global_prestamo.php");

}

?>