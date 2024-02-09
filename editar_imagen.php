<?php session_start();

include("./funciones.php");
check_session();
$id_imagen = $_GET["id_imagen"];
$imagen = leer_imagen($id_imagen)[0];
$categoria_imagen = $imagen['categoria_imagen'];
$categorias = leer_categorias();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./head.php");?>
<body>

    <?php include("./header.php");?>

    <section class="container">
    <?php 
    if($_POST){
        
        update_imagen($id_imagen, $_POST);
    }
    else{
        ?>

    <form id="editar_imagen" action="" method="POST">
    <input type="hidden" name="id_imagen" value="<?php echo $imagen["id_imagen"];?>">
        <div class="row fila">
            <div class="col">
                    <div class="imagen_formulario">
                        <img  src="./uploads/<?php echo $imagen['nombre_archivo'];?>">
                    </div>
                </div>
            

       
            <div class="col">
                <div class="row fila">
                    <div class="col">
                        <label for="titulo_imagen">Título de la imagen</label>
                        <input class="form-control" type="text" name="titulo_imagen" required value='<?php echo $imagen["titulo_imagen"];?>'>
                    </div>
                </div>
                <div class="row fila">
                    <div class="col">
                        <label for="nombre_archivo">
                        Nombre del archivo
                        </label>
                        <input class="form-control" type="text" name="nombre_archivo" value='<?php echo $imagen["nombre_archivo"];?>' readonly>
                    </div>
                </div>
                <div class="row fila">
                    <div class="col">
                        <label for="descripcion_imagen">Descripción de la imagen</label>
                        <textarea class="form-control" id="descripcion_imagen" name="descripcion_imagen" rows="3"><?php echo $imagen["descripcion_imagen"];?></textarea>
                    </div>
                </div>
                <div class="row fila">
                    <div class="col">
                        <label for="tags_imagen">
                        Tags de la imagen
                        </label>
                        <input class="form-control" type="text" name="tags_imagen" value='<?php echo $imagen["tags_imagen"];?>'>
                    </div>
                </div>
                <div class="row fila">
                    <div class="col">
                        <label for="categoria_imagen">
                        Categoria
                        </label>
                        <select class="form-control" name="categorias" id="categorias">
                            <?php
                            foreach($categorias as $categoria){
                                $id_categoria = $categoria['id_categoria'];
                                $nombre_categoria = $categoria['nombre_categoria'];
                                ?>
                                <option value="<?php echo $id_categoria;?>" <?php echo $id_categoria == $categoria_imagen ? 'selected' : '';?>><?php echo $nombre_categoria;?></option>
                                <?php

                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row fila">
                    <div class="col">
                        <input type="submit" style="margin-top: 43px;" value="Editar" class="btn btn-primary boton_enviar">
                    </div>
            </div>

    
            
           
        </div>
    </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>