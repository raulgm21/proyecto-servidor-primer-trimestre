<?php
session_start();                                // Iniciamos la sesión

if(isset($_SESSION['usuario']) == false){       // Comprobamos que existe la Sesión, en caso negativo nos mandará al INDEX
    header ("Location: ../index.php");

}else{

    if($_SESSION['tipo'] == "si"){              // Estamos iniciando sesión como ADMIN, si accedemos de otra manera como USUARIO no le dejara

    }else{
        header ("Location: ../usuario/index_usuario.php");
    }
}
?>


