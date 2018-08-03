<?php 
include($_SERVER['PATH_BASE'] . '/core/helpers/html/Link.php');
?>
<style type="text/css">
  @import url("./css/noticias/noticiasAdmin.css");
</style>
<table>
	<tr>
		<th id="id">Id</th>
		<th id="titulo">Titulo</th>
		<th id="descripcion">Descripción</th>	
		<th id="fecha">Fecha Publicación</th>
		<th id="activo">Activo</th>	
                <th id="categoria">Categoria</th>					
		<th></th>
		<th></th>
	</tr>	
	<?php foreach ($listado as $id_fila => $fila) {
		echo "<tr>";

		foreach ($fila as $key => $value) {			
			if($key!='mime' && $key!='imagen' && $key!='subtitulo' && $key!='id_categoria'){
				if($key=='fecha_publicacion')
					$value = date('d-m-Y',strtotime($value));
								
				echo "	<td id=$key>$value</td>";
			}				
		}
		$imagen = array('nombre'=>'botones/edit.png', 'attr' => array('alt'=>'editar','style'=>'width:30px;'));
		echo '	<td>'.Link::html2("./?c=noticia&a=modificacion&id={$fila['id']}",'editar',null,$imagen).'</td>';

		$imagen = array('nombre'=>'botones/borrar.png', 'attr' => array('alt'=>'borrar','style'=>'width:30px;'));
		echo '	<td>'.Link::html2("./?c=noticia&a=borrar&id={$fila['id']}",'borrar',null,$imagen).'</td>';

		echo "</tr>";
	} ?>
</table>
<article id="botonera">
            <a href="./?c=noticia&a=alta"><p>NUEVO<img src="./img/botones/agregar.png"></p></a>
        </article>
<style type="text/css">
	
</style>