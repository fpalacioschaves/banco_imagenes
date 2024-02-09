<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<link href="./css/estilos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Banco de Imágenes</title>
</head>
<body class="index">
    <?php include("./funciones.php");?>

    <div class="contenedor_formulario">

        <form id="login" name="login" method="POST" action="verificar_login.php">
            <label for="usuario">Usuario</label>
            <br>
            <input type="text" name="usuario" required>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Login" class="btn btn-primary btn-login">

        
        </form>
    </div>

    
</body>
</html>