var console = console || {},
  document = document || {},

inicioSite = {
    posicionSlide: 0,
    posicionCarrousel:1,
    n: 0,
   
    
    iniciar: function (contenedor) {
        setInterval(inicioSite.siguiente,2500);
    },
    mostrar: function (contenedor){
        inicioSite.siguienteC();
    },
    moverScrolling: function (n){
        var i;
        //alert(n);
        var carrousel = document.getElementsByClassName("inicio");
        if (n > carrousel.length) {
            inicioSite.posicionSlide = 1;
        }
        if (n < 1) {
            inicioSite.posicionSlide = carrousel.length;
        }
        for (i = 0; i < carrousel.length; i++) {
            carrousel[i].style.display = "none";
        }
        carrousel[inicioSite.posicionSlide-1].style.display = "block";
    },
    siguiente: function () {
        inicioSite.moverScrolling(inicioSite.posicionSlide += 1);
    },
    carrousel: function (n){
        var i;
        //alert(n);
        var carrousel = document.getElementsByClassName("item-carrousel");
        if (n > carrousel.length) {
            inicioSite.posicionCarrousel = 1;
        }
        if (n < 1) {
            inicioSite.posicionCarrousel = carrousel.length;
        }
        for (i = 0; i < carrousel.length; i++) {
            carrousel[i].style.display = "none";
        }
        carrousel[inicioSite.posicionCarrousel-1].style.display = "block";
    }
};