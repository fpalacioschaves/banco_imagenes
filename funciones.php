<?php
class conectar_db{    
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="root";
    private $db     ="banco_imagenes";
    public $conexion;
    public function __construct(){
       // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db)
        or die($this->conexion->connect_error);
        $this->conexion->set_charset("utf8");
    }
    
    //CONSULTAR
    public function consultar($consulta){
        $resultado = $this->conexion->query($consulta) or die($this->conexion->error);
        if($resultado)
            return $resultado;
    } 

    //Contar resultados
    public function contar_resultados(){
        $resultado = $this->conexion->affected_rows;
        return $resultado;
    }

    public function ultima_id(){
        $resultado = $this->conexion->insert_id;
        return $resultado;
    }
    
    // CERRAR
    public function cerrar(){
      $this->conexion->close();
    }
}



function check_session(){
    if(!$_SESSION["usuario"]){
        header('Location: index.php');
    }
}

// function that reads all the alumns from the database
function leer_imagenes($pagina, $items_por_pagina){
    if($pagina > 0){
        $offset = ($pagina - 1) * $items_por_pagina;
    }
    else{
        $offset = 0;
    }
   
    $conexion = new conectar_db();
    $consulta = "SELECT imagenes.*, categorias_imagen.nombre_categoria  FROM imagenes, categorias_imagen
    WHERE imagenes.categoria_imagen = categorias_imagen.id_categoria LIMIT $items_por_pagina OFFSET $offset";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// function that reads all the alumns from the database
function leer_categorias($inicio = 0){

    $conexion = new conectar_db();
    $consulta = "SELECT id_categoria, nombre_categoria  FROM categorias_imagen";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}


// function that reads the company with the id passed as parameter
function leer_imagen($id_imagen){

    $conexion = new conectar_db();
    $consulta = "SELECT imagenes.*, categorias_imagen.nombre_categoria  
    FROM imagenes, categorias_imagen
    WHERE imagenes.categoria_imagen = categorias_imagen.id_categoria
    AND id_imagen = $id_imagen";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function update_imagen($id, $datos){

    $conexion = new conectar_db();
    $id_imagen =  $datos["id_imagen"];
    $titulo_imagen = $datos["titulo_imagen"];
    $descripcion_imagen = $datos["descripcion_imagen"];
    $tags_imagen = $datos["tags_imagen"];
    $categoria_imagen = $datos['categorias'];
    $creditos_imagen = $datos['creditos_imagen'];
  
    
    $consulta = "UPDATE imagenes 
    SET titulo_imagen= '$titulo_imagen',
    descripcion_imagen = '$descripcion_imagen',
    tags_imagen = '$tags_imagen',
    categoria_imagen = $categoria_imagen,
    creditos_imagen = '$creditos_imagen'
   
    WHERE id_imagen = $id_imagen";

    $resultado = $conexion->consultar($consulta);

 
    

    header('Location: admin.php');
}



//function that add the company data in the database
function add_imagen($datos){

    var_dump($datos);

    $conexion = new conectar_db();

    $filename = $_FILES["archivo"]["name"];
    $tempname = $_FILES["archivo"]["tmp_name"];
    $folder = "./uploads/" . $filename;



    $extension = getExtension($filename);

    $extensiones_validas = array("png", "jpg", "jpeg", "svg");
  
    $titulo_imagen = $datos["titulo_imagen"];
    $descripcion_imagen = $datos["descripcion_imagen"];
    $tags_imagen = $datos["tags_imagen"];
    $categoria_imagen = $datos['categorias'];
    $creditos_imagen = $datos['creditos_imagen'];
    $nombre_imagen = $filename;
    
    if (in_array($extension, $extensiones_validas)){

        $consulta = "INSERT INTO imagenes
        (nombre_archivo, titulo_imagen, descripcion_imagen,tags_imagen, categoria_imagen, creditos_imagen)
        VALUES ('$nombre_imagen', '$titulo_imagen', '$descripcion_imagen',
        '$tags_imagen', '$categoria_imagen', '$creditos_imagen')";

        echo $consulta;

        $resultado = $conexion->consultar($consulta);

        $conexion->cerrar();

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            header('Location: admin.php');
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    }
    else{
        echo "<div class='row' style='margin-top:50px;'>
                <div class='col-12'>
                    <h2 style='text-align: center;'>Extensión de archivo no válida</h2>
                </div>
            </div>";
    }
    
    
    

}

function add_categoria($datos){

    $conexion = new conectar_db();

    $nombre_categoria = $_POST["categoria_nombre"];


    $consulta = "INSERT INTO categorias_imagen
        (nombre_categoria)
        VALUES ('$nombre_categoria')";

        $resultado = $conexion->consultar($consulta);

        $conexion->cerrar(); 
        
        header('Location: admin.php');

}

/**
 * @return string
 * @param $file string
 * @param $tolower bool
 * @desc Gets the extension of a given file, in lowercase if $tolower
 */
function getExtension($file, $tolower=true)
{
    $file = basename($file);
    $pos = strrpos($file, '.');

    if ($file == '' || $pos === false) {
        return '';
    }

    $extension = substr($file, $pos+1);
    if ($tolower) {
        $extension = strtolower($extension);
    }

    return $extension;
}




function get_title(){
    $url = explode("/",$_SERVER['REQUEST_URI']);
    $file = end($url);
    $file_array = explode(".",$file);
    $title = trim(ucfirst($file_array[0]));
    $title = str_replace("_"," ",$title);
    return $title;
}

function contar_items($tabla){

    $conexion = new conectar_db();
    $consulta = "SELECT DISTINCT COUNT(*) AS numero FROM " . $tabla;
    $resultado = $conexion->consultar($consulta);
    $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
    $conexion->cerrar();
    return $resultado[0]["numero"];
    

}

function contar_items_condicionado($tabla, $condicion){

    $conexion = new conectar_db();
    $consulta = "SELECT COUNT(*) AS numero FROM " . $tabla . " WHERE " . $condicion;
    $resultado = $conexion->consultar($consulta);
    $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
    $conexion->cerrar();
    return $resultado[0]["numero"];


}

function paginador(){

    $num_total_rows = contar_items("imagenes"); 


    $numero_item_by_page = 10;
    if ($num_total_rows > 0) {
        $page = false;
     
        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
     
        if (!$page) {
            $start = 0;
            $page = 1;
        } else {
            $start = ($page - 1) * $numero_item_by_page;
        }
        //calculo el total de paginas
        $total_pages = ceil($num_total_rows / $numero_item_by_page);
     
        //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra
        $paginador =  '<nav id="paginador">
                        <ul class="pagination">';
        
        if ($total_pages > 1) {
            if ($page != 1) {
                $paginador = $paginador . '<li class="page-item"><a class="page-link" href="admin.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
            }
     
            for ($i=1;$i<=$total_pages;$i++) {
                if ($page == $i) {
                    $paginador = $paginador . '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
                } else {
                    $paginador = $paginador . '<li class="page-item"><a class="page-link" href="admin.php?page='.$i.'">'.$i.'</a></li>';
                }
            }
     
            if ($page != $total_pages) {
                $paginador = $paginador . '<li class="page-item"><a class="page-link" href="admin.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
            }
        }
        $paginador = $paginador . '</ul>';
        $paginador = $paginador . '</nav>';
        return $paginador;
    }
}


?>