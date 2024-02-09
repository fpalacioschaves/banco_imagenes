<?php
include("./funciones.php");

$filtro = $_GET["filtro"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM imagenes, categorias_imagen 
WHERE imagenes.categoria_imagen = categorias_imagen.id_categoria
AND (tags_imagen LIKE '%".$filtro."%' 
OR descripcion_imagen LIKE '%".$filtro."%' 
OR nombre_categoria LIKE '%".$filtro."%' 
OR titulo_imagen LIKE '%".$filtro."%')";
$resultado = $conexion->consultar($consulta);
$imagenes = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($imagenes as $imagen){
    // Checkeamos si tiene empresa asociada
    $id_imagen = $imagen["id_imagen"];
    $url_imagen = $imagen['nombre_archivo'];
    $titulo_imagen = $imagen['titulo_imagen'];
    $descripcion_imagen = $imagen['descripcion_imagen'];
    $categoria_imagen = $imagen['nombre_categoria'];
    $tags_imagen = $imagen['tags_imagen'];
   
    
   echo
    '<div class="col item" data-category="'.$categoria_imagen.'">
    <div class="card shadow-sm">
      <div class="img_container">
        <a href="uploads/'.$url_imagen.'" 
          data-lightbox="'.$titulo_imagen.'" 
          data-title="'.$titulo_imagen.'">
            <img src="./uploads/'.$url_imagen.'">
        </a>
      </div>

      <div class="card-body">
        <p class="card-title">'.$titulo_imagen.'</p>
        <p class="card-text">'.$descripcion_imagen.'</p>
        <p class="card-text">'.$tags_imagen.'</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <a href="editar_imagen.php?id_imagen='.$id_imagen.'">
                <i class="bi bi-pencil-fill"></i>
              </a>
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deletemodal'.$id_imagen.'">
            <i class="bi bi-trash3-fill"></i>
            </a>
            </button>
            <div class="modal fade" id="deletemodal'.$id_imagen.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" onclick="borrar_imagen('.$id_imagen.');">Borrar</button>
                  </div>
                </div>
              </div>
            </div>
        
             
          </div>
          <small class="text-muted">'.$categoria_imagen.'</small>
        </div>
      </div>
    
    </div>
  </div>';
     } ?>

