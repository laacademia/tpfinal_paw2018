<script src="./ckeditor/ckeditor.js"/></script>
<article class="noticia-container">
    <form id="form" method="post" enctype="multipart/form-data" action="./?c=noticia&a=procesar">
        <input id="id" type="text" name="id" value="<?=$noticia->id?>" style="display: none;">
        <label id="titulo">Título:</label>
        <input id="titulo" class="element-form" type="text" name="titulo" placeholder="Título" value="<?=$noticia->titulo?>">        
        <label id="fecha">Fecha Publicacion:</label>
        <input id="fecha_publicacion" class="element-form" type="date" name="fecha_publicacion" value="<?=$noticia->getFechaPublicacionFormateada()?>">
        <label id="activo">Activo:</label>
        <input id="activo" class="element-form" type="checkbox" name="activo">
        <label id="imagen">Imagen:</label>
        <input id="imagen" class="element-form" type="file" name="imagen" accept="image/*">
        <label name="descripcion">Descripcion:</label>        
        <textarea id="descripcion" class="element-form" style="height:210px;" name="descripcion" placeholder="Descripcion" rows="4" cols="50"><?=$noticia->descripcion?></textarea> 
        <script>CKEDITOR.replace('descripcion');</script>        
        <article class="button-form-container">
            <a href="./?c=noticia&a=inicio" class="button-class-name">Cancelar</a>
            <input class="button-form"  type="submit" name="enviar" value="Enviar">
        </article>
    </form>
    <?php echo '<img class="mi-imagen" src="data:image/jpeg;base64,'.base64_encode( $noticia->imagen ).'"/>' ; ?>
</article>
<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>