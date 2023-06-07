<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Admin</title>

    <link rel="stylesheet" href="estilos/admin_Index.css" type="text/css">
    
    <link rel="shortcut icon" href="../imagenes/favicon.ico">

   

</head>
<body>
    
<img class="encabezado" src="imagenes/cabecera.png" alt="Cabecera de Administrador">


        <?php 
            // COMPROBACIÓN DE LAS SESIONES
            require_once '../sesion/comprobar_sesion_admin.php';  
        ?>
    
    
    <h1 class="tituloUsuario">¡ Bienvenido <?php echo $_SESSION['usuario'];  ?> !</h1>
    <button class="botonCerrar"><a class="cerrar" href="../sesion/cerrar_sesion.php">Cerrar Sesion</a></button>

    <div class="contenedor">

        <div class="insertar">

        <!--<h1 class="tituloInsertar">Insertar</h1>-->
        <a href="CRUD/insertar.php"><img src="imagenes/insertar.png" alt="Imagen para Insertar"></a>

        </div>

        <div class="eliminar">

        <!--<h1 class="tituloEliminar">Eliminar</h1>-->
        <a href="CRUD/eliminar.php"><img src="imagenes/eliminar.png" alt="Imagen para Eliminar"></a>

        </div>

        <div class="modificar">

        <!--<h1 class="tituloModificar">Modificar</h1>-->
        <a href="CRUD/modificarMenu.php"><img src="imagenes/modificar.png" alt="Imagen para Modificar"></a>

        </div>

        <div class="consultar">

        <!--<h1 class="tituloConsultar">Consultar</h1>-->
        <a href="CRUD/consultar.php"><img src="imagenes/consultar.png" alt="Imagen para Consultar"></a>

        </div>

        

        <div class="admin">

        <a href="nuevoAdmin.php"><img src="imagenes/admin.jpg" alt="Imagen para Administrador"></a>

        </div>

        <div class="conjunto">

        <a href="CRUD/global_libros.php"><img src="imagenes/conjunto.png" alt="Imagen para CRUD"></a>

        </div>

    </div>
        
</body>
</html>