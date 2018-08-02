<div class="descripcion">
Para la resolucion de este TP se utilizo el patrón de diseño MVC(Modelo-Vista-Controlador).<br>
<br>
La estructura del proyecto es la siguiente:<br>
<br>
<xmp>
|-conf 				
|	|-config.php	Archivo de configuracion
|	|-constant.php	Contiene las constantes que usa el framework (Ojo al modificar!)
|
|-core
|	|-controller
|	|-helpers	
|	|-model
|	|-view
|
|-controllers 		Contiene los controladores los que tiene acceso 
|-views				Contiene las vistas del usuario
|-models 			Se definen los modelos del usuario
|-web 				Directorio navegable. El Punto de acceso a la aplicacion es application.php
|-sql				Contiene los slq de la aplicacion
|
|app.conf 			Configuracion para apache
|instalacion.sh		Instalcion de la aplicacion
</xmp>
<br>
<br>
<br>
Funcionamiento. No se intenta explicar el patrón MVC.<br>
<br>
* <strong>Punto de entrada</strong>
<br>
La aplicación es "single-one-page" y el punto de entrada que es /web/application.php. Este recibe y atiende todas las peticiones.<br>
Al hacer una peticion se debe indicar el controlador y la accion de ese controlador a través de los parametros c y a respectivamente. <br>
Por ejemplo para llamar a la accion inicio del controlador Articulo se debe pasar /applicacion.php?c=articulo&a=inicio.<br>
<br>
El nombre de la accion es snake-case y en el controlador se usar camel-case (esto es para que sea mas legible en la URL). <br>
Por ejemplo si queremos llamar a la accion "listar productos" de Articulo<br>
<br>
	https://miweb/applicacion.php?c=<strong>articulo</strong>&a=<strong>listar_productos</strong><br>
<br>
	Para el controlador esta acction es <strong>ListarProductos</strong>.<br>
<br>
* <strong>Controlador</strong>
<br>
Los controladores se ubican en la carpeta controllers.<br>
El nombre del controlador tiene el sufijo 'Controller' y a cada accion del controlador se le debe anteponer el prefijo 'action'.<br>
Se especificarán todas las acciones se necesiten en el controlador.<br>
Para atender la peticion anterior (/applicacion.php?c=articulo&a=listar_productos) debemos crear el controlador /controllers/ArticuloController.php<br>
<br>
		
	<xmp>
	-----------------------------------------------------------------
	class ArticuloController extends  \core\Controller
	{	
		function actionListarProductos(){
			$articulo = $this->getModel();
			$listado = $articulo->getAll();						
			return $this->render('inicio', array('title'=>'Listado de Articulos','listado' => $listado));	//llama a la view inicio
		}

		function actionOtraAccionMas(){
			//no hago nada
		}
	}
	-----------------------------------------------------------------

	1)Se trae una instancia del modelo Articulo.
	2)Usa el metodo getAll() para traer todos los articulos y renderiza la vista 'inicio' pasandole los parametros 'title' y 'listado'.
	</xmp>

<br>
* <strong>Modelo</strong>
<br>
Los modelos se ubican en la carpeta models.<br>
El nombre del modelo debe ser el mismo que el del controlador (sin el sufijo Controller). Por ejemplo para el controlador 'ArticuloController' el modelo es 'Articulo'<br>
Este nos permite realizar operaciones sobre la DB.<br><br>
<i>(El modelo permite conectarnos con multiples Bases de datos simplemente pasandole una instancia de ContractPersistorObject. Se crearon solo dos persitores: mysql y postgresql(faltan la programacion del blob). La eleccion del motor de base de datos
se especifica en el archivo /conf/config.php)</i><br>
<br>
Para atender la peticion alcanza con definir el siguiente modelo en /controllers/Articulo.php<br>
<br>

	<xmp>
	-----------------------------------------------------------------
	namespace App\models;
	class Articulo extends \core\Model
	{

	}
	-----------------------------------------------------------------
	</xmp>
		
Toda la logica esta en el padre \core\Model.<br>
Por defecto se toma el nombre del modelo como nombre de la tabla a no ser que se espefique. Por ejemplo si queremos que la tabla del modelo Articulo sea 'perro' <br>
agregamos la propiedad $table al modelo.<br>
<br>
	<xmp>
	namespace App\models;
	class Articulo extends \core\Model
	{
		protected $table = 'perro';	
	}
	</xmp>
