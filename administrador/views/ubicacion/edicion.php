<form id="form" method="post" action="./?c=ubicacion&a=procesar"> 
    <input id="id" type="text" name="id" value="<?=$ubicacion->id?>" style="display: none;">
    <!--descripcion-->
    <label name="descripcion">Descripcion:</label>
    <input id="descripcion" class="element-form" type="text" name="descripcion" placeholder="Descripcion"  value="<?=$ubicacion->descripcion?>">
    <!--latitud-->
    <label name="latitud">Latitud:</label>
    <input id="latitud" class="element-form" type="text" name="latitud" placeholder="latitud"  value="<?=$ubicacion->latitud?>">
    <!--longitud-->
    <label name="longitud">longitud:</label>
    <input id="longitud" class="element-form" type="text" name="longitud" placeholder="longitud"  value="<?=$ubicacion->longitud?>">

    <!--letra_marcador-->
    <label name="letra_marcador">Letra Marcador:</label>
    <input id="letra_marcador" class="element-form" type="text" name="letra_marcador" placeholder="Letra Marcador"  value="<?=$ubicacion->letra_marcador?>">

    <!-- titulo -->
    <label name="titulo">Titulo:</label>
    <input id="titulo" class="element-form" type="text" name="titulo" placeholder="Titulo" value="<?=$ubicacion->titulo?>">
    <!-- subtitulo -->
    <label name="subtitulo">Subtitulo:</label>
    <input id="subtitulo" class="element-form" type="text" name="subtitulo" placeholder="Subtitulo" value="<?=$ubicacion->subtitulo?>">
    <!-- descripcion_texto -->
    <label name="descripcion_texto">Descripcion Larga:</label>
    <input id="descripcion_texto" class="element-form" type="text" name="descripcion_texto" placeholder="Descripcion Larga" value="<?=$ubicacion->descripcion_texto?>">
    <!-- horario -->
    <label name="horario">Horario:</label>
    <input id="horario" class="element-form" type="text" name="horario" placeholder="Horario" value="<?=$ubicacion->horario?>">
    <!-- direccion -->
    <label name="direccion">Direccion:</label>
    <input id="direccion" class="element-form" type="text" name="direccion" placeholder="Dias Abierto" value="<?=$ubicacion->direccion?>">
    <!-- telefono -->
    <label name="telefono">Telefono:</label>
    <input id="telefono" class="element-form" type="text" name="telefono" placeholder="Telefono" value="<?=$ubicacion->telefono?>">

    <article class="button-form-container">
        <a href="./?c=ubicacion&a=inicio" class="button-class-name">Cancelar</a>
        <input class="button-form" id="enviar" type="submit" name="enviar" value="Enviar">        
    </article>
</form>
<?php require(ABSOLUTE_DIRECTORY_VIEWS . 'ubicacion/mapa.php'); ?>
<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>