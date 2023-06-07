<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/admin_Insertar.css" type="text/css">
    <script src="../scripts/errorLimpiezaInsertar_Modificar.js" type="text/javascript"></script>
    <title>BDD - Insertar</title>
    <link rel="shortcut icon" href="../imagenes/favicon.ico">
</head>
<body>

        <?php 
            // COMPROBACIÓN DE LAS SESIONES
            require_once '../../sesion/comprobar_sesion_admin.php';   
        ?>

        <div class="contenedorInicio">
            <h1 class="tituloCRUD"><a class="botonMenuEnlace" href="global_libros.php">¡ CRUD - GLOBAL !</a></h1>
        </div>


        <a href="../index_admin.php"><img class="insertarlogo" src="../imagenes/insertarLogo.png" alt="Imagen Logo"></a>

        <div class="librosdiv">

            <h1 class="tituloLibro"> Insertar Libros</h1>
            <form action="../admin_gestion.php" method="post">
                <label>ISBN</label>
                <input class="form-libros isbn" type="text" placeholder="Introduce ISBN (númerico y 13 caracteres)" name="isbn" id="isbn" size="48">
                <label>Titulo</label>
                <input class="form-libros titulo" type="text" placeholder="Introduce título" name="titulo" id="titulo" size="48">
                <label>Autor</label>
                <input class="form-libros autor" type="text" placeholder="Autor (si tiene pon su DNI)" name="autor" id="autor" size="24">
                <label>Genero</label>
                <input class="form-libros genero" type="text" placeholder="Introduce género" name="genero" id="genero" size="24">
                <label class="labelPagina">Paginas</label>
                <input class="form-libros paginas" type="text" placeholder="Número de paginas" name="paginas" id="paginas" size="16">
                <label class="labelCantidad">Cantidad</label>
                <input class="form-libros cantidad" type="text" placeholder="Cantidad de libros" name="cantidad" id="cantidad" size="16">
                
                <input class="form-libros submitLibros" type="submit" id="submitLibros" name="submitLibros" value="Introducir Libro" >


            </form>

           <img class="imagenLibro" src="../imagenes/libroVerde.png" alt="Imagen Libro">
        </div>

        <div class="personasdiv">

            <h1 class="tituloPersona"> Insertar Autor</h1>
            <form action="../admin_gestion.php" method="post">
                <label class="labelAutor">DNI</label>
                <input class="form-persona dni" type="text" placeholder="Introduce DNI (8 números y un caracter final)" name="dni" id="dni" size="48">
                <label class="labelAutor">Nombre</label>
                <input class="form-persona nombre" type="text" placeholder="Introduce Nombre" name="nombre" id="nombre" size="48">
                <label class="labelAutor">Fecha de Nacimiento</label>
                <input class="form-persona fecha" type="date" placeholder="Introduce fecha nacimiento" name="fecha" id="fecha">
                
                <input class="form-persona submitPersona" type="submit" id="submitPersona" name="submitPersona" value="Introducir Autor" >


            </form>

                <img class="imagenPersona" src="../imagenes/personaVerde.png" alt="Imagen persona">


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