<style type="text/css">
  @import url("./css/home/inicioSite.css");
</style>

<script src="./js/home/inicioSite.js" type="text/javascript"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
      inicioSite.iniciar("scrolling");
    });
</script>
<section id="scrolling">
    <article id="art_scrolling">
        <?php foreach ($datos as $key => $valores): $im_datos = $datos[0]['imagen']; $imagen = "data:image/jpeg;base64,'.base64_encode( $im_datos ).'" ?> 
            <!--echo '<img class="mi-imagen" src="data:image/jpeg;base64,'.base64_encode( $datos[0]['imagen'] ).'"/>' ;-->
            <!--HACER UN FOREACH DE TODO ESTO MOSTRANDO LAS IMAGENES DE LA BASE DE DATOS - ALT: NOMBRE DE LA IMAGEN -->
            <figure class="inicio efecto">
                <img class="img-inicio" src= "data:image/jpeg;base64,<?=base64_encode( $valores['imagen'] );?>" alt="<?=$valores['titulo'];?>">
            </figure>
        <?php endforeach ?>     
    </article>
</section>