<?php

// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ************************************************ FUNCIONES CONSULTAR ************************************************ //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //
// ********************************************************************************************************************* //

    /*--------------------------------------------------------------------------------/
      FUNCIÓN CONSULTAR LIBRO: Nos ejecuta la sentencia SELECT del ISBN
    /--------------------------------------------------------------------------------*/

    function consultarLibro($valorprimaria)
    {

      global $isbn;
      global $comprobar;
      global $conn;           // Variable del PHP conexionbase.php

      // Existe la clave primaria
      if($valorprimaria != 0){

            $clavelibro      = "SELECT * FROM libros WHERE isbn='$isbn'";
            $consultarlibro  = mysqli_query($conn, $clavelibro);

            $comprobar .= "--LIBRO--"."<br>";

            foreach($consultarlibro as $variable){        // Devuelve toda la fila
              foreach($variable as $valor){

                $comprobar  .= $valor ."<br>";
                  
              }
            }
            header("Location: CRUD/consultar.php?correcto=$comprobar");  

    }else{
        // ERROR : No existe el ISBN
        $comprobar .= "El ISBN no existe <br>";
        header("Location: CRUD/consultar.php?error=$comprobar"); 
    }

    }

    /*--------------------------------------------------------------------------------/
      FUNCIÓN CONSULTAR AUTOR: Nos ejecuta la sentencia SELECT del DNI AUTOR
    /--------------------------------------------------------------------------------*/

    function consultarAutor($valorprimaria)
    {

      global $dni;
      global $comprobar;
      global $conn;           // Variable del PHP conexionbase.php

      // Existe la clave primaria
      if($valorprimaria != 0){

            $claveautor      = "SELECT * FROM autor WHERE dni='$dni'";
            $consultarautor  = mysqli_query($conn, $claveautor);

            $comprobar .= "--AUTOR--"."<br>";

            foreach($consultarautor as $variable){        // Devuelve toda la fila
              foreach($variable as $valor){

                $comprobar  .= $valor ."<br>";
                  
              }
            }
            header("Location: CRUD/consultar.php?correcto=$comprobar");  

    }else{
        // ERROR : No existe el AUTOR
        $comprobar .= "El AUTOR no existe <br>";
        header("Location: CRUD/consultar.php?error=$comprobar"); 
    }

    }

?>