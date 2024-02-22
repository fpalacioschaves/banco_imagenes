<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include("./funciones.php");
include("./head.php"); ?>
<?php
if ($_POST) {
    registrar_usuario($_POST);
} else {
?>

    <body class="index">
        <div class="contenedor_formulario">
            <div class="card border-0 rounded-lg mt-5">
                <img src="./images/logo_cenec.jpg" class="logo_login">
                <div class="card-body">
                    <form id="login" name="login" method="POST" action="">
                        <div class="form-floating mb-3">
                            <p class="label">Nombre de usuario</p>
                            <input type="text" class="form-control login" name="nombre_usuario" placeholder="Nombre de usuario" required>
                        </div>
                        <div class="form-floating mb-3">
                            <p class="label">Email de usuario</p>
                            <input type="email" class="form-control login" name="email_usuario" placeholder="Email de usuario" required>
                        </div>
                        <div class="form-floating mb-3">
                            <p class="label">Password</p>
                            <input type="password" class="form-control login" name="password" placeholder="Password" required>
                            <input type="submit" value="Registro" class="btn btn-primary btn-login">
                            <p class="registro">
                                <a href="./index.php">Ya tiene cuenta? Entre aquí</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>


    </body>

</html>
<?php } ?>