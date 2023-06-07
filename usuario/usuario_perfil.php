<?php $conexion = mysqli_connect('localhost','root','','biblioteca'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Mi perfil!</title>
    <link rel="shortcut icon" href="../imagenes/favicon.ico">
    <link rel="stylesheet" href="estilos/usuario_perfil.css" type="text/css">
    <script src="scripts/perfil.js"></script>
    
    <script>

    function confirmar()
    {
        var respuesta = confirm("¿Estas seguro que quieres borrar?");

        if(respuesta == true){

            var respuesta = confirm("¿Estas seguro?, una vez hecho es algo irreversible");

            if(respuesta == true){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    </script>

</head>
<body>
    

    <img class="fondo" src="imagenes/fondoPerfil.png" alt="">


        <?php 
            // COMPROBACIÓN DE LAS SESIONES
           require_once '../sesion/comprobar_sesion_usuario.php'; 
          
            echo "<div class='contenedor'>";

                $nombre      = $_SESSION['usuario'];
                echo "<h1 class='nombreUsuario'>¡Hola $nombre!</h1>";

                $consultarPrestamos    =  "SELECT COUNT(nombre) FROM prestamo WHERE nombre='$nombre'";
                $mostrarConsulta        = mysqli_query($conexion,$consultarPrestamos);
    
                foreach($mostrarConsulta as $variable){        
                    foreach($variable as $valor){
                    $prestamo  = $valor;
                    }
                }

                if($prestamo == 1){
                    echo "<p class='texto'>¡Usted tiene un total de <strong>$prestamo</strong> préstamo actualmente!</p>";
                }else{
                    echo "<p class='texto'>¡Usted tiene un total de <strong>$prestamo</strong> préstamos actualmente!</p>";
                }

                
                echo "<button class='volver'><a class='volverEnlace' href='index_usuario.php'>Volver al Inicio</a></button>";

                echo "<button id='modificar' class='modificar'><a id='modificar' class='modificarEnlace'>Modificar Contraseña</a></button>";
               
                echo "<a class='eliminarEnlace' href='usuario_gestion.php?borrar=$nombre' onclick='return confirmar()'><button class='eliminar'>Eliminar Cuenta</button></a>";
           
                echo "</div>";
        ?>

        <p id="errorTexto" class="error">
        
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

        <dialog id="mostrarFormu">

        <h1 class="tituloCambiar">¡Hola!</h1>
        <p>¿Quieres modificar su contraseña?, rellene los siguiente datos porfavor:</p>

        <form class="formCambiarContra" action="usuario_gestion.php" method="POST">
            <label>Nueva Contraseña:</label><input class="inputcambiarContra contraMod" type="password" placeholder="Nueva contraseña" id="contraMod" name="contraMod">
            <label>Repite Contraseña:</label><input class="inputcambiarContra contraMod" type="password" placeholder="Repite la contraseña" id="contraMod2" name="contraMod2">
            <input class="inputcambiarContra modificarPerfil" type="submit" id="modificarPerfil" name="modificarPerfil" value="Cambiar Contraseña">
        </form>
        <button id="cambiarAtras" class="cambiarAtras">Atrás</button>

        </dialog>


</body>
</html>