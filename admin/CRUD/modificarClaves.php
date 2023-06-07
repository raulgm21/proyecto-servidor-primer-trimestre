<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/admin_Modificar2.css" type="text/css">
    <script src="../scripts/errorLimpiezaClave.js" type="text/javascript"></script>
    <title>BDD - Modificar ISBN-DNI</title>
    <link rel="shortcut icon" href="../imagenes/favicon.ico">
    <style>


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

            <h1 class="tituloLibro"> Modificar ISBN</h1>
            <form action="../admin_gestion.php" method="post">

            <!-- FORMULARIO LIBRO -->

            <?php

            // RECIBE EL DATO DEL CRUD

            if(isset($_GET['isbnGET']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                $isbn = $_GET['isbnGET'];

                if(!empty($isbn)){
                $isbn = $_GET['isbnGET'];
                echo "<label>ISBN Antiguo</label>";
                echo "<input class='form-libros isbn' type='text' placeholder='Introduce ISBN (númerico y 13 caracteres)' name='isbn' id='isbn' size='48' value='$isbn' readonly>";

                }
            
            }else{
                echo "<label>ISBN Antiguo</label>";
                echo "<input class='form-libros isbn' type='text' placeholder='Introduce ISBN (númerico y 13 caracteres)' name='isbn' id='isbn' size='48'>";

            }

            ?>
                <label>ISBN Nuevo</label>
                <input class='form-libros isbnNuevo' type='text' placeholder='Introduce ISBN nuevo' name='isbnNuevo' id='isbnNuevo' size='48'>
                <input class="form-libros submitLibrosISBN" type="submit" id="submitLibrosModificarISBN" name="submitLibrosModificarISBN" value="Modificar ISBN" >


            </form>

            <img class="imagenLibro" src="../imagenes/libroISBN.png" alt="Imagen Libro">
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
                $dni = $_GET['dniGET'];
                echo "<label class='labelAutor'>DNI Antiguo</label>";
                echo "<input class='form-persona dni' type='text' placeholder='Introduce DNI antiguo' name='dni' id='dni' size='48' value='$dni' readonly>";

                }
            
            }else{
                echo "<label class='labelAutor'>DNI Antiguo</label>";
                echo "<input class='form-persona dni' type='text' placeholder='Introduce DNI antiguo' name='dni' id='dni' size='48'>";

            }
            ?>
                <label class="labelAutor">DNI Nuevo</label>
                <input class="form-persona dniNuevo" type="text" placeholder="Introduce DNI nuevo" name="dniNuevo" id="dniNuevo" size="48">
                <input class="form-persona submitPersonaDNI" type="submit" id="submitPersonaModificarDNI" name="submitPersonaModificarDNI" value="Modificar Autor" >


            </form>

                <img class="imagenPersona" src="../imagenes/personaDNI.png" alt="Imagen Persona">


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