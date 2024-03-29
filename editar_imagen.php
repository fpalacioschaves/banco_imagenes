<?php session_start();

include("./funciones.php");
check_session();
$id_imagen = $_GET["id_imagen"];
$imagen = leer_imagen($id_imagen)[0];
$categoria_imagen = $imagen['categoria_imagen'];
$flag_video = $imagen["flag_video"];
$categorias = leer_categorias();

if($flag_video == 0){
    $titulo = "Edición de imagen";
}
else{
    $titulo = "Edición de vídeo";
}

list($width, $height, $type, $attr) = getimagesize("./uploads/" . $imagen["nombre_archivo"]);
?>
<?php
if ($_POST) {

    update_imagen($id_imagen, $_POST);
} else {
?>

    <!DOCTYPE html>
    <?php include("./head.php"); ?>
    <?php include("./header.php"); ?>

    <body class="sb-nav-fixed">
        <?php include("./header.php"); ?>
        <div id="layoutSidenav">
        <?php include("./sidebar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?php echo $titulo; ?></h1>
                        <section class="container total_container">
                            <div class="album py-5 bg-light" style="background-color: white !important;" ;>
                                <div class="container">
                                    <form id="editar_imagen" action="" method="POST">
                                        <input type="hidden" name="id_imagen" value="<?php echo $imagen["id_imagen"]; ?>">
                                        <input type="hidden" name="flag_video" value="<?php echo $imagen["flag_video"]; ?>">
                                        <div class="row fila">
                                            <div class="col">
                                                <div class="imagen_formulario">
                                                    <?php if($flag_video == 0){ ?>
                                                    <img src="./uploads/<?php echo $imagen['nombre_archivo']; ?>">
                                                    <?php } else{ ?>
                                                    <video src="uploads/<?php echo $imagen['nombre_archivo']; ?>" controls>
                                                    <p>Su navegador no soporta vídeos HTML5.</p>
                                                    </video>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="titulo_imagen">Título de la imagen</label>
                                                        <input class="form-control" type="text" name="titulo_imagen" required value='<?php echo $imagen["titulo_imagen"]; ?>'>
                                                    </div>
                                                </div>
                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="nombre_archivo">
                                                            Nombre del archivo
                                                        </label>
                                                        <input class="form-control" type="text" name="nombre_archivo" value='<?php echo $imagen["nombre_archivo"]; ?>' readonly>
                                                    </div>
                                                </div>
                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="descripcion_imagen">Descripción de la imagen</label>
                                                        <textarea class="form-control" id="descripcion_imagen" name="descripcion_imagen" rows="3"><?php echo $imagen["descripcion_imagen"]; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="creditos_imagen">Creditos de la imagen</label>
                                                        <textarea class="form-control" id="creditos_imagen" name="creditos_imagen" rows="3"><?php echo $imagen["creditos_imagen"]; ?></textarea>
                                                    </div>
                                                </div>
                                                <?php if($flag_video == 0){ ?>
                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="tags_imagen">Ancho de la imagen</label>
                                                        <input class="form-control" type="text" name="ancho_imagen" value='<?php echo $width; ?> px' disabled>
                                                    </div>
                                                    <div class="col">
                                                        <label for="tags_imagen">Alto de la imagen</label>
                                                        <input class="form-control" type="text" name="alto_imagen" value='<?php echo $height; ?> px' disabled>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="tags_imagen">
                                                            Tags de la imagen
                                                        </label>
                                                        <input class="form-control" type="text" name="tags_imagen" value='<?php echo $imagen["tags_imagen"]; ?>'>
                                                    </div>
                                                </div>
                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="categoria_imagen">
                                                            Categoria
                                                        </label>
                                                        <select class="form-control" name="categorias" id="categorias">
                                                            <?php
                                                            foreach ($categorias as $categoria) {
                                                                $id_categoria = $categoria['id_categoria'];
                                                                $nombre_categoria = $categoria['nombre_categoria'];
                                                            ?>
                                                                <option value="<?php echo $id_categoria; ?>" <?php echo $id_categoria == $categoria_imagen ? 'selected' : ''; ?>><?php echo $nombre_categoria; ?></option>
                                                            <?php

                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row fila">
                                                    <div class="col">
                                                        <input type="submit" style="margin-top: 43px;" value="Actualizar" class="btn btn-primary boton_enviar">
                                                    </div>
                                                </div>
                                            </div>
                                    </form>

                                <?php } ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </main>
                <?php include("./footer.php");?>
            </div>
        </div>
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
    </body>

    </html>



