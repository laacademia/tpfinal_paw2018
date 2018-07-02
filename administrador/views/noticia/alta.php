<script src="./ckeditor/ckeditor.js"/></script>
<article>
    <form id="form" method="post" enctype="multipart/form-data" action="./?c=noticia&a=procesar">        
        <label name="titulo">Título:</label>
        <input id="titulo" class="element-form" type="text" name="titulo" placeholder="Título">
        <label id="activo">Activo:</label>
        <input id="activo" class="element-form" type="checkbox" name="activo">
        <label id="id_categoria">Categoria:</label>
        <select id="id_categoria" name="id_categoria" class="element-form selector" >
            <option value="seleccione" selected>-Seleccione-</option>
            <?php foreach ($categorias as $key => $categoria1): ?> 
                <option value=<?=$categoria1['id']?>><?=$categoria1['descripcion']?></option>
            <?php endforeach; ?> 
        </select>
        <label name="fecha">Fecha Publicacion:</label>
        <input id="fecha_publicacion" class="element-form" type="date" name="fecha_publicacion">
        <label name="imagen">Imagen:</label>
        <input id="imagen" class="element-form" type="file" name="imagen" accept="image/*">            
        <label name="descripcion">Descripcion:</label>
        <textarea id="descripcion" class="element-form" style="height:210px;" name="descripcion" placeholder="Descripcion" rows="4" cols="50"><?=$articulo->descripcion?></textarea> 
        <script>CKEDITOR.replace('descripcion');</script>        
        <article class="button-form-container">
            <a href="./?c=noticia&a=inicio" class="button-class-name">Cancelar</a>        
            <input class="button-form"  type="submit" name="enviar" value="Enviar">                    
        </article>
    </form>
</article>

<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>