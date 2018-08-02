       
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <div id="ubicaciones-container"></div>
    <div id="map"></div>
    <?php include('descripcion_ubicacion.php'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaH-CtIiEJgyqaNf_5Z31yI8nygDdUzXI&libraries=places&callback=initMap" async defer></script>
    <script>
    
      var marker;
      initMap();
            
      function initMap() {
        var posicion = {lat: -34.6, lng: -58.38};
        
        var zoom = 6;
   
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "./?c=ubicacion&a=ubicaciones"
        }).done(function(data){
          console.log(data);
          
          
          // for(id_ubicacion in data){
          //   var eItemUbicacion = $('<li></li>').attr('id_ubicacion',data[id_ubicacion].id);
          //   eItemUbicacion.html(data[id_ubicacion].descripcion);
          //   eItemUbicacion.on('click',function(){

          //   });
          //   eContainerUbicaciones.append(eItemUbicacion);
          // }

          posicion.lat = parseFloat(data[0].latitud);
          posicion.lng = parseFloat(data[0].longitud);

          map = new google.maps.Map(document.getElementById('map'), {
            zoom: zoom,
            center: posicion,
            mapTypeControl: false,
            panControl: false,
            zoomControl: false,
            streetViewControl: true
          });

          //agrego una lista con las ubicaciones para poder elegir y que se desplace el marcador
          var eContainerUbicaciones = $('#ubicaciones-container');
          var eListaUbicaciones = $('<ul></ul>').attr('id','lista_ubicaciones');
          $('#ubicaciones-container').html('');

          for (var i = 0; i < data.length; i++) {
            marker = new google.maps.Marker({
              map: map,
              draggable: true,
              animation: google.maps.Animation.DROP,
              anchorPoint: new google.maps.Point(0, -29),
              title: data[i].descripcion,
              label: data[i].letra_marcador,
            });
            marker.addListener('click', toggleBounce);

            posicion.lat = parseFloat(data[i].latitud);
            posicion.lng = parseFloat(data[i].longitud);
            map.panTo(posicion);
            map.setZoom(15);
            marker.setPosition(posicion);
            marker.setVisible(true);

            var eItemUbicacion = $('<li></li>').addClass('item-ubicacion');
            eItemUbicacion.attr('id_ubicacion',data[i].id);
            eItemUbicacion.attr('latitud',data[i].latitud);
            eItemUbicacion.attr('longitud',data[i].longitud);
            eItemUbicacion.attr('index',i); //ver de pasarle esto solo!!!

            eItemUbicacion.html(data[i].descripcion);
            cargarInfoUbicacion(data[0]);         //cargo la info de la primera ubicacion            
            $('.item-ubicacion').first().addClass('ubicacion_seleccionada');
            eItemUbicacion.on('click',function(){            
              var posicion = {};
              $('.ubicacion_seleccionada').removeClass('ubicacion_seleccionada'); //le saco la seleccion a la ubicacion anterior
              $(this).addClass('ubicacion_seleccionada');                         //le agrego la seleccion a la actual
              posicion.lat = parseFloat($(this).attr('latitud'));
              posicion.lng = parseFloat($(this).attr('longitud'));
              map.panTo(posicion);
              map.setZoom(15);

              var index = $(this).attr('index');
              cargarInfoUbicacion(data[index]);
            });
            eContainerUbicaciones.append(eItemUbicacion);

          };
          
        });
        
        function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        }
        function cargarInfoUbicacion(ubicacion){          
          $('#titulo').html(ubicacion.titulo);
          $('#subtitulo').html(ubicacion.subtitulo);
          $('#descripcion_texto').html(ubicacion.descripcion_texto);
          $('#horario').html(ubicacion.horario);
          $('#direccion').html(ubicacion.dias_abierto);
          $('#telefono').html('<strong>Telefono:</strong>'+ubicacion.telefono);
        }  
      }
      
    </script>
    

<style type="text/css">

  #map {
    height: 80vh;
  }

  #locationField, #controls {
    position: relative;
    width: 480px;
  }
  #autocomplete {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 99%;
  }
  .label {
    text-align: right;
    font-weight: bold;
    width: 100px;
    color: #303030;
  }
  #address {
    display: none;
    border: 1px solid #000090;
    background-color: #f0f0ff;
    width: 480px;
    padding-right: 2px;
    
  }
  #address td {
    font-size: 10pt;
  }
  .field {
    width: 99%;
  }
  .slimField {
    width: 80px;
  }
  .wideField {
    width: 200px;
  }
  #locationField {
    height: 20px;
    margin-bottom: 2px;
    position: fixed;
    z-index: 2;
  }
  #ubicaciones-container{
    display: inline-block;
    font-weight: bold;
    text-transform: uppercase;
  }
  #ubicaciones-container li{
    float: left;
    padding: 20px;
    text-decoration:none;
    list-style: none;
    cursor: pointer;    
  }
  #ubicaciones-container li:hover{
    /*border-bottom: 2px solid #000;*/
  }
  .ubicacion_seleccionada{
    color: #0080FF;
    border-bottom: 2px solid #000;
  }

  @media only screen and (max-width: 600px) {
      #locationField {
        width: 80%;
      }
  }
</style>