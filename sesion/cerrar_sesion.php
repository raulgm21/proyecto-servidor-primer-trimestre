<?php

session_start();                            // Iniciamos la sesión
session_destroy();                          // Eliminamos la sesión
header ("Location: ../index.php");          // Nos dirige al INDEX


?>