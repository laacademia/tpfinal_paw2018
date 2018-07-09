<article>
    <form id="form" method="post" enctype="multipart/form-data" action="./?c=usuario&a=procesar">        
        <?php 
        
        //print_r($columnas);
        foreach ($columnas as $key => $nombre) {
            if($nombre=='id'){
                echo "<input id='$nombre' class='element-form' type='text' name='$nombre' style='display:none;' placeholder='$nombre' value='{$modelo->id}'>";
            }else{
                //echo "modelo nombre ".$modelo->$nombre;
                echo "<label name='$nombre'>$nombre:</label>";
                $valor = $modelo->$nombre;
                if ($nombre == 'password'){
                    $valor='';
                } 
                echo "<input id='$nombre' class='element-form' type='text' name='$nombre' placeholder='$nombre' value='{$valor}'>";
            }
            
        }
        ?>
        <article class="button-form-container">
            <a href="./?c=usuario&a=inicio" class="button-class-name">Cancelar</a>        
            <input class="button-form"  type="submit" name="enviar" value="Enviar">                    
        </article>
    </form>
</article>

<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>