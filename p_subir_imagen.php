<?php
$imagen = $_FILES['imagen'];
//var_dump($imagen);

$nombre = $imagen['name'];
$tipo = $imagen['type'];
$ruta_tmp =  $imagen['tmp_name']; //ruta temporal donde está el archivo

if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif" || $tipo == "image/gif"){
    if (!is_dir('fotos')){
        mkdir('fotos',0777);
    }
    move_uploaded_file($ruta_tmp,'fotos/'.$nombre);
}else{
    header("Refresh: 5; URL = f_subir_imagen.html");
    echo "<h1>Suba una imagen con el formato correcto...</h1>";
}
?>
