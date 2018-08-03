<?php 
include($_SERVER['PATH_BASE'] . '/core/helpers/html/Link.php');
?>
<style type="text/css">
  @import url("./css/contacto/contactoAdmin.css");
</style>

<table>
	<tr>
		<?php 
		foreach ($columnas as $key => $nombre) {
			echo "<th id=$nombre>$nombre</th>";
		}
		?>
		<th></th>
		<th></th>
	</tr>	
	<?php 
        //print_r($listado);
        foreach ($listado as $id_fila => $fila){
                echo "<tr>";

		foreach ($fila as $key => $value)								
			echo "	<td id=$key>$value</td>";						
		
		$imagen = array('nombre'=>'botones/edit.png', 'attr' => array('alt'=>'editar','style'=>'width:30px;'));
		echo '	<td>'.Link::html2("./?c=contacto&a=modificacion&id={$fila['id']}",'editar',null,$imagen).'</td>';

		$imagen = array('nombre'=>'botones/borrar.png', 'attr' => array('alt'=>'borrar','style'=>'width:30px;'));
		echo '	<td>'.Link::html2("./?c=contacto&a=borrar&id={$fila['id']}",'borrar',null,$imagen).'</td>';

		echo "</tr>";
	} ?>
</table>
