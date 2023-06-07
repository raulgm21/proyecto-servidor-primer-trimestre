<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/indexlogin.css" type="text/css">

    <script src="scripts/ScriptIndex.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="estilos/cookie.css" type="text/css">

    <link rel="shortcut icon" href="imagenes/favicon.ico">

    <title>Index</title>

</head>

<body>

    <img class="logo" src="imagenes/logo.png">

    <!----------------------------------------- COOKIES ------------------------------------------->

    <dialog id="modalCookie">
        <h2 id="tituloCookie">POLÍTICA DE COOKIES</h2>
        <img id="imagenCookie" src="imagenes/galleta.png" alt="Una imagen de galleta para la cookie">
        <p id="textoCookie">

            El acceso a este Sitio Web puede implicar la utilización de cookies. Las cookies son pequeñas cantidades de información que se almacenan en el navegador utilizado por cada Usuario —en los distintos dispositivos que pueda utilizar para navegar— para que el servidor recuerde cierta información que posteriormente y únicamente el servidor que la implementó leerá. Las cookies facilitan la navegación, la hacen más amigable, y no dañan el dispositivo de navegación.

            Las cookies son procedimientos automáticos de recogida de información relativa a las preferencias determinadas por el Usuario durante su visita al Sitio Web con el fin de reconocerlo como Usuario, y personalizar su experiencia y el uso del Sitio Web, y pueden también, por ejemplo, ayudar a identificar y resolver errores.
            
            La información recabada a través de las cookies puede incluir la fecha y hora de visitas al Sitio Web, las páginas visionadas, el tiempo que ha estado en el Sitio Web y los sitios visitados justo antes y después del mismo. Sin embargo, ninguna cookie permite que esta misma pueda contactarse con el número de teléfono del Usuario o con cualquier otro medio de contacto personal. Ninguna cookie puede extraer información del disco duro del Usuario o robar información personal. La única manera de que la información privada del Usuario forme parte del archivo Cookie es que el usuario dé personalmente esa información al servidor.
            
            Las cookies que permiten identificar a una persona se consideran datos personales. Por tanto, a las mismas les será de aplicación la Política de Privacidad anteriormente descrita. En este sentido, para la utilización de las mismas será necesario el consentimiento del Usuario. Este consentimiento será comunicado, en base a una elección auténtica, ofrecido mediante una decisión afirmativa y positiva, antes del tratamiento inicial, removible y documentado.
            
            Cookies propias
            Son aquellas cookies que son enviadas al ordenador o dispositivo del Usuario y gestionadas exclusivamente por Libro para el mejor funcionamiento del Sitio Web. La información que se recaba se emplea para mejorar la calidad del Sitio Web y su Contenido y su experiencia como Usuario. Estas cookies permiten reconocer al Usuario como visitante recurrente del Sitio Web y adaptar el contenido para ofrecerle contenidos que se ajusten a sus preferencias.
            
            Deshabilitar, rechazar y eliminar cookies
            El Usuario puede deshabilitar, rechazar y eliminar las cookies —total o parcialmente— instaladas en su dispositivo mediante la configuración de su navegador (entre los que se encuentran, por ejemplo, Chrome, Firefox, Safari, Explorer). En este sentido, los procedimientos para rechazar y eliminar las cookies pueden diferir de un navegador de Internet a otro. En consecuencia, el Usuario debe acudir a las instrucciones facilitadas por el propio navegador de Internet que esté utilizando. En el supuesto de que rechace el uso de cookies —total o parcialmente— podrá seguir usando el Sitio Web, si bien podrá tener limitada la utilización de algunas de las prestaciones del mismo.
            
            Este documento de Política de Cookies ha sido creado mediante el generador de plantilla de política de cookies online el día 03/11/2022.


        </p>
        <button id="aceptarCookie">Aceptar</button>
        <button id="denegarCookie">Denegar</button>
    </dialog>

    <!--------------------------------------------------------------------------------------------->

    <header class="header">

        <nav class="nav">
            <ul class="nav__ul">
                <li class="nav__ul-li nav__ul-li-active"><a href="#">Inicio</a></li>
                <li class="nav__ul-li"><a href="contacto/opiniones.php">Opiniones</a></li>
            </ul>
        </nav>

    </header>

    <main class="main">
        <h1 class="main__h1">¡ Bienvenido !</h1>

        <form class="main__formulario" action="gestion_index.php" method="POST">

            <input class="main__formulario-input nombre" type="text" placeholder="Nombre (máx 20 caracteres o números)" size="32" name="nombre" id="nombre">
            <input class="main__formulario-input contrasenya"type="password" placeholder="Contraseña (min 8 caracteres)" size="32" name="contra" id="contra">
            <input class="main__formulario-input inicio" id="iniciar" name="iniciar" type="submit" value="Iniciar Sesión">
            <!--<input class="main__formulario-input registrar" id="registrar" name="registrar" type="submit" value="Registrar">-->

        </form>

        <button id="registrarBoton">Registrar</button>

        <dialog id="modalRegistrar">

            <img class="logoRegistrar" src="imagenes/logo.png">

                <h1 class="tituloRegistrar">¡Hola!</h1>
                <p class="parrafoRegistrar">¡Estas a un simple paso de crear tu cuenta!</p>
                <p class="parrafoRegistrar2">Rellene el siguiente formulario porfavor </p>

                <form class="main__formulario" action="gestion_index.php" method="POST">

                <label class="labelRegistrar">Usuario:</label><input class="main__formulario-input nombre2" type="text" placeholder="Nombre (máx 20 caracteres o números)" size="32" name="nombre" id="nombre">
                <label class="labelRegistrar">Contraseña:</label><input class="main__formulario-input contrasenya2"type="password" placeholder="Contraseña (min 8 caracteres)" size="32" name="contra" id="contra">
                <label class="labelRegistrar">Repita Contraseña:</label><input class="main__formulario-input contrasenya2"type="password" placeholder="Contraseña (min 8 caracteres)" size="32" name="contra2" id="contra2">
                <input class="main__formulario-input registrar2" id="registrar" name="registrar" type="submit" value="Registrar">

            </form>

            <button id="cerrarRegistrar">Volver Atrás</button>

        </dialog>



        <div class="linea"></div>
        <p id="cambiarContra" class="cambiarContra">¿Has olvidado tu contraseña?</p>

        <dialog id="cambiarContraModal">

                <h1 class="tituloCambiar">¡Hola!</h1>
                <p>¿Has olvidado su contraseña?, rellene los siguiente datos porfavor:</p>

                <form class="formCambiarContra" action="gestion_index.php" method="POST">
                    <label>Usuario:</label> <input class="inputcambiarContra nombreMod" type="text" placeholder="Escriba su nombre" id="nombreMod" name="nombreMod">
                    <label>Nueva Contraseña:</label><input class="inputcambiarContra contraMod" type="password" placeholder="Nueva contraseña" id="contraMod" name="contraMod">
                    <label>Repita Contraseña:</label><input class="inputcambiarContra contraMod" type="password" placeholder="Repite la contraseña" id="contraMod2" name="contraMod2">
                    <input class="inputcambiarContra submitMod" type="submit" id="cambiarContra" name="cambiarContra" value="Cambiar Contraseña">
                </form>
                <button id="cambiarAtras" class="cambiarAtras">Atrás</button>

        </dialog>


        <div class="linea"></div>

    </main>



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


    <aside class="aside">
        <img class="aside__img" src="imagenes/formularioUsuario.PNG">
    </aside> 




    <footer class="footer">

   
        <p id="avisoPulsa"><a id="avisoPulsa">Consultar Aviso Legal</a></p>
        <p id="datos"><a id="datos">Consultar Privacidad de Datos</a></p>

         <!--AVISO LEGAL-->

        <dialog id="dialogAviso">

            <p class="contenidoAviso">

                <?php

                /*--------------------------------------------------------------------------------/
                FICHERO PARA MOSTRAR EL RGPD: Muestra el Aviso Legal
                /--------------------------------------------------------------------------------*/

                $fichero = file_get_contents("privacidad/avisolegal.txt");
                    // --- Convierte los saltos de línea --- //
                $conSaltos = str_replace("\n", "<br>", $fichero);
                
                echo $conSaltos

                ?>

            </p>
            <button id="volver"><a id="volverA" href="index.php">Volver al Inicio</a></button>
        </dialog>


        <!--PRIVACIDAD DE DATOS-->


        <dialog id="dialogPrivacidad">

            <p class="contenidoPrivacidad">

            <?php

            /*--------------------------------------------------------------------------------/
            FICHERO PARA MOSTRAR EL RGPD: Muestra la Privacidad de Datos.
            /--------------------------------------------------------------------------------*/

            $fichero = file_get_contents("privacidad/rgpd.txt");
                // --- Convierte los saltos de línea --- //
            $conSaltos = str_replace("\n", "<br>", $fichero);

            echo $conSaltos

            ?>

            </p>
            <button id="volver"><a id="volverP" href="index.php">Volver al Inicio</a></button>
        </dialog>
        

        <div class="rrss" id="instagram"></div>
        <div class="rrss" id="twitter"></div>
        <div class="rrss" id="facebook"></div>
        <div class="rrss" id="whatsapp"></div>
        
    </footer>
    
    <p>

    </p>
    
    
</body>



</html>

<?php

?>
