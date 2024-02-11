<?php
include("./funciones.php");

$id_categoria = $_GET["id"];

$nombre_categoria = $_GET["nombre"];

$conexion = new conectar_db();
$consulta = "UPDATE categorias_imagen SET nombre_categoria = '$nombre_categoria' WHERE id_categoria = $id_categoria";

$resultado = $conexion->consultar($consulta);

echo "ok";


?>