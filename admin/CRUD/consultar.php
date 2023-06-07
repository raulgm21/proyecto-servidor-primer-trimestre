<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDD - Consultar</title>
    <link rel="stylesheet" href="../estilos/admin_Consultar.css" type="text/css">
    <script src="../scripts/errorLimpiezaEliminar_Consultar.js" type="text/javascript"></script>
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

    <a href="../index_admin.php"><img class="insertarlogo" src="../imagenes/consultarLogo.png" alt="Imagen Logo"></a>

        <div class="librosdiv">

            <h1 class="tituloLibro"> Consultar Libros</h1>
            <form action="../admin_gestion.php" method="post">
                <label>ISBN</label>
                <input class="form-libros isbn" type="text" placeholder="Introduce ISBN (númerico y 13 caracteres)" name="isbn" id="isbn" size="48">
                <input class="form-libros submitLibrosConsulta" type="submit" id="submitLibrosConsulta" name="submitLibrosConsulta" value="Consultar Libro" >


            </form>

           <img class="imagenLibro" src="../imagenes/libroAmarillo.png" alt="Imagen Libro">
        </div>

        <div class="personasdiv">

            <h1 class="tituloPersona"> Consultar Personas</h1>
            <form action="../admin_gestion.php" method="post">
            <label class="labelAutor">DNI</label>
                <input class="form-persona dni" type="text" placeholder="Introduce DNI (8 números y un caracter final)" name="dni" id="dni" size="48">
                <input class="form-persona submitPersonaConsulta" type="submit" id="submitPersonaConsulta" name="submitPersonaConsulta" value="Consultar Persona" >


            </form>

                <img class="imagenPersona" src="../imagenes/personaAmarilla.png" alt="Imagen Persona">


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