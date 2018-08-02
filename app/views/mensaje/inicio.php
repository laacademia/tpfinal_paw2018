<!--<form id="form" method="post" action="/?c=mensaje&a=enviarmensaje"> -->
<form id="form" method="post">
    <!--Nombre-->
    <label name="nombre">Nombre:</label>
    <input id="nombre" class="element-form" type="text" name="nombre" placeholder="Nombre">
    <!--Apellido-->
    <label name="apellido">Apellido:</label>
    <input id="apellido" class="element-form" type="text" name="apellido" placeholder="Apellido">
    <!--Mail-->
    <label name="mail">Mail:</label>
    <input id="mail" class="element-form" type="text" name="mail" placeholder="Mail">

    <label name="mensaje">Mensaje:</label>
    <textarea id="mensaje" class="element-form textarea" name="mensaje" rows="4" cols="50" placeholder="Mensaje"></textarea>

    <article class="button-form-container">
        <input class="button-form" id="enviar" type="submit" name="enviar" value="Enviar" onclick="">        
    </article>
</form>

<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>
<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){	
    $("#enviar").click(function(){            
        var formulario = $("#form").serializeArray();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: './?c=mensaje&a=enviarmensaje',
            data: formulario
        }).done(function(respuesta){
            console.log(respuesta);                
            if(respuesta.status === 'ok'){
                alert("Se envió el mensaje!!!");
            }
        }).fail(function(){
            console.log(respuesta,"respuesta");
            //alert(respuesta);
        });
    });
});
</script>