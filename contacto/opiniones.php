<?php

$conexion = mysqli_connect('localhost','root','','biblioteca');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opiniones</title>
    <link rel="stylesheet" href="../estilos/OpinionesContacto.css" type="text/css">
    <link rel="shortcut icon" href="../imagenes/favicon.ico">
</head>
<body>
    <div>
        <h1 class="titulo">¡Opiniones de nuestros usuarios!</h1>    
        <a class="atrasEnlace" href="../usuario/index_usuario.php"><button class="atras">Volver al Inicio</button></a>
    </div>
    <?php
    
    // Selecionamos todas las recomendaciones
    $consultas  = "SELECT * FROM recomendaciones";
    $resultado  = mysqli_query($conexion,$consultas);

    
    // Transformamos el texto de la base de datos por estrellas
    while($mostrar = mysqli_fetch_array($resultado)){
    
        switch ($mostrar['estrella']) {
            case "5estrella":
                $estrella = "✨✨✨✨✨";
                break;
            case "4estrella":
                $estrella = "✨✨✨✨";
                break;
            case "3estrella":
                $estrella = "✨✨✨";
                break;
            case "2estrella":
                $estrella = "✨✨";
                break;
            case "1estrella":
                $estrella = "✨";
                break;
        }

    ?>

    <div class="contenedor"> 
    <h1><?php echo $mostrar['nombre']."  ".$estrella ?></h1>
    <p><?php echo $mostrar['recomendacion'] ?><p>
    </div>

    <?php
    }
    ?>

</body>
</html>