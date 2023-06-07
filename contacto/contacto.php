<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="../estilos/contacto.css" type="text/css">
    <link rel="shortcut icon" href="../imagenes/favicon.ico">
</head>

      
<body>
 
<?php 
    // COMPROBACIÓN DE LAS SESIONES
    session_start(); 
?>

    <div class="contenido">
        <h1>¡Mande su recomendación!</h1>
        <form action="gestion_contacto.php" method="POST">
            <input class="nombre" type="text" placeholder="Nombre de usuario" size="40" name="nombre" id="nombre" value="<?php echo $_SESSION['usuario']?>">
            <p class="nombreContra">Si deseas que el mensaje sea anónimo, borre el nombre :)</p>
            <textarea class="recomendacion" maxlength="800" rows="6" cols="50" name="recomendacion" id="recomendacion" placeholder="Escriba su recomendación (máximo de 800 caracteres)"></textarea>

            <label>Valoración</label>
            <select class="opinion" name="estrella" id="estrella">
                <option value="5estrella">5✨</option>
                <option value="4estrella">4✨</option>
                <option value="3estrella">3✨</option>
                <option value="2estrella">2✨</option>
                <option value="1estrella">1✨</option>
              </select>

            <input class="mandar" id="mandar" name="mandar" type="submit" value="Mandar Opinión">
        </form>

        <a class="atrasEnlace" href="../usuario/index_usuario.php"><button class="atras">Volver Atrás</button></a>
        
        <p id="errorTexto" class="error" style="color : #fff">
        
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
</body>
</html>