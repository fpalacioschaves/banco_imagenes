<?php
include("./funciones.php");
$id = $_GET["id_imagen"];
$conexion = new conectar_db();
$consulta_previa = "SELECT * FROM imagenes WHERE id_imagen = $id";
$previa = $conexion->consultar($consulta_previa);
foreach($previa as $imagen){
    $imagen_a_borrar = $imagen["nombre_archivo"];
}

$consulta = "DELETE FROM imagenes WHERE id_imagen = $id";
$resultado = $conexion->consultar($consulta);


// using unlink() function 
  
$file_pointer = "./uploads/" . $imagen_a_borrar; 
  
// Use unlink() function to delete a file 
if (!unlink($file_pointer)) { 
    echo ("$file_pointer cannot be deleted due to an error"); 
} 
else { 
    header('Location: admin.php');
} 


?>