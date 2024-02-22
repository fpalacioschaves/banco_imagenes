<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include("./funciones.php");

$videos = contar_items_condicionado("imagenes", "flag_video=1");
$usuarios = contar_items(("users"));
$categorias = contar_items(("categorias_imagen"));

$pagina = isset($_GET['page']) ? $_GET['page'] : 0;
$items_por_pagina = 10;

?>
<!DOCTYPE html>
<?php include("./head.php"); ?>

<body class="sb-nav-fixed">
  <?php include("./header_videos.php"); ?>
  <div id="layoutSidenav">
    <?php include("./sidebar_videos.php"); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Banco de Videos</h1>
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">Vídeos</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <?php echo $videos; ?> <?php echo ($videos > 1) ? "vídeos" : "vídeo"; ?>
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

          <div class="row">
            <?php echo paginador(); 
            ?>
          </div>
          <section class="container total_container">
            <div class="album py-5 bg-light" style="background-color: white !important;" ;>
              <div class="container">
                <div class="gallery_container" id="gallery_container">
                  <?php
                  $videos = leer_imagenes($pagina, $items_por_pagina, 1);
                  foreach ($videos as $video) {
                    $id_imagen = $video['id_imagen'];
                    $url_imagen = $video['nombre_archivo'];
                    $titulo_imagen = $video['titulo_imagen'];
                    $descripcion_imagen = $video['descripcion_imagen'];
                    $categoria_imagen = $video['nombre_categoria'];
                    $tags_imagen = $video['tags_imagen'];
                  ?>
                    <div class="masonry-item" data-category="<?php echo $categoria_imagen; ?>">
                      <div class="card shadow-sm">
                        <div class="img_container">
                          <a class="video-link" vidUrl="uploads/<?php echo $url_imagen; ?>">
                            <video src="uploads/<?php echo $url_imagen; ?>">
                              <p>Su navegador no soporta vídeos HTML5.</p>
                            </video>
                          </a>
                        </div>

                        <div class="card-body">
                          <p class="card-title"><?php echo $titulo_imagen; ?></p>
                          <p class="card-text"><?php echo $descripcion_imagen; ?></p>
                          <p class="card-text"><?php echo $tags_imagen; ?></p>
                          <div class="d-flex justify-content-between align-items-center" style="margin: 10px 0;">
                            <div class="btn-group">

                              <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Descargar vídeo">
                                <a href="uploads/<?php echo $url_imagen; ?>" download="uploads/<?php echo $url_imagen; ?>">
                                  <i class="bi bi-cloud-arrow-down-fill"></i>
                                </a>
                              </button>

                              <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Editar vídeo">
                                <a href="editar_imagen.php?id_imagen=<?php echo $id_imagen; ?>">
                                  <i class="bi bi-pencil-fill"></i>
                                </a>
                              </button>

                              <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo $id_imagen; ?>" data-toggle="tooltip" data-placement="top" title="Borrar imagen">
                                <i class="bi bi-trash3-fill"></i>
                                </a>
                              </button>

                              <div class="modal fade" id="deletemodal<?php echo $id_imagen; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Borrado de Imagen</h5>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="padding: 0 5px;">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Está seguro de que desea borrar esta imagen?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <button type="button" class="btn btn-primary" onclick="borrar_imagen(<?php echo $id_imagen; ?>);">Borrar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-text text-muted"><?php echo $categoria_imagen; ?></div>
                        </div>

                      </div>
                    </div>

                    <div class="overlay vid-link" vidUrl="#"></div>
                          <div class="main-vid-box">
                            <div class="videoWrapper">
                              <video autoplay="autoplay" class="myVideo" src="" frameborder="0" controls></video>
                            </div>
                          </div>
                          <img class="close vid-link" vidUrl="#" src="https://jsbin-user-assets.s3.amazonaws.com/ipodscott/close.svg">

                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </section>
        </div>
      </main>
      <?php include("./footer.php");?>
    </div>
  </div>
  <!-- </script>-->
  <script src="./js/lightbox-plus-jquery.js"></script>
  <script src="./js/scripts.js" crossorigin="anonymous"></script>

</body>

</html>