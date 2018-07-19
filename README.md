# tpfinal_paw2018

Para la resolucion de este TP se utilizo el patrón de diseño MVC(Modelo-Vista-Controlador).
La estructura del proyecto es la siguiente:

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


Funcionamiento. No se intenta explicar el patrón MVC.

* Punto de entrada
La aplicación tiene un unico punto de entrada: /web/application.php. Este recibe y atiende todas las peticiones.
Al hacer una peticion se debe indicar el controlador y la accion de ese controlador a través de los parametros c y a respectivamente.
Por ejemplo para llamar a la accion inicio del controlador Articulo se debe pasar /applicacion.php?c=articulo&a=inicio.

El nombre de la accion se especifica con el formato snake-case y en el controlador se debe usar camel-case (esto es para que sea mas legible en la URL).
Por ejemplo si queremos llamar a la accion "listar productos" de Articulo

          https://miweb/applicacion.php?c=articulo&a=listar_productos

Para el controlador esta acction es ListarProductos.

/***************************** CONTROLADOR ******************************/
  
Los controladores se ubican en la carpeta controllers.
El nombre del controlador tiene el sufijo 'Controller' y a cada accion del controlador se le debe anteponer el prefijo 'action'.
Se especificarán todas las acciones se necesiten en el controlador.
Para atender la peticion anterior (/applicacion.php?c=articulo&a=listar_productos) debemos crear el controlador /controllers/ArticuloController.php


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
	

/***************************** MODELO ******************************/

Los modelos se ubican en la carpeta models.
El nombre del modelo debe ser el mismo que el del controlador (sin el sufijo Controller). Por ejemplo para el controlador 'ArticuloController' el modelo es 'Articulo'
Este nos permite realizar operaciones sobre la DB.

(ORM. El modelo permite conectarnos con multiples Bases de datos simplemente pasandole una instancia de ContractPersistorObject. Se crearon solo dos persitores: mysql y postgresql(faltan la programacion del blob). La eleccion del motor de base de datos se especifica en el archivo /conf/config.php)

Para atender la peticion alcanza con definir el siguiente modelo en /controllers/Articulo.php


	-----------------------------------------------------------------
	namespace App\models;
	class Articulo extends \core\Model
	{

	}
	-----------------------------------------------------------------
	
Toda la logica esta en el padre \core\Model.
Por defecto se toma el nombre del modelo como nombre de la tabla a no ser que se espefique. Por ejemplo si queremos que la tabla del modelo Articulo sea 'perro'
agregamos la propiedad $table al modelo.


	namespace App\models;
	class Articulo extends \core\Model
	{
		protected $table = 'perro';	
	}

/***************************** VISTAS ******************************/

Las vistas se ubican en la carpeta views. En views se debe definir una carpeta con el nombre del controlador. En el ejemplo el controlador llama a la vista 'inicio' por
lo tanto el archivo es /views/articulo/incio.php.

------------------------------------------------------------------

\<h1>$title< / h1>

------------------------------------------------------------------
Los parametros que le pasa el controlador cuando llama al metodo render pueden ser usados en la vista.
Se uso solo uno de los dos parametros que le paso el controlador, $title ($listado no).


* Layouts
Por defecto las vistas son renderizadas dentro de un layout que esta definido en layouts/main.php. El contenido de las vistas se ubica en $content

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
			<section class="errores"><section></section></section>
			<section id="main-container">		
				<div class="bar-container title-content">Aca se reemplaza el titulo</div>		
				<div class="view-container">Aca se reemplaza el contenido de la vista</div>					
			</section>
			<footer></footer>
		</body>
		</html><
	

/***************************** EXTRAS MODELO ******************************/

*Modelo-Campos Por defecto el modelo usa todas las columnas de la tabla como sus propiedades. Se puede cambiar añadiendo la propiedad $columns.
Por ejemplo:


	class Articulo extends \core\Model
	{		
		protected $columns = array('descripcion','id_articulo');
	}
	El modelo solo usará estas columnas.

	Para ver el contendido de estas columnas:
			$articulo = new Articulo();
			$articulo->descripcion;
			$articulo->id_articulo;
	

*Modelo-Campos Obligatorios El modelo nos permite espeficar los campos que sean obligatiorios a traves de la propiedad $obligatory_columns.
Por ejemplo:


	class Articulo extends \core\Model
	{		
		protected $obligatory_columns = array('descripcion','precio');
	}
	El modelo validara del lado del servidor que estos campos sean obligatorios. Se mostrara un mensaje al usuario de error, en caso falte alguno de estos campos, usando la clase core\Notification.php. Ej:

  namespace App\models;
	class Articulo extends \core\Model
	{
		protected $obligatory_columns = array('nombre','precio');
	}
	

*Modelo-Imagenes El modelo nos permite guardar imagenes blob especificado el campo blob donde se guarda el binario y el campo texto donde se guarda el type.
Por ejemplo:


	class Articulo extends \core\Model
	{		
		protected $blobs = array('imagen' => array('blob_column'=>'imagen', 'type_column'=>'mime','maxsize'=>100000));
	}

	Con esto el modelo ya sabe que tiene que tiene que cargar la imagen en la columna imagen y el tipo de la imagen en la columna mime. Tambien se 
	especifica el tamaño maximo de la imagen.
	

*Modelo-Relaciones El modelo nos permite crear relaciones con otros modelos. Por ejemplo:

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
  
  
  /************************** GENERADOR DE CODIGO ***************************/
  
  Para agilizar el desarrollo existen dos generadores de codigo. Uno genera una estructura simple y el otro genera un AMB.
  -Simple: Por ejemplo podemos crear la operacion 'comentario'. El comando creara el controlador, modelo y una vista sencilla.
  
    ./bin/crear_operacion comentario
    
                  Este comando genera:
                    -models/Comentario.php
                    -controllers/ComentarioController.php
                    -views/comentario/inicio.php                    
  
  -ABM: Este comando nos permite crear una operacion para poder dar de alta, actualizar y borrar. Nos genera el listado y 
  las pantallas para edicion y alta automaticamente. Espera una respuesta por prompt para agregar la operacion al menu.
  
    ./bin/crear_operacion_abm comentario
    
                  Este comando genera:
                    -models/Comentario.php
                    -controllers/ComentarioController.php
                    -views/comentario/inicio.php
                    -views/comentario/alta.php
                    -views/comentario/edicion.php
                  Ademas agrega la linea  
                            <li><a href="./?c=comentario&a=inicio">comentario</a></li> 
                  a views/layouts/menu.php
                    
                    
  
  
  
  
  
  
  
  
  
  
  
  
  
  
