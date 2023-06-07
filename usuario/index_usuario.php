<?php

$conexion = mysqli_connect('localhost','root','','biblioteca'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/usuario_style.css" type="text/css">
    <title>Inicio Usuario</title>
    <link rel="shortcut icon" href="../imagenes/favicon.ico">

    <script src="scripts/navegador.js"></script>

</head>
<body>
    
<img class="encabezado" src="imagenes/encabezado.png" alt="Cabecera de usuarios">


        <?php 
            // COMPROBACIÓN DE LAS SESIONES
           require_once '../sesion/comprobar_sesion_usuario.php'; 
          
           $nombre      = $_SESSION['usuario'];
           echo "<h1 class='nombreUsuario'>Hola $nombre </h1>";
        ?>
  
        <button class="botonCerrar"><a class="cerrar" href="../sesion/cerrar_sesion.php">Cerrar Sesion</a></button>


        <ul class="menu">

            <li class="menu-li"><a href="usuario_perfil.php">Mi perfil</a></li>
            <li class="menu-li"><a href="../contacto/opiniones.php">Opiniones</a></li>
            <li class="menu-li"><a href="../contacto/contacto.php">Contacto</a></li>


        </ul>

        <label>Escriba él libro que desee:</label>

        <form>
        <input name="navegador" id="navegador" class="navegador" type="text" list="buscarlibro" placeholder="Ejemplo: Fuego y Sangre">
        </form> 

            <datalist id="buscarlibro">
                    
                <?php
                    
                $libro      = "SELECT * FROM libros";
                $resultado  = mysqli_query($conexion,$libro);
            
                while($mostrar = mysqli_fetch_array($resultado)){
                        
                ?>

                <option value="<?php echo $mostrar['titulo']; ?>"></option>

                
            <?php
            }
            ?>

            </datalist>

            <!-- Mostrar Los Libros NO DISPONIBLES -->
            <div id="contenedorLibroVacio">
            
                <?php

                    if(isset($_GET['navegador']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                        $busqueda   = $_GET["navegador"];
                        if(!empty($busqueda)){
                        

                            $clave      = "SELECT * FROM libros WHERE titulo LIKE '$busqueda%' AND cantidad = 0";
                            $consultar  = mysqli_query($conexion, $clave);
                            
                            while($mostrar = mysqli_fetch_array($consultar)){
                ?>
                        <h1 id='nohay'>¡Actualmente no está disponible, lo sentimos!</h1>
                        <div id="contenedorHijoVacio">
                            <p id="tocarLibroVacio"><?php echo $mostrar['titulo']?></p>
                        </div>

                <?php
                            }   // Llave del While
                        }       // Llave del if !empty($busqueda)
                    }           // Llave del if $_GET['navegador']

                ?>
            </div>

            <!-- Mostrar Los Libros DISPONIBLES -->
            <div id="contenedorLibro">
                
                <?php

                    if(isset($_GET['navegador']) && $_SERVER["REQUEST_METHOD"] == "GET"){
                        $busqueda   = $_GET["navegador"];
                        if(!empty($busqueda)){
        

                            $clave      = "SELECT * FROM libros WHERE titulo LIKE '$busqueda%' AND cantidad > 0";
                            $consultar  = mysqli_query($conexion, $clave);
                            
                            while($mostrar = mysqli_fetch_array($consultar)){
                ?>

                        <?php

                            $isbn       = rawurlencode($mostrar['isbn']);
                            $titulo     = rawurlencode($mostrar['titulo']);
                            $autor      = rawurlencode($mostrar['dni_autor']);
                            $paginas    = rawurlencode($mostrar['paginas']);
                            $genero     = rawurlencode($mostrar['genero']);

                        echo "<a href='usuario_prestamo.php?isbnGET=$isbn&tituloGET=$titulo&autorGET=$autor&paginasGET=$paginas&generoGET=$genero'><img class='imagenLibro' src='imagenes/libro.png' alt=''></a>";
                        ?>
                        <div id="contenedorHijo">
                            <p id="tocarLibro"><?php echo $mostrar['titulo']?></p>
                        </div>

                <?php
                            }   // Llave del While
                        }       // Llave del if !empty($busqueda)
                    }           // Llave del if $_GET['navegador']

                ?>
            </div>
            
            




</body>

</html>
