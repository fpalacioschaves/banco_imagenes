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

            add_imagen($_POST);
        } else {
        ?>

            <form id="editar_imagen" action="" method="POST" enctype="multipart/form-data">
          
        <div class="row fila">
            <div class="col">
                <label for="titulo_imagen">Título de la imagen</label>
                <input class="form-control" type="text" name="titulo_imagen" required>

            </div>
            <div class="col">
                <label for="archivo">
                    Imagen
                </label>
                <input class="form-control" type="file" name="archivo">
            </div>
        </div>

        <div class="row fila">
            <div class="col">
                <label for="descripcion_imagen">Descripción de la imagen</label>
                <textarea class="form-control" id="descripcion_imagen" name="descripcion_imagen" rows="3"></textarea>
            </div>
        </div>


        <div class="row">
        <div class="col">
                <label for="tags_imagen">
                    Tags de la imagen
                </label>
                <input class="form-control" type="text" name="tags_imagen">
            </div>

            <div class="col">
            <label for="categoria_imagen">
                   Categoria
                </label>
                <select class="form-control"  name="categorias" id="categorias">
                    <?php
                    foreach($categorias as $categoria){
                        $id_categoria = $categoria['id_categoria'];
                        $nombre_categoria = $categoria['nombre_categoria'];
                        ?>
                        <option value="<?php echo $id_categoria;?>"><?php echo $nombre_categoria;?></option>
                        <?php

                    }
                    ?>


                </select>
            </div>
        </div>

        <div class="row fila">
          
            <div class="col">
                <input type="submit" style="margin-top: 43px;" value="Añadir" class="btn btn-primary boton_enviar">
            </div>
        </div>

        


        
        
            </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>