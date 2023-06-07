<?php

// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ************************************************ FUNCIONES COMPROBAR ************************************************ //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //



// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************** COMPROBACION DE LIBROS *********************************************** //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR INSERTAR LIBRO: Comprueba los diferentes valores recibidos del
      formulario para comprobar que no exista ningún fallos en los valores.
    /--------------------------------------------------------------------------------*/

    function comprobarInsertarLibro($isbn,$titulo,$autor,$paginas,$genero,$cantidad)
    {
        global $comprobar;                           
        // --- Comprueba los diferentes parámetros con sus respectivas comprobaciones

        comprobarISBN($isbn);                   comprobarPaginas($paginas);
        comprobarTitulo($titulo);               comprobarGenero($genero);
        comprobarAutor($autor);                 comprobarCantidad($cantidad);

        // --- Resultado de la Comprobacion. 0 fallos == True | +0 fallos == False

        if(strlen($comprobar) == 0){
            return true;
        }else{return false;}
        
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR ISBN: Comprueba que el ISBN existe, no está vacío. Es númerico 
      y tiene 13 caracteres.
    /--------------------------------------------------------------------------------*/

    function comprobarISBN($isbn)
    {
        global $comprobar;      global $patronNum;
    
            if(isset($isbn) && !empty($isbn)){                                        // Existe y No está vacío        

                if(preg_match($patronNum, $isbn)){                                    // Tiene que ser un número
        
                    if(strlen($isbn) == 13){                                          // Tiene 13 caracteres
                        
                    }else{$comprobar .= "El ISBN debe tener 13 caracteres <br>";}     // ERROR: Existe y No está vacío 
    
                }else{$comprobar .= "El ISBN debe de ser númerico <br>";}             // ERROR: Tiene que ser un número
        
            }else{$comprobar .= "El ISBN no puede estar vacío <br>";}                 // ERROR: Existe y No está vacío 

            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }else{return true;}
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR TITULO: Comprueba que el Título existe, no está vacío, y no
      tiene mas de 30 caracteres
    /--------------------------------------------------------------------------------*/

    function comprobarTitulo($titulo)
    {
        global $comprobar;

            if(isset($titulo) && !empty($titulo)){                                  // Existe y No está vacío
                
                if(strlen($titulo) <= 30){

                }else{$comprobar .= "El Título no puede tener más de 30 caracteres <br>";}             // ERROR: Min 40 caracteres
            }else{$comprobar .= "El Título no puede estar vacío <br>";}             // ERROR: Existe y No está vacío

            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR AUTOR: Comprueba que el Autor existe. En caso de estar vacío lo
      guardara en sinAutor, y en caso de no estar vacía lo guardará en conAutor
    /--------------------------------------------------------------------------------*/

    function comprobarAutor($autor)
    {
        global $comprobar;      global $conAutor;       global $sinAutor;
      
                    if(isset($autor)){                                                  // Existe

                        if(!empty($autor)){                                             // No está vacía : El libro tiene autor
                            $conAutor = 1;
                        }else{$sinAutor = 1;}                                           // Está vacía    :El libro no tiene autor
                   
                }

            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR PAGINAS: Comprueba que las páginas existen y no están vacias,
      y que las páginas son númericas. Y puede haber máximo 4 cifras
    /--------------------------------------------------------------------------------*/

    function comprobarPaginas($paginas)
    {
        global $comprobar;          global $patronNum;

            if(isset($paginas) && !empty($paginas)){                                // Existe y No está vacío

                if(preg_match($patronNum, $paginas)){                               // Tiene que ser un número
    
                    if(strlen($paginas) <= 4 && $paginas > 0){

                    }else$comprobar .= "Las páginas solo pueden tener 4 cifras <br>";     // ERROR: Tiene que ser de max 4 cifras

                }else{$comprobar .= "Las páginas deben de ser númericas <br>";}     // ERROR: Tiene que ser un número
    
            }else{$comprobar .= "Las páginas no pueden estar vacías <br>";}         // ERROR: Existe y No está vacío
        
            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR GENERO: Comprueba que el Genero existe, no está vacío, y NO
      tiene símbolos. Puede tener 25 caracteres.
    /--------------------------------------------------------------------------------*/

    function comprobarGenero($genero)
    {
        global $comprobar;  global $patronNoSimbolos;

            if(isset($genero) && !empty($genero)){                                  // Existe y No está vacío

                if(preg_match($patronNoSimbolos, $genero)){                         // No puede contener símbolos
    
                    if(strlen($genero) <= 25){

                    }else{$comprobar .= "El género no puede tener más de 25 caracteres <br>";}             // ERROR: Min 40 caracteres

                }else{$comprobar .= "El género no puede tener símbolos <br>";}      // ERROR: No puede contener símbolos
    
            }else{$comprobar .= "El género no puede estar vacío <br>";}             // ERROR: Existe y No está vacío

            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR CANTIDAD: Comprueba que la Cantidad existe, y no está vacio,
      que sea númerica y que la cantidad sean mayor a 0. Y puede haber máximo 5 cifras.
    /--------------------------------------------------------------------------------*/

    function comprobarCantidad($cantidad)
    {
        global $comprobar;  global $patronNum;

            if(isset($cantidad) && !empty($cantidad)){                              // Existe y No está vacío

                if(preg_match($patronNum, $cantidad)){                              // Tiene que ser un número
    
                    if($cantidad > 0){                                              // Tiene que ser mayor a 0
    
                        if(strlen($cantidad) <= 5){

                        }else$comprobar .= "La cantidad solo pueden tener 5 cifras <br>";     // ERROR: Tiene que ser de  max 5 cifras

                    }else{$comprobar .= "La cantidad debe ser mayor a 0 <br>";}     // ERROR: Tiene que ser mayor a 0
    
                }else{$comprobar .= "La cantidad debe de ser númerica <br>";}       // ERROR: Tiene que ser un número
    
            }else{$comprobar .= "La cantidad no puede estar vacía <br>";}           // ERROR: Existe y No está vacío

            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }
    }

// *********************************************************************************************************************** //
// *********************************************************************************************************************** //
// ********************************************** COMPROBACION DE PERSONAS *********************************************** //
// *********************************************************************************************************************** //
// *********************************************************************************************************************** //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR INSERTAR PERSONA: Comprueba los diferentes valores recibidos del
      formulario para comprobar que no exista ningún fallos en los valores.
    /--------------------------------------------------------------------------------*/

    function comprobarInsertarPersona($dni,$nombre,$fecha)
    {   
    
        global $comprobar;

        // --- Comprueba los diferentes parámetros con sus respectivas comprobaciones
        comprobarDNI($dni);             comprobarFecha($fecha);
        comprobarNombre($nombre);       
        
        // --- Resultado de la Comprobacion. 0 fallos == True | +0 fallos == False

        if(strlen($comprobar) == 0){
            return true;
        }else{return false;}
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR DNI: Comprueba que el DNI existe y no esta vacio. Que tiene 
      una longitud de 9 caracteres, y que los 8 primeros caracteres son númericos y el
      último caracter es una letra.
    /--------------------------------------------------------------------------------*/

    function comprobarDNI($dni)
    {
        global $comprobar;

            if(isset($dni) && !empty($dni)){

                if(strlen($dni) == 9){                                                   // Tiene 9 caracteres
    
                    // La función "is_numeric" nos comprueba si los caracteres se tratan de numeros.
                    // La función "subst" nos saca los primeros 8 caracteres de la cadena quedando así el DNI -> OOOOOOOOX
    
                    if(is_numeric(substr($dni,0,8)) == true){                            // Los 8 primeros caracteres son númericos
                        
                        $dniNumeros = substr($dni,0,8);                                  // Guardamos los números en una variable auxiliar
    
                    // La función "ctype_alpha" nos comprueba que si el caracter es un alfanúmerico.
                    // La función "strtoupper" nos transforma las letras minúsculas en mayúsculas.
                    // La función "subst" nos saca el último caracter de la cadena quedando así el DNI -> XXXXXXXXO
    
                        if(ctype_alpha(strtoupper(substr($dni,8)))){                     // Último caracter es una letra.  
    
                            $dniLetra = strtoupper(substr($dni,8));                      // Guardamos la letra en una variable auxiliar
    
                            $dni      = strval($dniNumeros).$dniLetra;                   // ACTUALIZAMOS el DNI con las 2 variables auxiliares.
                            
                        }else{$comprobar .= "El último caracter no es una letra<br>";}   // ERROR: Último caracter es una letra. 
    
                    }else{$comprobar .= "Los 8 primeros caracteres deben ser númericos<br> ";} // ERROR: Los 8 primeros caracteres son númericos
                    
                }else{$comprobar .= "El DNI tiene que tener 9 caracteres <br>";}         // ERROR: Tiene 9 caracteres
    
            }else{$comprobar .= "El DNI no puede estar vacío <br>";}                     // ERROR: Existe y No está vacío

            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }else{return true;}

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR NOMBRE: Comprueba que el Nombre existe, y no esta vacio. Y no
      puede contener símbolo y números.
    /--------------------------------------------------------------------------------*/

    function comprobarNombre($nombre)
    {
        global $comprobar;      global $patronLetras;   global $patronNoSimbolos;

            if(isset($nombre) && !empty($nombre)){                                        // Existe y No está vacío
            
                if(preg_match($patronNoSimbolos, $nombre)){                               // No puede contener símbolos

                    if(preg_match($patronLetras, $nombre)){                               // No puede contener números
        
                    }else{$comprobar .= "El nombre no puede empezar con números <br>";}         // ERROR: No puede contener números

                }else{$comprobar .= "El nombre no puede tener símbolos<br>";}             // ERROR: No puede contener símbolos
                
                    
            }else{$comprobar .= "El nombre no puede estar vacío <br>";}                   // ERROR: Existe y No está vacío

            // Resultado de la comprobación.
            if(strlen($comprobar) != 0){
                return $comprobar;
            }

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR FECHA: Comprueba que la Fecha existe y no está vacía. Y no
      sea superior a la de HOY.
    /--------------------------------------------------------------------------------*/

    function comprobarFecha($fecha)
    {
        global $comprobar;
        
        $hoy        = date("Y-m-d");

        if(isset($fecha) && !empty($fecha)){                                      // Existe y No está vacío

            if($hoy > $fecha){

            }else{
                $comprobar .= "La fecha no puede ser superior a la de HOY <br>";
            }
        }else{$comprobar .= "la fecha no puede estar vacía <br>";}                // ERROR: Existe y No está vacío

        // Resultado de la comprobación.
        if(strlen($comprobar) != 0){
            return $comprobar;
        }

    }

// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ******************************************** COMPROBACION DE PRIMARY KEY ******************************************** //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR LIBROS PK: Se encarga de comprobar sí el LIBRO, existe en nuestra Base de Datos.
    /--------------------------------------------------------------------------------*/

    function comprobarLibrosPK($isbn)
    {
        // Variables Globales 
        global $conn;           // Variable del PHP conexionbase.php

        // ----- Comprobación de la PK - ¿Existe la PK en la BDD?
        $claveprimaria          = "SELECT COUNT(isbn) FROM libros WHERE isbn=('$isbn')";
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
      FUNCIÓN COMPROBAR AUTOR PK: Se encarga de comprobar sí el AUTOR, existe en nuestra Base de Datos.
    /--------------------------------------------------------------------------------*/

    function comprobarAutorPK($dni)
    {
        // Variables Globales
        global $autor;     
        global $conn;           // Variable del PHP conexionbase.php

        // ----- Comprobación de la PK - ¿Existe la PK en la BDD?

            // -> Para la tabla Libros
        if (isset($_POST["submitLibros"]) || isset($_POST["submitLibrosModificar"])){
            $claveprimaria          = "SELECT COUNT(dni) FROM autor WHERE dni=('$autor')";
            $consultaprimaria       = mysqli_query($conn,$claveprimaria);
            $valorprimaria          = "";
        }
            // -> Para la tabla Personas
        if (isset($_POST["submitPersona"]) || isset($_POST["submitBorraPersona"]) || isset($_POST["submitPersonaConsulta"]) || isset($_POST["submitPersonaModificar"]) || isset($_POST["submitPersonaModificarDNI"]) || isset($_POST["autorBorrar"])){
            $claveprimaria          = "SELECT COUNT(dni) FROM autor WHERE dni=('$dni')";
            $consultaprimaria       = mysqli_query($conn,$claveprimaria);
            $valorprimaria          = "";
        }
        
  
        // Sacamos el valor de la PK
        foreach($consultaprimaria as $variable){
            foreach($variable as $valor){
                $valorprimaria  = $valor;
            }
        }

        return $valorprimaria;
    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN COMPROBAR ADMIN: Nos dice si es o no administrador. Si devuelve 0 es que
      no es administrador.
    /--------------------------------------------------------------------------------*/

    function comprobarAdmin($nombre)
    {

        $claveadmin      = "SELECT COUNT(nombre) FROM usuarios WHERE nombre='$nombre'";
        $consultaradmin  = mysqli_query($conn, $claveadmin);

            foreach($consultaradmin as $variable){        // Devuelve toda la fila
              foreach($variable as $valor){

                $comprobar  = $valor;
              }
            }

        return $comprobar;

    }

?>
