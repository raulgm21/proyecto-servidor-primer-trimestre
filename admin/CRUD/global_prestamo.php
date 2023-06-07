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
        <li class="item"><a href="global_libros.php">Libros</a></li>
        <li class="item"><a href="global_autor.php">Autor</a></li>
        <li class="item"><a>Prestamo</a></li>
    </ul>
</div>


<div class="contenedor">

    <table>

    <!-- FILA PADRE DE LA TABLA -->
    <tr class="destacar">
        <td>ISBN</td>
        <td>Usuario</td>
        <td>Fecha de Entrega</td>
        <td>Fecha de Devolución</td>
    </tr>

    <?php
            
        // Seleccionamos todos los LIBROS y la insertaremos en la tabla con un fetch_array

        $prestamo      = "SELECT * FROM prestamo";
        $resultado  = mysqli_query($conexion,$prestamo);

        while($mostrar = mysqli_fetch_array($resultado)){
            
    ?>

        <tr>
            <!-- Inserta todas las filas -->
            <td><?php echo $mostrar['isbn'] ?></td>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['fecha_entrega'] ?></td>
            <td><?php echo $mostrar['fecha_devolucion'] ?></td>


            <!-- Insertar el boton ELIMINAR -->
            <td>
                <div class="borrar" style="position : relative; top : 0px;">
 
                    <?php
                    $isbn                   = rawurlencode($mostrar['isbn']);
                    $nombre                 = rawurlencode($mostrar['nombre']);
                    $fecha_entrega          = rawurlencode($mostrar['fecha_entrega']);
                    $fecha_devolucion       = rawurlencode($mostrar['fecha_devolucion']);

                    echo "<form action=../admin_gestion.php?isbnGET=$isbn&nombreGET=$nombre&fechaEntrega=$fecha_entrega&fechaDevolucion=$fecha_devolucion method='post'>";
                    echo "<input type='submit' name='prestamoBorrar' id='prestamoBorrar' value='Eliminar' class='textoBorrar' onclick='return confirmacion()'>";
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


