<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Admin</title>
    <link rel="stylesheet" href="estilos/adminNuevo.css" type="text/css">
    <script src="scripts/errorLimpiezaNuevoAdmin.js" type="text/javascript"></script>
    <script src="scripts/nuevoAdmin.js"></script>
    <link rel="shortcut icon" href="imagenes/favicon.ico">

</head>
<body>

        <?php 
            // COMPROBACIÓN DE LAS SESIONES
            require_once '../sesion/comprobar_sesion_admin.php';   
        ?>

    <div class="contenedor">
    <h1>Introducir nuevos Administradores</h1>

    <form action="nuevoAdmin_gestion.php" method="POST">

        <input class="main__formulario-input nombre" type="text" placeholder="Nombre" size="32" name="nombre" id=nombre>
        <input class="main__formulario-input contrasenya"type="password" placeholder="Contraseña" size="32" name="contra" id=contra>
        <input class="main__formulario-input inicio" id="iniciar" name="iniciar" type="submit" value="Añadir">

    </form>
    </div>

    <p id="cambiarContraTexto" class="cambiarContraTexto">¿Has olvidado tu contraseña?<div class="contenedorContra"></div></p>

    <dialog id="cambiarContraModal">

                <h1 class="tituloCambiar">¡Hola!</h1>
                <p class="parrafoCambiar">¿Has olvidado su contraseña?, rellene los siguiente datos porfavor:</p>

                <form class="formCambiarContra" action="nuevoAdmin_gestion.php" method="POST">
                <label>Usuario:</label><input class="inputcambiarContra nombreMod" type="text" placeholder="Escriba su nombre" id="nombreMod" name="nombreMod">
                <label>Nueva Contraseña:</label><input class="inputcambiarContra contraMod" type="password" placeholder="Nueva contraseña" id="contraMod" name="contraMod">
                <label>Repita Contraseña:</label><input class="inputcambiarContra contraMod" type="password" placeholder="Repite la contraseña" id="contraMod2" name="contraMod2">
                    <input class="inputcambiarContra submitMod" type="submit" id="cambiarContra" name="cambiarContra" value="Cambiar Contraseña">
                </form>
                <button id="cambiarAtras" class="cambiarAtras">Atrás</button>

    </dialog>




    <div class="errorTexto">
        <p class="error">

        <?php
        if(isset($_GET['error']) && $_SERVER["REQUEST_METHOD"] == "GET"){
            $errores = $_GET['error'];
            if(!empty($errores)){

            $errores = $_GET['error'];
            echo $errores;
        }
    
        }
        ?>

        
        </p>
    </div>

    <div class="menu">

        <button><a href="index_admin.php">Volver Atrás</a></button>
    </div>

</body>
</html>