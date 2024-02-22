<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include("./funciones.php");

$imagenes = contar_items_condicionado("imagenes", "flag_video=0");
$usuarios = contar_items(("users"));
$categorias = contar_items(("categorias_imagen"));

$pagina = isset($_GET['page']) ? $_GET['page'] : 0;
$items_por_pagina = 10;

?>
<!DOCTYPE html>
<?php include("./head.php"); ?>

<body class="sb-nav-fixed">
  <?php include("./header.php"); ?>
  <div id="layoutSidenav">
    <?php include("./sidebar_configuracion.php"); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Configuración</h1>

          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">Imágenes</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <?php echo $imagenes; ?> <?php echo ($imagenes > 1) ? "imágenes" : "imagen"; ?>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card bg-warning text-white mb-4">
                <div class="card-body">Categorías</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <?php echo $categorias; ?> <?php echo ($categorias > 1) ? "categorias" : "categoria"; ?>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">Usuarios</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <?php echo $usuarios; ?> <?php echo ($usuarios > 1) ? "usuarios" : "usuario"; ?>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
          </div>

          <section class="container total_container">
            <div class="album py-5 bg-light" style="background-color: white !important;" ;>
              <div class="container">

                <div class="lead text-muted" style="text-align: center;">
                  <div>
                   Esta es la pantalla de configuración de la Aplicación
                   <br>
                   Desde este lugar, podrá añadir usuarios y editar sus datos de perfil de usuario.
                  <br>
                  Además, podrá añadir el nombre de la sede de la empresa y el logo de la misma,  que aparecen el el footer de la Aplicación
                  <br>
                 e incluso editarlos, en caso de error o cambio.
                  <br>
              
                  </div>
                </div>

              </div>
            </div>
          </section>
        </div>
      </main>
      <?php include("./footer.php"); ?>
    </div>
  </div>
  <!-- </script>-->
  <script src="./js/lightbox-plus-jquery.js"></script>
  <script src="./js/scripts.js" crossorigin="anonymous"></script>

</body>

</html>