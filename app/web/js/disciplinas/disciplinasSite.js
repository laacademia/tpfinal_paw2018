/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var console = console || {},
  document = document || {},

Disciplina = {
    abrirVentana: function(n) {
        window.open("?c=disciplinas&a=DisciplinasVentana", "nuevo", "directories=no, location=no, menubar=yes, scrollbars=yes, statusbar=yes, tittlebar=no, width=600, height=600");

//        document.getElementById('fotos-galeria').style.display = "block";
        //alert(this.posicionSlide = n);
        //alert(n);
// /       this.abrirDisciplina(n);
    },
    cerrarPresentacion: function () {
        document.getElementById('fotos-galeria').style.display = "none";
    }
};