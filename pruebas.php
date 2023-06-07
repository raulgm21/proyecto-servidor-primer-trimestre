<?php

$conexion = mysqli_connect('localhost','root','','biblioteca');

// Meter Autores

$autor1 = "INSERT INTO autor (dni,nombre,fecha_nacimiento) VALUES ('11111111A','Luis','1999/01/01')";
$meter1 =  mysqli_query($conexion, $autor1);

$autor2 = "INSERT INTO autor (dni,nombre,fecha_nacimiento) VALUES ('11111111B','Pepe','1998/01/01')";
$meter2 =  mysqli_query($conexion, $autor2);

$autor3 = "INSERT INTO autor (dni,nombre,fecha_nacimiento) VALUES ('11111111C','Sara','1999/02/01')";
$meter3 =  mysqli_query($conexion, $autor3);

$autor4 = "INSERT INTO autor (dni,nombre,fecha_nacimiento) VALUES ('11111111D','Ana','1997/01/01')";
$meter4 =  mysqli_query($conexion, $autor4);

$autor5 = "INSERT INTO autor (dni,nombre,fecha_nacimiento) VALUES ('11111111E','Jose María','1999/11/11')";
$meter5 =  mysqli_query($conexion, $autor5);

$autor6 = "INSERT INTO autor (dni,nombre,fecha_nacimiento) VALUES ('11111111F','Joan','1999/01/01')";
$meter6 =  mysqli_query($conexion, $autor6);

// Meter Libros

$libro1 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000001','Libro Rojo','','35','Fantasia','7')";
$meter1 =  mysqli_query($conexion, $libro1);

$libro2 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000002','Libro Verde','11111111A','38','Fantasia','9')";
$meter2 =  mysqli_query($conexion, $libro2);

$libro3 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000003','Libro Azul','11111111A','106','Terror','93')";
$meter3 =  mysqli_query($conexion, $libro3);

$libro4 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000004','Libro Amarillo','','102','Medieval','2')";
$meter4 =  mysqli_query($conexion, $libro4);

$libro5 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000005','El Principe','11111111C','111','Fantasia','9')";
$meter5 =  mysqli_query($conexion, $libro5);

$libro6 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000006','Magia y Muerte','11111111B','92','Misterio','80')";
$meter6 =  mysqli_query($conexion, $libro6);

$libro7 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000007','Libro Rojo II','','38','Fantasia','8')";
$meter7 =  mysqli_query($conexion, $libro7);

$libro8 = "INSERT INTO libros (isbn,titulo,dni_autor,paginas,genero,cantidad) VALUES ('0000000000008','Fuego y Sangre','11111111F','438','Fantasia','942')";
$meter8 =  mysqli_query($conexion, $libro8);



echo "VALORES METIDOS";
?>