<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php 
include("./funciones.php");
include("./head.php"); 
$imagenes = contar_items(("imagenes"));
$usuarios = contar_items(("users"));
$categorias = contar_items(("categorias_imagen"));

$pagina = isset($_GET['page']) ? $_GET['page'] : 0 ;
$items_por_pagina = 10;

?>
<!DOCTYPE html>  
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Banco de Imágenes</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
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
                        <h1 class="mt-4">Banco de Imágenes</h1>
                        <p class="lead text-muted">
                            ¡Bienvenido al aplicativo exclusivo de Grupo ATU para el banco de imágenes
                            <br>
                            En este espacio, encontrarás una amplia variedad de imágenes de alta calidad seleccionadas cuidadosamente para satisfacer las necesidades creativas de nuestros equipos en Grupo ATU. Nuestro banco de imágenes ofrece una extensa colección que abarca desde fotografías de productos y servicios, hasta imágenes de eventos corporativos, todo ello diseñado para ayudarte a crear contenido visual impactante y relevante para nuestros proyectos.
                            <br>
                            Para garantizar el uso adecuado de este recurso, te animamos a seguir las pautas de uso establecidas por Grupo ATU. Recuerda utilizar las imágenes exclusivamente para fines relacionados con nuestros proyectos y campañas corporativas. Además, asegúrate de respetar los derechos de autor y las licencias asociadas a cada imagen, evitando cualquier uso no autorizado que pueda infringir las políticas de uso establecidas.
                            <br>
                            ¡Explora nuestro banco de imágenes y encuentra la inspiración que necesitas para llevar tus ideas al siguiente nivel en Grupo ATU!
                            <br>
                        </p>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Imágenes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php echo $imagenes;?> <?php echo ($imagenes > 1) ? "imágenes" : "imagen";?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Categorías</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php echo $categorias;?> <?php echo ($categorias > 1) ? "categorias" : "categoria";?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Usuarios</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php echo $usuarios;?> <?php echo ($usuarios > 1) ? "usuarios" : "usuario";?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <?php echo paginador();?>
                        </div>
                        <section class="container total_container">
                        <div class="album py-5 bg-light" style="background-color: white !important;" ;>
      <div class="container">

        <div class="row row-cols-4 row-cols-sm-4 row-cols-md-4 g-4" id="masonEasy">
          <?php
          $imagenes = leer_imagenes($pagina, $items_por_pagina);
          foreach ($imagenes as $imagen) {
            $id_imagen = $imagen['id_imagen'];
            $url_imagen = $imagen['nombre_archivo'];
            $titulo_imagen = $imagen['titulo_imagen'];
            $descripcion_imagen = $imagen['descripcion_imagen'];
            $categoria_imagen = $imagen['nombre_categoria'];
            $tags_imagen = $imagen['tags_imagen'];
          ?>
            <div class="col" data-category="<?php echo $categoria_imagen; ?>">
              <div class="card shadow-sm">
                <div class="img_container">
                  <a href="uploads/<?php echo $url_imagen; ?>" data-lightbox="<?php echo $titulo_imagen; ?>" data-title="<?php echo $titulo_imagen; ?>">
                    <img src="./uploads/<?php echo $url_imagen; ?>">
                  </a>
                </div>

                <div class="card-body">
                  <p class="card-title"><?php echo $titulo_imagen; ?></p>
                  <p class="card-text"><?php echo $descripcion_imagen; ?></p>
                  <p class="card-text"><?php echo $tags_imagen; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">
                        <a href="editar_imagen.php?id_imagen=<?php echo $id_imagen; ?>">
                          <i class="bi bi-pencil-fill"></i>
                        </a>
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo $id_imagen; ?>">
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
                    <small class="text-muted"><?php echo $categoria_imagen; ?></small>
                  </div>
                </div>

              </div>
            </div>
          <?php
          }
          ?>

        </div>
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
