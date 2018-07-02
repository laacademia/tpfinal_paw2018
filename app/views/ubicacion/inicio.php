       
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">    
    <div id="map"></div>
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
          posicion.lat = parseFloat(data[0].latitud);
          posicion.lng = parseFloat(data[0].longitud);

          map = new google.maps.Map(document.getElementById('map'), {
            zoom: zoom,
            center: posicion,
            mapTypeControl: false,
            panControl: false,
            zoomControl: false,
            streetViewControl: false
          });

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
          };
          
        });
        
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