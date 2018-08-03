<?php 
include($_SERVER['PATH_BASE'] . '/core/helpers/html/Link.php');
?>
<style type="text/css">
  @import url("./css/ubicacion/ubicacionAdmin.css");
</style>

<table>
    <tr>
        <th id="id">Id</th>
        <th>Descripción</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Letra Marcador</th>                  
        <th></th>
        <th></th>
    </tr>   
    
    <?php 
    $no_mostrar = array('titulo','subtitulo','descripcion_texto','horario','direccion','telefono');;
    ?>

    <?php foreach ($listado as $id_fila => $fila) {
        echo "<tr>";

        foreach ($fila as $key => $value) {
            if(!in_array($key, $no_mostrar))
                echo "  <td id='$key'>$value</td>";
        }
        $imagen = array('nombre'=>'botones/edit.png', 'attr' => array('alt'=>'editar','style'=>'width:30px;'));
        echo '  <td>'.Link::html2("./?c=ubicacion&a=modificacion&id={$fila['id']}",'editar',null,$imagen).'</td>';

        $imagen = array('nombre'=>'botones/borrar.png', 'attr' => array('alt'=>'borrar','style'=>'width:30px;'));
        echo '  <td>'.Link::html2("./?c=ubicacion&a=borrar&id={$fila['id']}",'borrar',null,$imagen).'</td>';

        echo "</tr>";
    } ?>
</table>
<article id="botonera">
            <a href="./?c=ubicacion&a=alta"><p>NUEVO<img src="./img/botones/agregar.png"></p></a>
        </article>
