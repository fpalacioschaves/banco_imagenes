<?php session_start();

include("./funciones.php");
check_session();
$categorias = leer_categorias();
?>
<?php
if ($_POST) {
    add_categoria($_POST);
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
                        <h1 class="mt-4">Añadir categoría</h1>
                        <section class="container total_container">
                            <div class="album py-5 bg-light" style="background-color: white !important;">
                                <div class="container">
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
                                </div>
                            </div>
                        </section>
                    </div>
                </main>
                <?php include("./footer.php");?>
            </div>
        </div>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/masonEasy.min.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>-->
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
    </body>

    </html>



    <!-- -->