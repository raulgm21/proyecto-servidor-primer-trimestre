<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Prestámo</title>
    <link rel="shortcut icon" href="../imagenes/favicon.ico">
    <link rel="stylesheet" href="estilos/prestamo.css" type="text/css">
    <script src="scripts/prestamo.js"></script>

</head>
<body>
    
        <?php 
            // COMPROBACIÓN DE LAS SESIONES
           require_once '../sesion/comprobar_sesion_usuario.php'; 
          
       
        ?>

<img id="imagen" class="mitad" src="imagenes/prestamo.png" alt="">

<div class="info">
    <p class="textoGET">

    <?php
        if(isset($_GET['error']) && $_SERVER["REQUEST_METHOD"] == "GET"){
            $errores = $_GET['error'];
            if(!empty($errores)){

            $errores = $_GET['error'];
            echo $errores;

            echo "<a id='errorInicio' href='index_usuario.php'>Volver</a>";
        }
    
        
    }
    ?>
    </p>
    
</div>

<div class="contenedor">
    <h1 class="tituloArriba">¡Hola <?php echo $_SESSION['usuario']?>!</h1>
    <p class="parrafo">Aqui dispone de más información sobre el libro que desea</p>


    <?php

    if(isset($_GET['isbnGET']) && $_SERVER["REQUEST_METHOD"] == "GET"){
        $isbn = $_GET['isbnGET'];
        if(!empty($isbn)){

        $isbn           = $_GET['isbnGET'];
        $titulo         = $_GET['tituloGET'];
        $autor          = $_GET['autorGET'];
        $genero         = $_GET['generoGET'];
        $paginas        = $_GET['paginasGET'];
    

        $hoy            = date("Y-m-d");

    echo "<div class='contenedorDiv'>";
        echo "<div class='divIsbn'>";
            echo "<label>ISBN</label>";
            echo "<p>$isbn</p>";
        echo "</div>";

        echo "<div class='divTitulo'>";
            echo "<label>Titulo</label>";
            echo "<p>$titulo</p>";
        echo "</div>";

        echo "<div class='divAutor'>";
            echo "<label>Autor</label>";
            echo "<p>$autor</p>";
        echo "</div>";

        echo "<div class='divGenero'>";
            echo "<label>Genero</label>";
            echo "<p>$genero</p>";
        echo "</div>";

        echo "<div class='divPaginas'>";
            echo "<label>Paginas</label>";
            echo "<p>$paginas</p>";
        echo "</div>";
    echo "</div>";


        echo "<button id='quieroBoton' class='quieroBoton'>¡Lo quiero!</button>";

        echo "<dialog id='mostrarFormu'>";

            echo "<h1 id='modalTitulo'>¡Estas apunto de tener tu deseado libro!</h1>";
            echo "<p id='modalParrafo'>Indique porfavor la fecha de la devolución </p>";
            echo "<p id='modalParrafo2'>No puede superior a un mes</p>";

            echo "<form action='usuario_gestion.php' method='post' id='formulario'>";

                echo "<input class='isbn activo' type='text' name='isbn' id='isbn' size='48' value='$isbn' readonly>";
                echo "<input class='nombre activo' type='text' name='nombre' id='nombre' size='48' value='$_SESSION[usuario]' readonly>";
                echo "<input class='fecha activo' type='date' name='fecha' id='fecha' value='$hoy' readonly>";
                echo "<input class='fechadev' type='date' name='fechadev' id='fechadev' size='48'>";

            echo "<input class='enviar' type='submit' name='enviar' id='enviar' value='¡Enviar!'>";
            
            echo "</form>";

            echo "<button class='cerrarBoton' id='cerrarBoton'>Volver Atrás</button>";

        echo "</dialog>";

        echo "<button class='atrasBoton'><a class='atras' href='index_usuario.php'>Volver Atrás</a></button>";




        }

    }



?>











</div>




</body>
</html>