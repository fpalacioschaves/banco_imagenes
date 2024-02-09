<?php
 session_start();
include("./funciones.php");

$correcto = 0;
    $mensaje_error = "";
    if($_POST){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        if($usuario != "" && $password != ""){
            $login = new conectar_db;
            $consulta_login = "SELECT COUNT(*) as numero_usuarios FROM users WHERE email_usuario = '$usuario' AND password_usuario = '$password'";
            $resultado = $login->consultar($consulta_login)->fetch_all(MYSQLI_ASSOC);
          
            if($resultado[0]["numero_usuarios"] == "1"){
                $_SESSION["usuario"] = $usuario;
                $_SESSION["password"] = $password;

                $correcto = 1;
                header('Location: admin.php');
            }
            if($resultado[0]["numero_usuarios"] == "0"){

                $correcto = 0;
                $mensaje_error = "Usuario o password incorrecto";
                header('Location: index.php?error=1');
                // mal logado. Volvemos a mostrar el formulario diciendo que  hay un error
                
            }


        }
        else{
            $correcto = 0;
            $mensaje_error = "Los campos son obligatorios";
            // mal rellenado el formulario. Volver a mostrar con mensaje de error
        }
    }

