<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php 
include("./funciones.php");
include("./head.php"); ?>
<body class="index">
    <div class="contenedor_formulario">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Login</h3>
        </div>
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