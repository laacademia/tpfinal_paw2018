       
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">    
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaH-CtIiEJgyqaNf_5Z31yI8nygDdUzXI&libraries=places&callback=initMap" async defer></script>
    <script>
    
      var marker;
      initMap();
            
      function initMap() {
        var posicion = {lat: -34.6, lng: -58.38};
             
        var zoom = 6;                  

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: zoom,
          center: posicion,
          mapTypeControl: false,
          panControl: false,
          zoomControl: false,
          streetViewControl: false
        });

        var posicion = {};
        var latitud = $('#latitud').val();
        var longitud = $('#longitud').val();
        if( (longitud!==null) && (latitud!==null)){            
          posicion.lat = parseFloat(latitud);
          posicion.lng = parseFloat(longitud);          
        }else{
          posicion = {lat: -34.6, lng: -58.38};
        }

        var descripcion = $('#descripcion').val();
          console.log(descripcion);
          var letra_marcador = $('#letra_marcador').val();

          //si esta cargada la longitud y latitud agrego el marcador
          marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            anchorPoint: new google.maps.Point(0, -29),
            title: descripcion,
            label: letra_marcador,
          });

          var infowindow = new google.maps.InfoWindow({
            content: descripcion
          });

          marker.addListener('mouseup', function() {
            //infowindow.open(marker.get('map'), marker);
            var infowindow = new google.maps.InfoWindow();
            console.log(marker.getPosition());
            
            $('#latitud').val( marker.getPosition().lat() );            
            $('#longitud').val( marker.getPosition().lng() );
            
          });
          infowindow.open(marker.get('map'), marker);

          map.panTo(posicion);
          map.setZoom(15);
          marker.setPosition(posicion);
          marker.setVisible(true);
   
        function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
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


  @media only screen and (max-width: 600px) {
      #locationField {
        width: 80%;
      }
  }
</style>