<?php session_start();

include("./funciones.php");
check_session();

$usuario = $_SESSION["usuario"];
$password = $_SESSION["password"];
$nombre_usuario = $_SESSION["nombre_usuario"];
?>
<?php
if ($_POST) {
    editar_usuario($_POST);
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
                        <h1 class="mt-4">Editar usuario</h1>
                        <section class="container total_container">
                            <div class="album py-5 bg-light" style="background-color: white !important;">
                                <div class="container">
                                    <form id="edit_usuario" action="" method="POST">
                                        <div class="row fila">
                                            <div class="col">
                                                <label for="nombre_usuario">Nombre de usuario</label>
                                                <input class="form-control" type="text" name="nombre_usuario" value="<?php echo $nombre_usuario;?>" required>
                                            </div>

                                            <div class="col">
                                                <label for="email_usuario">Email del usuario</label>
                                                <input class="form-control" type="email" name="email_usuario" value="<?php echo $usuario;?>" required>
                                            </div>

                                            <div class="col">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="text" name="password_usuario" value="<?php echo $password;?>" required>
                                            </div>

                                            <div class="col">
                                                <input type="submit" style="margin-top: 24px;" value="Editar" class="btn btn-primary boton_enviar">
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
        <script src="./js/lightbox-plus-jquery.js"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
    </body>

    </html>