<br>
<br>
* <strong>Vistas</strong>
<br>
Las vistas se ubican en la carpeta views. En views se debe definir una carpeta con el nombre del controlador. En el ejemplo el controlador llama a la vista 'inicio' por<br>
lo tanto el archivo es /views/articulo/incio.php. <br>
<br>
	------------------------------------------------------------------<br>
<br>		
		<strong><xmp><h1>$title</h1></xmp></strong>
	
<br>
	------------------------------------------------------------------<br>
	Los parametros que le pasa el controlador cuando llama al metodo render pueden ser usados en la vista. <br>
	Se uso solo uno de los dos parametros que le paso el controlador, $title ($listado no).<br>
<br>
<br>
* <strong>Layouts</strong>
<br>
Por defecto las vistas son renderizadas dentro de un layout que esta definido en layouts/main.php. El contenido de las vistas se ubica en $content<br>

	<xmp>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="./css/main.css">
			<title>Este es el layout principal</title>
		</head>
		<body>
			<header class="bar-container">
				<!-- <h1>Layout Principal</h1> -->
				<nav id="main-menu">
					<ul>
						<li><a href="#">Link 1</a></li>
						<li><a href="#">Link 2</a></li>
						<li><a href="#">Link 3</a></li>
						<li><a href="#">Link 4</a></li>				
					</ul>
				</nav>
			</header>
			<section class="errores"><?php core\Notification::instancia()->imprimir(); ?></section>
			<section id="main-container">		
				<div class="bar-container title-content">Aca se reemplaza el titulo</div>		
				<div class="view-container">Aca se reemplaza el contenido de la vista</div>					
			</section>
			<footer></footer>
		</body>
		</html><
	</xmp>
<br>
<br>
<hr>
<br>
*<strong>Modelo-Campos</strong>
Por defecto el modelo usa todas las columnas de la tabla como sus propiedades. Se puede cambiar añadiendo la propiedad <strong>$columns</strong>.<br>
Por ejemplo:<br>
<br>
	<xmp>
	class Articulo extends \core\Model
	{		
		protected $columns = array('descripcion','id_articulo');
	}
	El modelo solo usará estas columnas.

	Para ver el contendido de estas columnas:
			$articulo = new Articulo();
			$articulo->descripcion;
			$articulo->id_articulo;
	</xmp>
<br>

*<strong>Modelo-Campos Obligatorios</strong>
El modelo nos permite espeficar los campos que sean obligatiorios a traves de la propiedad <strong>$obligatory_columns</strong>.<br>
Por ejemplo:<br>
<br>
	<xmp>
	class Articulo extends \core\Model
	{		
		protected $obligatory_columns = array('descripcion','id_articulo');
	}
	El modelo validara del lado del servidor que estos campos sean obligatorios.
	</xmp>
<br>
*<strong>Modelo-Imagenes</strong>
El modelo nos permite guardar imagenes blob especificado el campo blob donde se guarda el binario y el campo texto donde se guarda el type.<br>
Por ejemplo:<br>
<br>
	<xmp>
	class Articulo extends \core\Model
	{		
		protected $blobs = array('imagen' => array('blob_column'=>'imagen', 'type_column'=>'mime','maxsize'=>100000));
	}

	Con esto el modelo ya sabe que tiene que tiene que cargar la imagen en la columna imagen y el tipo de la imagen en la columna mime. Tambien se 
	especifica el tamaño maximo de la imagen.
	</xmp>
<br>
*<strong>Modelo-Relaciones</strong>
El modelo nos permite crear relaciones con otros modelos.
Por ejemplo:

	<xmp>
	class Articulo extends \core\Model
	{			
	function loadRelations(){
		//Articulo esta relacionado con Comentario y Tag
		$this->addRelation('Comentario',array('id'=>'id_articulo'));
		$this->addRelation('Tag',array('id'=>'id_articulo'));
	}
	function getComentarios(){
		return $this->getDataRelation('Comentario');
	}
	function getTags(){
		return $this->getDataRelation('Tag');
	}

	En este caso el metodo loadRelations que se ejecuta en el constructor de Model esta relacionando Articulo con Comentario y con Tag.
	La relacion de Articulo con Comentario se especifica con 
		$this->addRelation('Comentario',array('id'=>'id_articulo'));
	Dice que el campo id de Articulo esta relacionado con el campo id_articulo de Comentario.

	</xmp>	

</div>

<style type="text/css">
	.descripcion{
		font-size: 0.8em;
		width: 100%;
		overflow-x: auto;
    	white-space: nowrap;
	}
</style>