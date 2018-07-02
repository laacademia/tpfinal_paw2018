<br>
<article id="tags" class="tags">
	<p><strong>Tags</strong></p>
	<!--<form method="post" enctype="multipart/form-data" action="./?c=tag&a=alta"> -->
	<form method="post" enctype="multipart/form-data" action="./?c=articulo&a=alta_tag">
	    <input id="id_articulo" type="text" name="id_articulo" style="display: none;" value="<?= $articulo->id ?>">        
	    <input id="descripcion" type="text" name="descripcion" placeholder="Nuevo Tag">        
		<input class="button-form"  type="submit" name="cargar_comentario" value="Agregar">                        
	</form>

	<?php  
	foreach ($tags as $key => $tag) {
		//echo '<div>'.$tag->descripcion.'<a href="./?c=tag&a=borrar&id='.$tag->id.'&id_articulo='.$tag->id_articulo.'">x</a><br></div>';
		echo '<div>'.$tag->descripcion.'<a href="./?c=articulo&a=borrar_tag&id='.$tag->id.'&id_articulo='.$tag->id_articulo.'">x</a><br></div>';
	}
	?>
</article>

