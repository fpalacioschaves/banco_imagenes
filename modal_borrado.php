<?php
$id_imagen = $_GET['id_imagen'];
?>
<div class="modal fade" id="delete_modal_<?php echo $id_imagen;?>" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
  <div class="modal-content">
   
    <div class="modal-body">
      <p>Está seguro de que quiere borrar esta alumno de id <?php echo $id_imagen;?> ? </p>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="borrar_imagen(<?php echo $id_imagen;?>);" class="btn btn-primary">Borrar imagen</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>