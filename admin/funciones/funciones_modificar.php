<?php

// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ************************************************ FUNCIONES MODIFICAR ************************************************ //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //


// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************* MODIFICACIÓN DE LIBROS ************************************************ //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //


    /*--------------------------------------------------------------------------------/
      FUNCIÓN MODIFICAR LIBRO PARAMETROS: Modifica el ISBN que le hemos pasado. Y pondra
      en su lugar los datos recibidos de Modificar, los campos vacios no serán cambiados.
    /--------------------------------------------------------------------------------*/

    function modificarLibroParametros($isbn,$titulo,$autor,$paginas,$genero,$cantidad)
    {
        global $conn;   // Variable global de 'conexionbase.php'
        global $patronNum;
        global $patronNoSimbolos;

        $auxTitulo      = "";
        $auxAutor       = "";
        $auxPaginas     = "";
        $auxGenero      = "";
        $auxCantidad    = "";
        

        // ******************************************** TITULO ******************************************** //

        // - Sacamos el TITULO del ISBN seleccionado -
        $mostrarTitulo       = "SELECT titulo FROM libros WHERE isbn='$isbn'";
        $consultaTitulo      = mysqli_query($conn,$mostrarTitulo);
        $valorTitulo         = "";

        // - Sacamos el valor del TITULO del ISBN seleccionado -
        foreach($consultaTitulo as $variable){
            foreach($variable as $valor){
               $valorTitulo = $valor;
            }
        }

        if(empty($titulo)){
            $auxTitulo = $valorTitulo;              // Guarda Valor de la BDD
        }else{
            $auxTitulo = $titulo;                   // Guarda nuevo valor
        }
      
        // ******************************************** AUTOR ******************************************** //

        // - Sacamos el AUTOR del ISBN seleccionado -
        $mostrarAutor       = "SELECT dni_autor FROM libros WHERE isbn='$isbn'";
        $consultaAutor      = mysqli_query($conn,$mostrarAutor);
        $valorAutor         = "";

        // - Sacamos el valor del AUTOR del ISBN seleccionado -
        foreach($consultaAutor as $variable){
            foreach($variable as $valor){
               $valorAutor= $valor;
            }
        }

        if(empty($autor)){
            $auxAutor = $valorAutor;                // Guarda Valor de la BDD
        }else{

            if(comprobarAutorPK($autor) == 1){
                $auxAutor = $autor;                 // Guarda nuevo valor (si el autor esta en la BDD)
            }else{
                $auxAutor = $valorAutor;                // Guarda Valor de la BDD
            }
        }

        // ******************************************** PAGINAS ******************************************** //

        // - Sacamos la PAGINA del ISBN seleccionado -
        $mostrarPaginas       = "SELECT paginas FROM libros WHERE isbn='$isbn'";
        $consultaPaginas      = mysqli_query($conn,$mostrarPaginas);
        $valorPaginas         = "";

        // - Sacamos el valor de PAGINA del ISBN seleccionado -
        foreach($consultaPaginas as $variable){
            foreach($variable as $valor){
               $valorPaginas= $valor;
            }
        }

        if(empty($paginas)){
            $auxPaginas = $valorPaginas;              // Guarda Valor de la BDD
        }else{
            $auxPaginas = $paginas;                   // Guarda nuevo valor
        }


        // ******************************************** GENERO ******************************************** //

        // - Sacamos el GENERO del ISBN seleccionado -
        $mostrarGenero       = "SELECT genero FROM libros WHERE isbn='$isbn'";
        $consultaGenero      = mysqli_query($conn,$mostrarGenero);
        $valorGenero         = "";

        // - Sacamos el valor de GENERO del ISBN seleccionado -
        foreach($consultaGenero as $variable){
            foreach($variable as $valor){
               $valorGenero= $valor;
            }
        }

        if(empty($genero)){
            $auxGenero = $valorGenero;              // Guarda Valor de la BDD
        }else{
            $auxGenero = $genero;                   // Guarda nuevo valor
        }

        // ******************************************** CANTIDAD ******************************************** //
       
        // - Sacamos la CANTIDAD del ISBN seleccionado -
        $mostrarCantidad       = "SELECT cantidad FROM libros WHERE isbn='$isbn'";
        $consultaCantidad      = mysqli_query($conn,$mostrarCantidad);
        $valorCantidad         = "";

        // - Sacamos el valor de CANTIDAD del ISBN seleccionado -
        foreach($consultaCantidad as $variable){
            foreach($variable as $valor){
               $valorCantidad= $valor;
            }
        }

        if(empty($cantidad)){
            $auxCantidad = $valorCantidad;              // Guarda Valor de la BDD
        }else{
            $auxCantidad = $cantidad;                   // Guarda nuevo valor
        }


        // ************************************************************************************** //
        // ********************************** COMPROBACIONES ************************************ //    
        // ************************************************************************************** //

        // -> TITULO
        if(!empty($titulo)){
            if(strlen($titulo) <= 30){

            }else{$comprobar .= "El Título no puede tener más de 30 caracteres <br>";}  
        }
        
        // -> PAGINAS
        if(!empty($paginas)){
            if(preg_match($patronNum, $paginas)){                               
    
                if(strlen($paginas) <= 4){
    
                }else$comprobar .= "Las páginas solo pueden tener 4 cifras <br>";     
    
            }else{$comprobar .= "Las páginas deben de ser númericas <br>";}     
        }
       
        // -> GENERO
        if(!empty($genero)){
            if(preg_match($patronNoSimbolos, $genero)){                         
    
                if(strlen($genero) <= 25){
    
                }else{$comprobar .= "El Título no puede tener más de 30 caracteres <br>";}             
    
            }else{$comprobar .= "El género no puede tener símbolos <br>";}  
        }
            
        // -> CANTIDAD
        if(!empty($cantidad)){

            if(preg_match($patronNum, $cantidad)){                              
    
                if($cantidad > 0){                                              
    
                    if(strlen($cantidad) <= 5){
    
                    }else$comprobar .= "La cantidad solo pueden tener 5 cifras <br>";     
    
                }else{$comprobar .= "La cantidad debe ser mayor a 0 <br>";}     
    
            }else{$comprobar .= "La cantidad debe de ser númerica <br>";} 
        }     

        // ************************************************************************************** //
        // ******************************** HACER MODIFICACION ********************************** //    
        // ************************************************************************************** //

        if(strlen($comprobar) == 0){

            // --- mysqli_injection --- //

            $modificarlibro       = "UPDATE libros SET titulo=(?),dni_autor=(?),paginas=(?),genero=(?),cantidad=(?) WHERE isbn=(?)"; // Creamos Sentencia INSERT
            $sentencia            = $conn->prepare($modificarlibro);                                                                 // Preparamos Sentencia UPDATE
            $sentencia->bind_param("ssisis",$auxTitulo,$auxAutor,$auxPaginas,$auxGenero,$auxCantidad,$isbn);                         // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                                                            // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar = "Algo no salío como se esperaba <br>";
                header("Location: CRUD/modificarParametros.php?error=$comprobar");

            }else{

                // Si el UPDATE esta bien lo meterá.
                $comprobar = "Libro Modificado <br>";
                header("Location: CRUD/modificarParametros.php?correcto=$comprobar");
            }

        }else{
            // Error a la hode COMPROBAR
            header("Location: CRUD/modificarParametros.php?error=$comprobar");
        }
 
    }


    /*--------------------------------------------------------------------------------/
      FUNCIÓN MODIFICAR LIBRO CLAVE: Modifica el ISBN que le hemos pasado por el nuevo
      ISBN.
    /--------------------------------------------------------------------------------*/

    function modificarLibroClave($isbn,$isbnNuevo){

        global $conn;   // Variable global de 'conexionbase.php'
        global $patronNum;
    
        // -> COMPROBAMOS QUE EL ISBN NUEVO ES CORRECTO
       
        $comprobar = comprobarISBN($isbnNuevo);

        // ************************************************************************************** //
        // ******************************** HACER MODIFICACION ********************************** //    
        // ************************************************************************************** //    

        if(strlen($comprobar) == 0 || $comprobar == 1){

            // --- mysqli_injection --- //

            $modificarlibro       = "UPDATE libros SET isbn=(?) WHERE isbn=(?)";         // Creamos Sentencia INSERT
            $sentencia            = $conn->prepare($modificarlibro);                     // Preparamos Sentencia INSERT
            $sentencia->bind_param("ss",$isbnNuevo,$isbn);                               // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar = "Algo no salío como se esperaba <br>";
                header("Location: CRUD/modificarClaves.php?error=$comprobar");

            }else{

                // Modificar ISBN en el PRESTAMO
                $modificarPrestamo    = "UPDATE prestamo SET isbn='$isbnNuevo' WHERE isbn='$isbn'";
                $consultaPrestamo     = mysqli_query($conn,$modificarPrestamo);
                
                // Si el UPDATE esta bien lo meterá.
                $comprobar = "Libro Modificado <br>";
                header("Location: CRUD/modificarClaves.php?correcto=$comprobar");
            }

        }else{
            header("Location: CRUD/modificarClaves.php?error=$comprobar");
        }
        
    }


// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ******************************************** MODIFICACIÓN DE PERSONAS *********************************************** //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN MODIFICAR AUTOR PARAMETROS: Modifica el DNI que le hemos pasado. Y pondra
      en su lugar los datos recibidos de Modificar, los campos vacios no serán cambiados.
    /--------------------------------------------------------------------------------*/

    function modificarAutorParametros($dni,$nombre,$fecha)
    {

        global $conn;   // Variable global de 'conexionbase.php'
        global $patronNoSimbolos;
        global $patronLetras;

        $hoy        = date("Y-m-d");
        $comprobar  = "";
        $auxNombre  = "";
        $auxFecha   = "";

        // ******************************************** NOMBRE ******************************************** //

        // - Sacamos el NOMBRE del ISBN seleccionado -
        $mostrarNombre       = "SELECT nombre FROM autor WHERE dni='$dni'";
        $consultaNombre      = mysqli_query($conn,$mostrarNombre);
        $valorNombre         = "";

        // - Sacamos el valor del NOMBRE del ISBN seleccionado -
        foreach($consultaNombre as $variable){
            foreach($variable as $valor){
               $valorNombre = $valor;
            }
        }

        if(empty($nombre)){
            $auxNombre = $valorNombre;              // Guarda Valor de la BDD
        }else{
            $auxNombre = $nombre;                   // Guarda nuevo valor
        }

        // ******************************************** FECHA ******************************************** //

        // - Sacamos el NOMBRE del ISBN seleccionado -
        $mostrarFecha       = "SELECT fecha_nacimiento FROM autor WHERE dni='$dni'";
        $consultaFecha      = mysqli_query($conn,$mostrarFecha);
        $valorFecha         = "";

        // - Sacamos el valor del NOMBRE del ISBN seleccionado -
        foreach($consultaFecha as $variable){
            foreach($variable as $valor){
               $valorFecha = $valor;
            }
        }

        if(empty($fecha)){
            $auxFecha = $valorFecha;              // Guarda Valor de la BDD
        }else{
            $auxFecha = $fecha;                   // Guarda nuevo valor
        }

        // ************************************************************************************** //
        // ********************************** COMPROBACIONES ************************************ //    
        // ************************************************************************************** //

        // -> NOMBRE
        if(!empty($nombre)){
            if(preg_match($patronNoSimbolos, $nombre)){                             

                if(preg_match($patronLetras, $nombre)){                               
    
                }else{$comprobar .= "El nombre no puede tener números <br>";}        
    
            }else{$comprobar .= "El nombre no puede tener símbolos<br>";}           
        }
        
        // -> FECHA
        if(!empty($fecha)){
            if($hoy > $fecha){

            }else{
                $comprobar .= "La fecha no puede ser superior a la de HOY <br>";
            }
        }

        // ************************************************************************************** //
        // ******************************** HACER MODIFICACION ********************************** //    
        // ************************************************************************************** //

        if(strlen($comprobar) == 0){

            // --- mysqli_injection --- //

            $modificarautor       = "UPDATE autor SET nombre=(?),fecha_nacimiento=(?) WHERE dni=(?)"; // Creamos Sentencia UPDATE
            $sentencia            = $conn->prepare($modificarautor);                                  // Preparamos Sentencia UPDATE
            $sentencia->bind_param("sss",$auxNombre,$auxFecha,$dni);                                  // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){                             // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar = "Algo no salío como se esperaba <br>";
                header("Location: CRUD/modificarParametros.php?error=$comprobar");

            }else{

                // Si el UPDATE esta bien lo meterá.
                $comprobar = "Autor Modificado <br>";
                header("Location: CRUD/modificarParametros.php?correcto=$comprobar");
            }

        }else{
            // Error a la hode COMPROBAR
            header("Location: CRUD/modificarParametros.php?error=$comprobar");
        }

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN MODIFICAR AUTOR CLAVE: Modifica el DNI que le hemos pasado. Y pondra
      en su lugar los datos recibidos de Modificar, los campos vacios no serán cambiados.
    /--------------------------------------------------------------------------------*/

    function modificarAutorClave($dni,$dniNuevo)
    {
        global $conn;   // Variable global de 'conexionbase.php'
        
    
        // -> COMPROBAMOS QUE EL DNI NUEVO ES CORRECTO Y LO ACTUALIZAMOS AL FORMATO DESEADO

        $comprobar = comprobarDNI($dniNuevo);
        $dniNuevo  = actualizaDNI($dniNuevo);

        // ************************************************************************************** //
        // ******************************** HACER MODIFICACION ********************************** //    
        // ************************************************************************************** //    

        if(strlen($comprobar) == 0 || $comprobar == 1){

            // --- mysqli_injection --- //

            $modificarautor       = "UPDATE autor SET dni=(?) WHERE dni=(?)";          // Creamos Sentencia UPDATE
            $sentencia            = $conn->prepare($modificarautor);                   // Preparamos Sentencia UPDATE
            $sentencia->bind_param("ss",$dniNuevo,$dni);                               // Aplicamos bind y asignamos variables

            if(!$sentencia->execute() || $sentencia->affected_rows != 1){              // Debe ejecutarse o solo AFECTAR a 1

                // ERROR : SENTENCIA NO APROPIADA
                $comprobar = "Algo no salío como se esperaba <br>";
                header("Location: CRUD/modificarClaves.php?error=$comprobar");

            }else{

                $modificarAutorLibro   = "UPDATE libros SET dni_autor='$dniNuevo' WHERE dni_autor='$dni'";

                if(mysqli_query($conn, $modificarAutorLibro)){
        
                    // Si el UPDATE esta bien lo meterá.
                    $comprobar = "Autor Modificado <br>";
                    header("Location: CRUD/modificarClaves.php?correcto=$comprobar");
                }
             
            }

        }else{
            header("Location: CRUD/modificarClaves.php?error=$comprobar");
        }
    }


?>