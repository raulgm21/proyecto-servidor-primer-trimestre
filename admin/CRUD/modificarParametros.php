<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/admin_Modificar.css" type="text/css">
    <script src="../scripts/errorLimpiezaInsertar_Modificar.js" type="text/javascript"></script>
    <title>BDD - Modificar Parámetros</title>

    <link rel="shortcut icon" href="../imagenes/favicon.ico">

    <style>
        .contenedorInicio{
    width: 99%;
    height: 180px;
    opacity: 1;
    background-image: url("../imagenes/fondoBiblioteca.png");
    border : 6px rgb(0, 0, 0) solid;
    border-radius: 8px;
    }      
   

    .tituloCRUD a{
        color : #fff;
        font-family: 'Dancing Script', cursive;
        font-size: 48px;
        letter-spacing: 5px;
        word-spacing: 2px;
    
        font-weight: bold;
        text-decoration: none;
        font-style: oblique;
        font-variant: normal;
        text-transform: none;
        margin : 18px 30%;
        width: 100%;
        
        position : relative;
        top : 32px;

    }
    </style>

</head>
<body>

        <?php 
            // COMPROBACIÓN DE LAS SESIONES
            require_once '../../sesion/comprobar_sesion_admin.php';   
        ?>
       

       <div class="contenedorInicio">
            <h1 class="tituloCRUD"><a class="botonMenuEnlace" href="global_libros.php">¡ CRUD - GLOBAL !</a></h1>
        </div>
        

        <a href="modificarMenu.php"><img class="insertarlogo" src="../imagenes/modificarLogo.png" alt="Imagen Logo"></a>

        <div class="librosdiv">

            <h1 class="tituloLibro"> Modificar Libros</h1>
            <form action="../admin_gestion.php" method="post">

            <!-- FORMULARIO LIBRO -->

            <?php

            // RECIBE EL DATO DEL CRUD

            if(isset($_GET['isbnGET']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                $isbn = $_GET['isbnGET'];
                if(!empty($isbn)){

                $isbn           = $_GET['isbnGET'];
                $titulo         = $_GET['tituloGET'];
                $autor          = $_GET['autorGET'];
                $genero         = $_GET['generoGET'];
                $paginas        = $_GET['paginasGET'];
                $cantidad       = $_GET['cantidadGET'];


                echo "<label>ISBN</label>";
                echo "<input class='form-libros isbn' type='text' placeholder='Introduce ISBN (númerico y 13 caracteres)' name='isbn' id='isbn' size='48' value='$isbn' readonly>";
 
                echo "<label>Titulo</label>";
                echo "<input class='form-libros titulo' type='text' placeholder='Introduce título' name='titulo' id='titulo' size='48' value='$titulo'>";
                echo "<label>Autor</label>";
                echo "<input class='form-libros autor' type='text' placeholder='Autor (si tiene pon su DNI)' name='autor' id='autor' size='24' value='$autor'>";
                echo "<label>Genero</label>";
                echo "<input class='form-libros genero' type='text' placeholder='Introduce género' name='genero' id='genero' size='24' value='$genero'>";
                echo "<label class='labelCantidad'>Paginas</label>";
                echo "<input class='form-libros paginas' type='text' placeholder='Número de paginas' name='paginas' id='paginas' size='16' value='$paginas'>";
                echo "<label class='labelCantidad'>Cantidad</label>";
                echo "<input class='form-libros cantidad' type='text' placeholder='Cantidad de libros' name='cantidad' id='cantidad' size='16' value='$cantidad'>";
            }
            
            }else{
                echo "<label>ISBN</label>";
                echo "<input class='form-libros isbn' type='text' placeholder='Introduce ISBN (númerico y 13 caracteres)' name='isbn' id='isbn' size='48'>";
                echo "<label>Titulo</label>";
                echo "<input class='form-libros titulo' type='text' placeholder='Introduce título' name='titulo' id='titulo' size='48'>";
                echo "<label>Autor</label>";
                echo "<input class='form-libros autor' type='text' placeholder='Autor (si tiene pon su DNI)' name='autor' id='autor' size='24'>";
                echo "<label>Genero</label>";
                echo "<input class='form-libros genero' type='text' placeholder='Introduce género' name='genero' id='genero' size='24'>";
                echo "<label class='labelCantidad'>Paginas</label>";
                echo "<input class='form-libros paginas' type='text' placeholder='Número de paginas' name='paginas' id='paginas' size='16'>";
                echo "<label class='labelCantidad'>Cantidad</label>";
                echo "<input class='form-libros cantidad' type='text' placeholder='Cantidad de libros' name='cantidad' id='cantidad' size='16'>";
            }


            ?>

                <input class='form-libros submitLibros' type='submit' id='submitLibrosModificar' name='submitLibrosModificar' value='Modificar Libro'>
            </form>

           <img class="imagenLibro" src="../imagenes/libroAzul.png" alt="Imagen Libro">
        </div>

        <div class="personasdiv">

            <h1 class="tituloPersona"> Modificar Autor</h1>
            <form action="../admin_gestion.php" method="post">

            <!-- FORMULARIO AUTOR -->

            <?php

            // RECIBE EL DATO DEL CRUD

            if(isset($_GET['dniGET']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                $dni = $_GET['dniGET'];
                if(!empty($dni)){

                $dni            = $_GET['dniGET'];
                $nombre         = $_GET['nombreGET'];
                $fecha          = $_GET['fechaGET'];

                echo "<label class='labelAutor'>DNI</label>";
                echo "<input class='form-persona dni' type='text' placeholder='Introduce DNI (8 números y un caracter final)' name='dni' id='dni' size='48' value='$dni' readonly>";
                echo "<label class='labelAutor'>Nombre</label>";
                echo "<input class='form-persona nombre' type='text' placeholder='Introduce Nombre' name='nombre' id='nombre' size='48' value='$nombre'>";
                echo "<label class='labelAutor'>Fecha de Nacimiento</label>";
                echo "<input class='form-persona fecha' type='date' placeholder='Introduce fecha nacimiento' name='fecha' id='fecha' value='$fecha'>";

            }

            }else{
                echo "<label class='labelAutor'>DNI</label>";
                echo "<input class='form-persona dni' type='text' placeholder='Introduce DNI (8 números y un caracter final)' name='dni' id='dni' size='48'>";
                echo "<label class='labelAutor'>Nombre</label>";
                echo "<input class='form-persona nombre' type='text' placeholder='Introduce Nombre' name='nombre' id='nombre' size='48'>";
                echo "<label class='labelAutor'>Fecha de Nacimiento</label>";
                echo "<input class='form-persona fecha' type='date' placeholder='Introduce fecha nacimiento' name='fecha' id='fecha'>";

            }

            ?>
                <input class="form-persona submitPersona" type="submit" id="submitPersonaModificar" name="submitPersonaModificar" value="Modificar Autor" >

            
            </form>

                <img class="imagenPersona" src="../imagenes/personaAzul.png" alt="Imagen Persona">


        </div>


        <div class="errordiv">

            <p id="errorTexto" class="errorTexto">

           
            <?php
                if(isset($_GET['error']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                $errores = $_GET['error'];
                if(!empty($errores)){

                $errores = $_GET['error'];
                echo $errores;
                }}
            ?>

            </p>

        </div>

        <div class="correctodiv">

            <p id="errorTexto" class="errorTexto">


            <?php
                if(isset($_GET['correcto']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                $errores = $_GET['correcto'];
                if(!empty($errores)){

                $errores = $_GET['correcto'];
                echo $errores;
                }}
            ?>

            </p>

        </div>


    


    
</body>
</html>