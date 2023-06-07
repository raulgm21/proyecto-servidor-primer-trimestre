<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/admin_Eliminar.css" type="text/css">
    <script src="../scripts/errorLimpiezaEliminar_Consultar.js" type="text/javascript"></script>
    <title>BDD - Eliminar</title>
    <link rel="shortcut icon" href="../imagenes/favicon.ico">

    <script>

    function confirmar()
    {
        var respuesta = confirm("¿Estas seguro que quieres borrar?");

        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }

</script>

</head>

<body>



        <?php 
            // COMPROBACIÓN DE LAS SESIONES
            require_once '../../sesion/comprobar_sesion_admin.php';   
        ?>
    
         <div class="contenedorInicio">
            <h1 class="tituloCRUD"><a class="botonMenuEnlace" href="global_libros.php">¡ CRUD - GLOBAL !</a></h1>
        </div>

        <a href="../index_admin.php"><img class="insertarlogo" src="../imagenes/eliminarLogo.png" alt="Imagen Logo"></a>

        <div class="librosdiv">

            <h1 class="tituloLibro"> Borrar Libros</h1>

          
            
            <form action='../admin_gestion.php' method='post'>
            <label>ISBN a Borrar</label>
            <input class='form-libros isbn' type='text' placeholder='Introduce ISBN que desee borrar (númerico y 13 caracteres)' name='isbn' id='isbn' size='48'>
            
            <input class='form-libros submitLibros' type='submit' id='submitBorraLibros' name='submitBorraLibros' value='Borrar Libro' onclick='return confirmar()'>
            <input class='form-libros submitLibrosTodo' type='submit' id='submitBorraLibrosTodo' name='submitBorraLibrosTodo' value='Borrar Todos Libro' onclick='return confirmar()'>

            </form>

            

           <img class="imagenLibro" src="../imagenes/libroRojo.png" alt="Imagen Libro">
        </div>

        <div class="personasdiv">

            <h1 class="tituloPersona"> Borrar Autor</h1>
            <form action="../admin_gestion.php" method="post">

                <label class="labelAutor">DNI a Borrar</label>
                <input class="form-persona dni" type="text" placeholder="Introduce DNI (8 números y una letra final)" name="dni" id="dni" size="48">
                
                <input class="form-persona submitPersona" type="submit" id="submitBorraPersona" name="submitBorraPersona" value="Borrar Autor" onclick='return confirmar()'>
                <input class="form-persona submitPersonaTodo" type="submit" id="submitBorraPersonaTodo" name="submitBorraPersonaTodo" value="Borrar Todos Autor" onclick='return confirmar()'>


            </form>

                <img class="imagenPersona" src="../imagenes/personaRoja.png" alt="Imagen Persona">


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

        <div class="advertenciadiv">

            <p id="errorTexto" class="errorTexto">

                <?php
                if(isset($_GET['advertencia']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                $errores = $_GET['advertencia'];
                if(!empty($errores)){

                $errores = $_GET['advertencia'];
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