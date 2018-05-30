var cantidad = new Array();
var precio = new Array();
var total= new Array();
var cantArt;
var totalFinal = 0;
var asignar_eventos = function(){
    var cantArticulos = document.getElementById("puto");
    cantArt = parseInt(cantArticulos.innerHTML);
    var i = 0;
    while (i <cantArt){
        var esta = "cantidad"+i;
        cantidad.push(document.getElementById("cantidad"+i));
        precio.push(document.getElementById("precio"+i));
        total.push(document.getElementById("total"+i));
        cantidad[i].addEventListener("input",hola);
        i++;
    }
}
var hola = function(){
    totalFinal = 0;
    var i = 0;
    var cant = 0;
    var pre = 0;
    while(i < cantArt){
        cant = parseInt(cantidad[i].value);
        pre = parseInt(precio[i].innerHTML);

        if(!isNaN(cant) && !isNaN(pre)){
            total[i].innerHTML ="$"+(pre*cant)+".00";
            if(totalFinal == 0)
                totalFinal = (pre*cant);
            else
            totalFinal += (pre*cant);
        }
        else{
            total[i].innerHTML ="$ "+0.00;
        }
        i++;
    }
    var tf = document.getElementById("totalfinal");
    var subt = document.getElementById("Subtotal");
    subt.innerHTML = "$"+totalFinal+".00";
    tf.innerHTML ="$"+totalFinal+".00";
    /*
    var cant = parseInt(cantidad.value);
    var pre = parseInt(precio.innerHTML);
    
    if(!isNaN(cant) && !isNaN(pre)){
        total.innerHTML ="$"+(pre*cant)+".00";
    }
    else{
        total.innerHTML ="$ "+0.00;
    }
    */
   
}
setInterval(function(){
    $.php("<?php echo "+Holamundo+"; ?>");
  },1)

window.onload = asignar_eventos;