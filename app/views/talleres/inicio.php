<style type="text/css">
  @import url("./css/talleres/talleresSite.css");
</style>
<script src="./js/talleres/talleresSite.js" type="text/javascript"></script>
<section id="carrousel-1">
        <article id="ant">
            <figure class="maymen">
                <img id="menor" src="./img/talleres/arrowi.png" onclick="talleresgaleria.anteriorC()" alt="menor">
            </figure>
        </article>
        <!--ARTICLE 1 DEL CARROUSEL -->
        <?php foreach ($datos as $key => $valores): $im_datos = $datos[0]['imagen']; $imagen = "data:image/jpeg;base64,'.base64_encode( $im_datos ).'" ?> 
            <article class="item-carrousel">
                <article class="item-car">
                    <figure class="img-item-carousel">
                        <img class="efecto1"  src= "data:image/jpeg;base64,<?=base64_encode( $valores['imagen'] );?>" alt="<?=$valores['titulo'];?>">
                    </figure>
                </article>
            </article>
        <?php endforeach ?>
        
        <!--ARTICLE 2 DEL CARROUSEL 
        <article class="item-carrousel">
            <article class="item-car">
                <figure class="img-item-carousel">
                    <img class="efecto1"  src="./img/talleres/taller02.png" alt="darth">
                </figure>
            </article>
	</article>
        <!--ARTICLE 3 DEL CARROUSEL 
        <article class="item-carrousel">
            <article class="item-car">
                <figure class="img-item-carousel">
                    <img class="efecto1"  src="./img/talleres/taller03.png" alt="darth">
                </figure>
            </article>
	</article>
        <!--ARTICLE 4 DEL CARROUSEL 
        <article class="item-carrousel">
            <article class="item-car">
                <figure class="img-item-carousel">
                    <img class="efecto1"  src="./img/talleres/taller04.png" alt="darth">
                </figure>
            </article>
	</article>-->
        <article id="sig">
            <figure class="maymen">
                <img id="mayor" src="./img/talleres/arrowd.png" onclick="talleresgaleria.siguienteC()" alt="mayor">
            </figure>
        </article>
    </section>
<script>
      talleresgaleria.mostrar("carrousel-1");
</script>
