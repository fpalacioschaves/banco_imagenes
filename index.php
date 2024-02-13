<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php 
include("./funciones.php");
include("./head.php"); ?>
<body class="index">
    <div class="contenedor_formulario">
    <div class="card border-0 rounded-lg mt-5">
        <img src="./images/logo_cenec.jpg" class="logo_login">
        <div class="card-body">
            <form id="login" name="login" method="POST" action="verificar_login.php">
            <div class="form-floating mb-3">
               
           <p class="label">Usuario</p>
            <input type="text" class="form-control login" name="usuario" placeholder="Usuario" required>

            </div>
            <div class="form-floating mb-3">
            <p class="label">Password</p>
                <input type="password" class="form-control login" name="password" placeholder="Password" required>
                <input type="submit" value="Login" class="btn btn-primary btn-login">
            </div>
            </form>
        </div>
    </div>
    </div>
</div>

    
</body>
</html>