<?php 
include($_SERVER['PATH_BASE'] . '/core/helpers/html/Link.php');
?>

<table>
	<tr>
		<?php 
		foreach ($columnas as $key => $nombre) {
			echo "<th>$nombre</th>";
		}
		?>
		<th></th>
		<th></th>
	</tr>	
	<?php foreach ($listado as $id_fila => $fila){
		echo "<tr>";

		foreach ($fila as $key => $value)								
			echo "	<td>$value</td>";						
		
		$imagen = array('nombre'=>'botones/edit.png', 'attr' => array('alt'=>'editar','style'=>'width:30px;'));
		echo '	<td>'.Link::html2("./?c=contacto&a=modificacion&id={$fila['id']}",'editar',null,$imagen).'</td>';

		$imagen = array('nombre'=>'botones/borrar.png', 'attr' => array('alt'=>'borrar','style'=>'width:30px;'));
		echo '	<td>'.Link::html2("./?c=contacto&a=borrar&id={$fila['id']}",'borrar',null,$imagen).'</td>';

		echo "</tr>";
	} ?>
</table>
<!--<article id="botonera">
            <a href="./?c=contacto&a=alta"><p>NUEVO<img src="./img/botones/agregar.png"></p></a>
        </article> -->
<style type="text/css">
	table{
		border-collapse: collapse;
		margin: auto;
		margin-top: 10px;
		width: 90%;
	}
	table td{
		border: 1px solid black;
	}
	table th{
		border: 1px solid black;
	}

	table img{
		width: 40px;		
	}
	#botonera p{
		color:black;
		font-weight: bold;
	}
</style>