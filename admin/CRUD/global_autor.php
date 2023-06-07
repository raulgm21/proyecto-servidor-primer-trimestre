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
        <li class="item"><a>Autor</a></li>
        <li class="item"><a href="global_prestamo.php">Prestamo</a></li>
    </ul>
</div>

<div class="contenedor">

    <table>

    <!-- FILA PADRE DE LA TABLA -->
    <tr class="destacar">
        <td>DNI</td>
        <td>Nombre</td>
        <td>Fecha de Nacimiento</td>
    </tr>

    <?php
            
        // Seleccionamos todos los AUTOR y la insertaremos en la tabla con un fetch_array

        $autor      = "SELECT * FROM autor";
        $resultado  = mysqli_query($conexion,$autor);

        while($mostrar = mysqli_fetch_array($resultado)){
            
    ?>

        <tr>
            <!-- Inserta todas las filas -->
            <td><?php echo $mostrar['dni'] ?></td>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['fecha_nacimiento'] ?></td>

            <!-- Insertar el boton MODIFICAR -->
            <td>

                <div class="modificar" style="position : relative; top : 0px;">

                    <?php
                   
                    $dni        = rawurlencode($mostrar['dni']);
                    $nombre     = rawurlencode($mostrar['nombre']);
                    $fecha      = rawurlencode($mostrar['fecha_nacimiento']);
                  
                    echo "<a href=modificarParametros.php?dniGET=$dni&nombreGET=$nombre&fechaGET=$fecha class='textoModificar'>Modificar</a>";
                        
                    ?>   
                    
                </div>
            </td>

            <!-- Insertar el boton MODIFICAR CLAVE -->
            <td>
                <div class="modificarClave" style="position : relative; top : 0px;">
                    
                
                    <?php
                    
                    $dni        = rawurlencode($mostrar['dni']);
                    echo "<a href=modificarClaves.php?dniGET=$dni class='textoModificarClave'>Modificar DNI</a>";
                        
                    ?> 
                    
                </div>
            </td>

            <!-- Insertar el boton ELIMINAR -->
            <td>
                <div class="borrar" style="position : relative; top : 0px;">
                    
                    <?php
                    $dni        = rawurlencode($mostrar['dni']);
                    echo "<form action=../admin_gestion.php?dniBorrar=$dni method='post'>";
                    echo "<input type='submit' name='autorBorrar' id='autorBorrar' value='Eliminar' class='textoBorrar' onclick='return confirmacion()'>";
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


