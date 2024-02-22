<?php session_start();

include("./funciones.php");
check_session();

$nombre_grupo = $_SESSION["empresa"];

$imagen_grupo = $_SESSION["logo"];


if ($_POST) {
    edit_configuracion($_POST);
} else {
?>

    <!DOCTYPE html>
    <?php include("./head.php"); ?>
    <?php include("./header.php"); ?>

    <body class="sb-nav-fixed">
        <?php include("./header.php"); ?>
        <div id="layoutSidenav">
            <?php include("./sidebar_configuracion.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Configuración</h1>
                        <section class="container total_container">
                            <div class="album py-5 bg-light" style="background-color: white !important;">
                                <div class="container">
                                    <form id="editar_imagen" action="" method="POST" enctype="multipart/form-data">

                                        <div class="row fila">
                                            <div class="col">
                                                <div class="row fila">
                                                    <img src="./images/<?php echo $imagen_grupo; ?>">
                                                </div>
                                            </div>

                                            <div class="col">

                                                <div class="row fila">
                                                    <div class="col">
                                                        <label for="titulo_imagen">Nombre de la empresa</label>
                                                        <input class="form-control" type="text" name="nombre_empresa" id="nombre_empresa" value="<?php echo $nombre_grupo; ?>" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="archivo">
                                                            Logo de la empresa
                                                        </label>
                                                        <input class="form-control" type="file" name="logo" id="logo" value="<?php echo $imagen_grupo; ?>">
                                                    </div>
                                                </div>

                                                <div class="row fila">
                                                    <div class="col">
                                                        <input type="submit" style="margin-top: 43px;" value="Editar" class="btn btn-primary boton_enviar">
                                                    </div>
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