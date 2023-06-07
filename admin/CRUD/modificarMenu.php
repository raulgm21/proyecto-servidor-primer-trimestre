<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDD - Menú Modificar</title>
    <link rel="stylesheet" href="../estilos/admin_Modificar.css" type="text/css">
    <link rel="shortcut icon" href="../imagenes/favicon.ico">

</head>
<body>

        <?php 
            // COMPROBACIÓN DE LAS SESIONES
            require_once '../../sesion/comprobar_sesion_admin.php';   
        ?>
       
        
<div class="contenedorModificar">
    <div class="clavePrimaria">
        <a href="modificarClaves.php"><img class="inicioPrimaria" src="../imagenes/modificarPrimaria.png" alt="Menu Primaria"></a>
        <h1 class="textoPrimario">Modificar ISBN/DNI</h1>
    </div>

    <div class="claveModificar">
        <a href="modificarParametros.php"><img class="inicioModificar" src="../imagenes/modificarValores.png" alt="Menu Parametros"></a>
        <h1 class="textoModificar">Modificar Libro/Autor</h1>
    </div>

    <button class="botonMenu"><a class="botonMenuEnlace" href="../index_admin.php">Volver Atrás</a></button>
</div>
   

</body>
</html>