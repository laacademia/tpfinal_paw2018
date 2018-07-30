<style type="text/css">
  @import url("./css/disciplinas/disciplinasSite.css");
</style>
<script src="./js/disciplinas/disciplinasSite.js" type="text/javascript"></script>

<!--HACER UN FOREACH DE CLASS FILAS MOSTRANDO LAS IMAGENES DE LA BASE DE DATOS -->
<section class="filas">
    
    <!--HACER UN FOREACH DE CLASS IMAGENES-ART MOSTRANDO DE A 4 IMAGENES - ALT: NOMBRE DE LA IMAGEN -->
    <?php foreach ($datos as $key => $valores): //$im_datos = $datos[0]['imagen']; $imagen = "data:image/jpeg;base64,'.base64_encode( $im_datos ).'" ?> 
        <article class="imagenes-art">
            <article class="img-inicio">
                <article class="img-inicio-1">
                    <img class="imagenes" src="data:image/jpeg;base64,<?=base64_encode( $valores['imagen'] );?>" alt="<?=$valores['titulo'];?>">
                    <p class="p-inicio"> <?=$valores['titulo'];?> </p>
                </article>
                <article>
                    <p class="p-inicio"> <?=$valores['descripcion'];?> </p>        
                </article>
            </article>
        </article>
    <?php endforeach ?>
</section>
