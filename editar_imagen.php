<?php session_start();

include("./funciones.php");
check_session();
$id_imagen = $_GET["id_imagen"];
$imagen = leer_imagen($id_imagen)[0];
$categoria_imagen = $imagen['categoria_imagen'];
$categorias = leer_categorias();

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
                        <h1 class="mt-4">Edición de imagen</h1>
                        <section class="container total_container">
                            <div class="album py-5 bg-light" style="background-color: white !important;" ;>
                                <div class="container">
                                    <form id="editar_imagen" action="" method="POST">
                                        <input type="hidden" name="id_imagen" value="<?php echo $imagen["id_imagen"]; ?>">
                                        <div class="row fila">
                                            <div class="col">
                                                <div class="imagen_formulario">
                                                    <img src="./uploads/<?php echo $imagen['nombre_archivo']; ?>">
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
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; CENEC Grupo ATU 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>-->
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
    </body>

    </html>



