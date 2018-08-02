/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var console = console || {},
  document = document || {},
  
animacion = {
    clases_disponibles: ['opacidad0','opacidad45', 'opacidad90', 'opacidad135','opacidad180','opacidad225','opacidad270','opacidad315'],
    div_opacidades:     ['grado0','grado45','grado90','grado135','grado180','grado225','grado270','grado315'],
    vueltas: ['color1','color2','color3'],
    posActual: 0,
    vueltaActual: 0,
    posicionColor: 0,
    contadorEjecuciones: 0,
    claseColor:"color1",
    iniciar: function (contenedor) {
        
        var elementos = document.getElementById('scrolling');
        if (elementos !== null){
            //console.log(elementos);
        }else{
            document.getElementById('imagen-loader').style.display = "block";
        }
                
        
        setInterval(animacion.pintar,250);
    },
    siguiente: function(posicion){
        if(posicion===(this.clases_disponibles.length-1)){
            return 0;
        }else{
            return (posicion+1);
        }
    },
    pintar: function(){
        //var   = document.getElementById(this.posActual);
        var id_circulo = animacion.posActual;
        //cada vez que se ejecuta, incremento el contador
        animacion.contadorEjecuciones++;
        if (animacion.contadorEjecuciones===8){
            animacion.posicionColor = animacion.siguienteColor(animacion.posicionColor);
            animacion.claseColor = animacion.vueltas[animacion.posicionColor];
            animacion.contadorEjecuciones=0;
        }
        for (var i = 0; i<animacion.clases_disponibles.length; i++) {
            //console.log(i,"i");
            var id = animacion.div_opacidades[id_circulo];            
            document.getElementById(id).className = animacion.clases_disponibles[i] + " " + animacion.claseColor ;            
            id_circulo = animacion.siguiente(id_circulo);            
        }
        animacion.posActual = animacion.siguiente(animacion.posActual);
    },
    siguienteColor: function(color){
        //console.log(color,"coloractual function");
        //console.log(animacion.vueltas.length-1,"animacion.vueltas.length-1");
        if(color===(animacion.vueltas.length-1)){
            return 0;
        }else{
            return (color+1);
        }
    }
};
