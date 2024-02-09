<?php session_start();
include("./funciones.php");
check_session();
?>

<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<body>
    <?php include("./header.php"); ?>
    <section class="container">
        <h1 class="title">Banco de Imágenes</h1>
        <section class="text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-12 col-md-12 mx-auto"> 
                <p class="lead text-muted">
                ¡Bienvenido al aplicativo exclusivo de Grupo ATU para el banco de imágenes
                <br>
En este espacio, encontrarás una amplia variedad de imágenes de alta calidad seleccionadas cuidadosamente para satisfacer las necesidades creativas de nuestros equipos en Grupo ATU. Nuestro banco de imágenes ofrece una extensa colección que abarca desde fotografías de productos y servicios, hasta imágenes de eventos corporativos, todo ello diseñado para ayudarte a crear contenido visual impactante y relevante para nuestros proyectos.
<br>
Para garantizar el uso adecuado de este recurso, te animamos a seguir las pautas de uso establecidas por Grupo ATU. Recuerda utilizar las imágenes exclusivamente para fines relacionados con nuestros proyectos y campañas corporativas. Además, asegúrate de respetar los derechos de autor y las licencias asociadas a cada imagen, evitando cualquier uso no autorizado que pueda infringir las políticas de uso establecidas.
<br>
¡Explora nuestro banco de imágenes y encuentra la inspiración que necesitas para llevar tus ideas al siguiente nivel en Grupo ATU!
                </p>
              </div>
            </div>

        </section>
    <div class="filter-controls">
        <div class="filtro col-lg-12 col-md-12 mx-auto"> 
                <label for="filtro">Filtrar:</label>
                <input type="text" name="filtro" id="filtro" onkeyup="filtrar_imagenes();" placeholder="Puede buscar por título, descripción, tag o categoría">
                <button class="btn btn-primary" onclick="document.getElementById('filtro').value = ''; filtrar_imagenes();">Borrar</button>
              </div>
        </div>

        <div class="album py-5 bg-light" style="background-color: white !important;";>
          <div class="container">

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4" id="masonEasy">
        <?php
            $imagenes = leer_imagenes();
            foreach($imagenes as $imagen){
              $id_imagen = $imagen['id_imagen'];
              $url_imagen = $imagen['nombre_archivo'];
              $titulo_imagen = $imagen['titulo_imagen'];
              $descripcion_imagen = $imagen['descripcion_imagen'];
              $categoria_imagen = $imagen['nombre_categoria'];
              $tags_imagen = $imagen['tags_imagen'];
        ?>
        <div class="col item" data-category="<?php echo $categoria_imagen;?>">
          <div class="card shadow-sm">
            <div class="img_container">
              <a href="uploads/<?php echo $url_imagen; ?>" 
                data-lightbox="<?php echo $titulo_imagen; ?>" 
                data-title="<?php echo $titulo_imagen; ?>">
                  <img src="./uploads/<?php echo $url_imagen;?>">
              </a>
            </div>

            <div class="card-body">
              <p class="card-title"><?php echo $titulo_imagen;?></p>
              <p class="card-text"><?php echo $descripcion_imagen;?></p>
              <p class="card-text"><?php echo $tags_imagen;?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="editar_imagen.php?id_imagen=<?php echo $id_imagen;?>">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo $id_imagen;?>">
                  <i class="bi bi-trash3-fill"></i>
                  </a>
                  </button>
                  <div class="modal fade" id="deletemodal<?php echo $id_imagen;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick="borrar_imagen(<?php echo $id_imagen;?>);">Borrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--<a href="delete_imagen.php?id_imagen=<?php //echo $id_imagen ;?>">-->
                 <!-- onclick="borrar_imagen(<?php echo $id_imagen;?>);" -->
                   
                </div>
                <small class="text-muted"><?php echo $categoria_imagen;?></small>
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

    <footer>
          <img src="./images/logo_cenec.jpg">

          <h2>Banco de Imágenes</h2>

    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  
   
    <script src="./js/lightbox-plus-jquery.js"></script>
    <script src="./js/masonEasy.min.js"></script>
    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>