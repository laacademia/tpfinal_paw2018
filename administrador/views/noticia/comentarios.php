<br>
<section id="comentarios" class="comentarios">
<p><strong>Comentarios</strong></p>
<!-- <form method="post" enctype="multipart/form-data" action="./?c=comentario&a=alta"> -->
<form method="post" enctype="multipart/form-data" action="./?c=articulo&a=alta_comentario">
    <input id="id_articulo" type="text" name="id_articulo" style="display: none;" value="<?= $articulo->id ?>">        
    <input id="descripcion" type="text" name="descripcion" placeholder="Nuevo Comentario">    
	<input class="button-form"  type="submit" name="cargar_comentario" value="Agregar">                        
</form>

<?php  
foreach ($comentarios as $key => $comentario) {
	echo $comentario->descripcion.'<br>';
}

?>
</section>