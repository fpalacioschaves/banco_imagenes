<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php 
include("./funciones.php");
include("./head.php"); ?>
<body class="index">
<div class="lead text-muted" style="text-align: center;">
            <div>
              ¡Bienvenido al aplicativo exclusivo de Grupo ATU para el banco de imágenes
              <br>
              En este espacio, encontrarás una amplia variedad de imágenes de alta calidad seleccionadas cuidadosamente para satisfacer las necesidades creativas de nuestros equipos en Grupo ATU. Nuestro banco de imágenes ofrece una extensa colección que abarca desde fotografías de productos y servicios, hasta imágenes de eventos corporativos, todo ello diseñado para ayudarte a crear contenido visual impactante y relevante para nuestros proyectos.
              <br>
              Para garantizar el uso adecuado de este recurso, te animamos a seguir las pautas de uso establecidas por Grupo ATU. Recuerda utilizar las imágenes exclusivamente para fines relacionados con nuestros proyectos y campañas corporativas. Además, asegúrate de respetar los derechos de autor y las licencias asociadas a cada imagen, evitando cualquier uso no autorizado que pueda infringir las políticas de uso establecidas.
              <br>
              ¡Explora nuestro banco de imágenes y encuentra la inspiración que necesitas para llevar tus ideas al siguiente nivel en Grupo ATU!
              <br>
            </div>
          </div>
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
             <p class="registro">   
                <a href="./registro.php">No tiene cuenta aún? Regístrese aquí</a>
            </p>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>

    
</body>
</html>