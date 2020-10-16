<?php
//Datos del servidor
$servidor ="localhost";
$clave ="";
$usuario ="root";
$baseDeDatos ="colegio";

//Recuperamos datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$foto = $_FILES['foto'];

//Propiedades de la foto
$nombreFoto = $foto['name'];
$tipo = $foto['type'];
$ruta_tmp = $foto['tmp_name'];
$nombreYubicacion = "fotos/".$nombreFoto; //ruta de la foto dode va a quedar

//Guardamos la foto
if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif" || $tipo == "image/gif"){
    if (!is_dir('fotos')){
        mkdir('fotos',0777);
    }
    //subimos la imagen al servidor
    move_uploaded_file($ruta_tmp,$nombreYubicacion); //parametros: ubicacion temporal, ubicación y nombre donde la vamos a dejar
    
    //datos de coneccion al servidor
    $conexion = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    //Hacemos la consulta en una variable
    $query ="INSERT INTO alumno (apellido, nombre, dni, foto) VALUE('$apellido', '$nombre', '$dni','$nombreYubicacion')" or die("Problemas en el INSERT:" . mysqli_error($conexion));;

    //Ejecutamos la consulta
    mysqli_query($conexion, $query);

    header("Refresh: 5; URL = f_alta_alumno.html");
    echo "<h1>El alumno de dio de alta...</h1>";


}else{
    header("Refresh: 5; URL = f_alta_alumno.html");
    echo "<h1>Suba una imagen con el formato correcto...</h1>";
}
?>