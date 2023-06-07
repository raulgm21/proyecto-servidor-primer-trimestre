<?php $conexion = mysqli_connect('localhost','root','','biblioteca'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/admin_Global.css" type="text/css">
    <title>CRUD - GLOBAL</title>
    <link rel="shortcut icon" href="../imagenes/favicon.ico">

    <script>
    function confirmacion()
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
    <h1 class="titulo">¡ CRUD - GLOBAL !</h1>
    <button class="botonMenu"><a class="botonMenuEnlace" href="../index_admin.php">Volver al Menú</a></button>
</div>

<div class="menu">
    <ul class="lista">
        <li class="item"><a>Libros</a></li>
        <li class="item"><a href="global_autor.php">Autor</a></li>
        <li class="item"><a href="global_prestamo.php">Prestamo</a></li>
    </ul>
</div>


<div class="contenedor">

    <table>

    <!-- FILA PADRE DE LA TABLA -->
    <tr class="destacar">
        <td>ISBN</td>
        <td>Titulo</td>
        <td>Autor</td>
        <td>Paginas</td>
        <td>Genero</td>
        <td>Cantidad</td>
    </tr>

    <?php
            
        // Seleccionamos todos los LIBROS y la insertaremos en la tabla con un fetch_array

        $libro      = "SELECT * FROM libros";
        $resultado  = mysqli_query($conexion,$libro);

        while($mostrar = mysqli_fetch_array($resultado)){
            
    ?>

        <tr>
            <!-- Inserta todas las filas -->
            <td><?php echo $mostrar['isbn'] ?></td>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['dni_autor'] ?></td>
            <td><?php echo $mostrar['paginas'] ?></td>
            <td><?php echo $mostrar['genero'] ?></td>
            <td><?php echo $mostrar['cantidad'] ?></td>

            <!-- Insertar el boton MODIFICAR -->
            <td>

                <div class="modificar" style="position : relative; top : 0px;">

                    <?php
                    
                    $isbn       = rawurlencode($mostrar['isbn']);
                    $titulo     = rawurlencode($mostrar['titulo']);
                    $autor      = rawurlencode($mostrar['dni_autor']);
                    $paginas    = rawurlencode($mostrar['paginas']);
                    $genero     = rawurlencode($mostrar['genero']);
                    $cantidad   = rawurlencode($mostrar['cantidad']);
                
                    echo "<a href=modificarParametros.php?isbnGET=$isbn&tituloGET=$titulo&autorGET=$autor&paginasGET=$paginas&generoGET=$genero&cantidadGET=$cantidad class='textoModificar'>Modificar</a>";
                        
                    ?>   
                    
                </div>
            </td>

            <!-- Insertar el boton MODIFICAR CLAVE -->
            <td>
                <div class="modificarClave" style="position : relative; top : 0px;">
                    
                
                    <?php
                    
                    $isbn       = rawurlencode($mostrar['isbn']);
                
                    echo "<a href=modificarClaves.php?isbnGET=$isbn class='textoModificarClave'>Modificar ISBN</a>";
                        
                    ?> 
                    
                </div>
            </td>

            <!-- Insertar el boton ELIMINAR -->
            <td>
                <div class="borrar" style="position : relative; top : 0px;">
 
                    <?php
                    $isbn       = rawurlencode($mostrar['isbn']);
                    echo "<form action=../admin_gestion.php?isbnBorrar=$isbn method='post'>";
                    echo "<input type='submit' name='textoBorrar' id='textoBorrar' value='Eliminar' class='textoBorrar' onclick='return confirmacion()'>";
                    echo "</form>";
                        
                    ?> 

                </div>
            </td>

        </tr>

    <?php
        }
    ?>

    </table>

</div>


<div class="insertar">
    <a href="insertar.php" class="textoInsertar">Añadir Nuevo</a>
</div>




</body>
</html>


