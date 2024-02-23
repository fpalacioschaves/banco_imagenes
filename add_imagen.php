<?php session_start();

include("./funciones.php");
check_session();
$categorias = leer_categorias();
$flag_video = isset($_GET["flag_video"]) ? $_GET["flag_video"] : 0;

if($flag_video == 0){
    $titulo = "Añadir imagen";
}
else{
    $titulo = "Añadir vídeo";
}
?>
<?php
if ($_POST) {
    add_imagen($_POST);
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
                        <h1 class="mt-4"><?php echo $titulo;?></h1>
                        <section class="container total_container">
                            <div class="album py-5 bg-light" style="background-color: white !important;">
                                <div class="container">
                                    <form id="editar_imagen" action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="flag_video" id="flag_video" value="<?php echo $flag_video;?>">
                                        <div class="row fila">
                                            <div class="col">
                                                <label for="titulo_imagen">Título de la imagen</label>
                                                <input class="form-control" type="text" name="titulo_imagen" id="titulo_imagen" required>
                                            </div>
                                            <div class="col">
                                                <label for="archivo">
                                                    Imagen
                                                </label>
                                                <input class="form-control" type="file" name="archivo" id="archivo">
                                            </div>
                                        </div>
                                        <div class="row fila">
                                            <div class="col">
                                                <label for="descripcion_imagen">Descripción de la imagen</label>
                                                <textarea class="form-control" id="descripcion_imagen" name="descripcion_imagen" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="row fila">
                                            <div class="col">
                                                <label for="creditos_imagen">Créditos de la imagen</label>
                                                <textarea class="form-control" id="creditos_imagen" name="creditos_imagen" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="tags_imagen">
                                                    Tags de la imagen
                                                </label>
                                                <input class="form-control" type="text" name="tags_imagen" id="tags_imagen">
                                            </div>
                                            <div class="col">
                                                <label for="categorias">
                                                    Categoria
                                                </label>
                                                <select class="form-control" name="categorias" id="categorias">
                                                    <?php
                                                    foreach ($categorias as $categoria) {
                                                        $id_categoria = $categoria['id_categoria'];
                                                        $nombre_categoria = $categoria['nombre_categoria'];
                                                    ?>
                                                        <option value="<?php echo $id_categoria; ?>"><?php echo $nombre_categoria; ?></option>
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
                                </div>
                            </div>
                        </section>
                    </div>
                </main>
                <?php include("./footer.php");?>
        </div>
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
    </body>

    </html>
