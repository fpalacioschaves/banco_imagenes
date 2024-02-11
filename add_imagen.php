<?php session_start();

include("./funciones.php");
check_session();
$categorias = leer_categorias();
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
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="add_imagen.php">
                                Añadir imagen
                            </a>

                            <a class="nav-link" href="add_categoria.php">
                                Añadir categoria
                            </a>

                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
            </div>
            <div class="sb-sidenav-footer">

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Añadir imagen</h1>
                        <section class="container total_container">
                            <div class="album py-5 bg-light" style="background-color: white !important;">
                                <div class="container">
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
                                                <input class="form-control" type="text" name="tags_imagen">
                                            </div>
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
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; CENEC Grupo ATU 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/masonEasy.min.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

    </html>



    <!-- -->