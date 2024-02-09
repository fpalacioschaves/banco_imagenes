<?php session_start();

include("./funciones.php");
check_session();
$categorias = leer_categorias();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>

<body>

    <?php include("./header.php"); ?>

    <section class="container">
        <?php
        if ($_POST) {

            add_categoria($_POST);
        } else {
        ?>

            <form id="add_categoria" action="" method="POST">
          
        <div class="row fila">
            <div class="col">
                <label for="categoria_imagen">Nueva categoría</label>
                <input class="form-control" type="text" name="categoria_nombre" required>

            </div>

            <div class="col">
              <input type="submit" style="margin-top: 24px;" value="Añadir" class="btn btn-primary boton_enviar">
          </div>
          
        </div>

        <div class="row fila">
          
          
      </div>
     </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>