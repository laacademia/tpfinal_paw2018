<li class="boton_menu" controlador="home" accion="inicio" titulo="">Inicio</li>				
<li class="boton_menu" controlador="disciplinas" accion="inicio" titulo="Disciplinas">Disciplinas</li>
<li class="boton_menu" controlador="talleres" accion="inicio" titulo="Talleres">Talleres</li>
<li class="boton_menu" controlador="muestras" accion="inicio" titulo="Muestras">Muestras</li>				
<li class="boton_menu" controlador="quienesSomos" accion="inicio" titulo="¿Quienes somos?">¿Quienes somos?</li>	
<li class="boton_menu" controlador="ubicacion" accion="inicio" titulo="Nuestra Ubicacion">Nuestra Ubicacion</li>
<li class="boton_menu" controlador="mensaje" accion="inicio" titulo="Contacto">Contacto</li>


<style type="text/css">
	.boton_menu{
		cursor: pointer;
	}
</style>
<!-- Navegacion ajax de la app -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.boton_menu').click(function(){
			var controlador = $(this).attr('controlador');
			var accion = $(this).attr('accion');
			var titulo = $(this).attr('titulo');
			var url = "./?c="+controlador+"&a="+accion;

			$('#imagen-loader').show();
			$('#title-view-container').html(titulo);
			$.get(url, function(data, status){

		    }).done(function(data){
		    	$('#imagen-loader').hide();
		    	$('.view-container').html(data);
		    });
		});	
	});	
</script>