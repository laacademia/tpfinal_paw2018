<script src="./ckeditor/ckeditor.js"/></script>
<form id="form" method="post" action="./?c=quienesSomos&a=actualizar"> 
    <!--Titulo-->
    <label name="titulo">Titulo:</label>
    <input id="titulo" class="element-form" type="text" name="titulo" placeholder="Titulo" value="<?= $titulo ?>">
    <!--Descripcion-->
    <label name="descripcion">Descripcion:</label>
    <!-- <input id="descripcion" class="element-form" type="text" name="descripcion" placeholder="Descripcion" value="<?= $descripcion ?>"> -->
    <textarea id="descripcion" class="element-form" style="height:210px;" name="descripcion" placeholder="Descripcion" rows="4" cols="50"><?= $descripcion ?></textarea> 
    <script>CKEDITOR.replace('descripcion');</script>
    <!--Botonera-->
    <article class="button-form-container">
        <input class="button-form" id="enviar" type="submit" name="enviar" value="Enviar">        
    </article>
</form>

<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>

