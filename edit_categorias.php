<?php session_start();

include("./funciones.php");
check_session();
$categorias = leer_categorias();
$categorias_e_imagenes = categorias_e_imagenes();
?>
<?php
if ($_POST) {
    add_categoria($_POST);
} else {
?>

    <!DOCTYPE html>
    <?php include("./head.php"); ?>


    <body class="sb-nav-fixed">
        <?php include("./header.php"); ?>
        <div id="layoutSidenav">
            <?php include("./sidebar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Categorías</h1>

                        <table class="table table-hover">
                        <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Imágenes en la categoría</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                              
                                foreach($categorias_e_imagenes as $fila){
                                $id_categoria = $fila["id_categoria"];
                                $nombre_categoria = $fila["nombre_categoria"];
                                $imagenes = $fila["imagenes"];
                               

                                echo "<tr>
                                        <td>$id_categoria</td>
                                        <td>
                                            <div id='$id_categoria' class='celda_editable' contenteditable='true'>$nombre_categoria</div>
                                        </td>
                                        <td>$imagenes</td>
                                    </tr>";
                        
                            }    
                            ?>
                            </tbody>
                            <tfoot class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Imágenes en la categoría</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </main>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="./js/scripts.js" crossorigin="anonymous"></script>
    </body>
<?php } ?>

</html>