<?php
//Datos del servidor
$servidor ="localhost";
$clave ="";
$usuario ="root";
$baseDeDatos ="colegio";

//datos de coneccion al servidor
$conexion = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos) or die ("Problemas con la conexión");

$query = mysqli_query($conexion, "SELECT * FROM alumno") or die("Problemas en el select:" . mysqli_error($conexion));

while ($reg = mysqli_fetch_array($query)) {
    echo "Nombre: " . $reg['nombre'] . "<br>";
    echo "Apellido: " . $reg['apellido'] . "<br>";
    echo "DNI: " . $reg['dni'] . "<br>";
    echo '<img src='.$reg['foto'].' width="200"><br>';
    echo "<br>";
    echo "<hr>";
}

mysqli_close($conexion);
?>
