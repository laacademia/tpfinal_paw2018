/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var console = console || {},
  document = document || {},

talleresgaleria = {
    posicionSlide: 0,
    posicionCarrousel:1,
    posicionTema:0,
    n: 0,
    mostrar: function (contenedor){
        talleresgaleria.siguienteC();
    },
    moverScrolling: function (n){
        var i;
        //alert(n);
        var carrousel = document.getElementsByClassName("promos");
        if (n > carrousel.length) {
            talleresgaleria.posicionSlide = 1;
        }
        if (n < 1) {
            talleresgaleria.posicionSlide = carrousel.length;
        }
        for (i = 0; i < carrousel.length; i++) {
            carrousel[i].style.display = "none";
        }
        carrousel[talleresgaleria.posicionSlide-1].style.display = "block";
    },
    carrousel: function (n){
        var i;
        //alert(n);
        var carrousel = document.getElementsByClassName("item-carrousel");
        if (n > carrousel.length) {
            talleresgaleria.posicionCarrousel = 1;
        }
        if (n < 1) {
            talleresgaleria.posicionCarrousel = carrousel.length;
        }
        for (i = 0; i < carrousel.length; i++) {
            carrousel[i].style.display = "none";
        }
        carrousel[talleresgaleria.posicionCarrousel-1].style.display = "block";
    },
    siguienteC: function () {
        talleresgaleria.carrousel(talleresgaleria.posicionCarrousel += 1);
    },
    anteriorC: function () {
        console.log(talleresgaleria.posicionCarrousel);
        if (talleresgaleria.posicionCarrousel === 1){
            talleresgaleria.carrousel(talleresgaleria.posicionCarrousel = 2);
        }else{
            talleresgaleria.carrousel(talleresgaleria.posicionCarrousel -= 1);
        }
        
    }
};