<article>
    <form id="form" method="post" enctype="multipart/form-data" action="./?c=dadada3&a=procesar">        
        <?php 
        foreach ($columnas as $key => $nombre) {
            if($nombre=='id'){
                echo "<input id='$nombre' class='element-form' type='text' name='$nombre' style='display:none;' placeholder='$nombre' value='{$modelo->id}'>";
            }else{
                echo "<label name='$nombre'>$nombre:</label>";
                echo "<input id='$nombre' class='element-form' type='text' name='$nombre' placeholder='$nombre' value='{$modelo->$nombre}'>";
            }
            
        }
        ?>
        <article class="button-form-container">
            <a href="./?c=dadada3&a=inicio" class="button-class-name">Cancelar</a>        
            <input class="button-form"  type="submit" name="enviar" value="Enviar">                    
        </article>
    </form>
</article>

<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>