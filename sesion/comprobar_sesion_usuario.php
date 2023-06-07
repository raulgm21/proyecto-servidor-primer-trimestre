<?php
session_start();                                // Iniciamos la sesión

if(isset($_SESSION['usuario']) == false){       // Comprobamos que existe la Sesión, en caso negativo nos mandará al INDEX
    header ("Location: ../index.php");

}else{

    if($_SESSION['tipo'] == "no"){              // Estamos iniciando sesión como USUARIO, si accedemos de otra manera como ADMIN no le dejara

    }else{
        header ("Location: ../admin/index_admin.php");
    }
}
?>


