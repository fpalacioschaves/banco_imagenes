<?php
session_start();
include("./funciones.php");

$correcto = 0;
$mensaje_error = "";
if ($_POST) {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    if ($usuario != "" && $password != "") {
        $login = new conectar_db;
        $consulta_login = "SELECT COUNT(*) as numero_usuarios FROM users WHERE email_usuario = '$usuario' AND password_usuario = '$password'";
        $resultado = $login->consultar($consulta_login)->fetch_all(MYSQLI_ASSOC);

        if ($resultado[0]["numero_usuarios"] == "1") {

            $consulta_login = "SELECT nombre_usuario FROM users WHERE email_usuario = '$usuario' AND password_usuario = '$password'";
            $resultado = $login->consultar($consulta_login)->fetch_all(MYSQLI_ASSOC);

            $_SESSION["usuario"] = $usuario;
            $_SESSION["password"] = $password;
            $_SESSION["nombre_usuario"] = $resultado[0]["nombre_usuario"];

            $configuracion = new conectar_db;
           
            
            $consulta_configuracion = "SELECT nombre_grupo, imagen_grupo FROM configuracion";
            $resultado_configuracion = $configuracion->consultar($consulta_configuracion)->fetch_all(MYSQLI_ASSOC);
     
            
            $nombre_grupo = $resultado_configuracion[0]['nombre_grupo'];
            $imagen_grupo = $resultado_configuracion[0]['imagen_grupo'];

            $_SESSION["empresa"] = $nombre_grupo;

            $_SESSION["logo"] = $imagen_grupo;

            $correcto = 1;
            header('Location: admin.php');
        }
        if ($resultado[0]["numero_usuarios"] == "0") {

            $correcto = 0;
            $mensaje_error = "Usuario o password incorrecto";
            header('Location: index.php?error=1');
            // mal logado. Volvemos a mostrar el formulario diciendo que  hay un error

        }
    } else {
        $correcto = 0;
        $mensaje_error = "Los campos son obligatorios";
        // mal rellenado el formulario. Volver a mostrar con mensaje de error
    }
}
