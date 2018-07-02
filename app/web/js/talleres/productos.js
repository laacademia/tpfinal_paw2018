var Producto = function(_id, _nombre, _descripcion, _imagen,_precio){
		this.id = _id;
		this.nombre = _nombre;
		this.descripcion = _descripcion;
		this.imagen = _imagen;
		this.precio = _precio;
		this.getHtml = function(){
			var eArticulo = $('<article></article>').addClass('producto'),
				eFigure = $('<figure></figure>'),
				eImg = $('<img>').attr('src',this.imagen),
				eFigcaption = $('<figcaption></figcaption>').html('<span class="precio-producto">$'+this.precio+'</span><br>'+this.descripcion);				
			eFigure.append(eImg).append().append(eFigcaption);
			eArticulo.append(eFigure);						
			return eArticulo;			
		}
	},
	Listado = function(){
		this.productos = [];
		this.agregarProducto = function(producto){
			this.productos.push(producto);
		}
		this.generarHtml = function(contenedor){
			var eListado = $('<ul></ul>').attr('id','lista-productos').addClass('lista-productos');
			this.generarBotonera(contenedor);			

			//genero el listado de productos
			for (var i = 0; i < this.productos.length; i++) {
				var eItem = $('<li></li>');
				eItem.append( this.productos[i].getHtml() );	
				$(eListado).append(eItem);		
			}
			$('#'+contenedor).append(eListado);						
		},
		this.generarBotonera = function(contenedor){
			var eBotonera = $('<div></div>').attr('id','botonera-visualizacion-productos').addClass('botonera-visualizacion-productos'),
				eBotonListado = $('<div></div>').attr('id','boton-visualizacion-listado').addClass('boton').html('Listado'),
				eBotonGrilla = $('<div></div>').attr('id','boton-visualizacion-grilla').addClass('boton').html('Grilla');
				$(eBotonListado).on('click',function(){					
					$('#contenedor-lista-productos').removeClass('visualizacion-grilla').addClass('visualizacion-listado');
				});
				$(eBotonGrilla).on('click',function(){
					$('#contenedor-lista-productos').removeClass('visualizacion-listado').addClass('visualizacion-grilla');
				});
				$(eBotonera).append(eBotonListado);
				$(eBotonera).append(eBotonGrilla);
				$('#'+contenedor).append(eBotonera);			
		}
	};