var cantidad = new Array();
var cantidadDefault = new Array();
var precio = new Array();
var total= new Array();
var IdA = new Array();
var IdC = new Array();
var stock = new Array();
var cantArt;
var totalFinal = 0;
var asignar_eventos = function(){
    var cantArticulos = document.getElementById("puto");
    cantArt = parseInt(cantArticulos.innerHTML);
    var i = 0;
    while (i <cantArt){
        var esta = "cantidad"+i;
        cantidad.push(document.getElementById("cantidad"+i));
        cantidadDefault.push(parseInt(cantidad[i].value));
        precio.push(document.getElementById("precio"+i));
        total.push(document.getElementById("total"+i));
        IdA.push(document.getElementById("IdARt"+i));
        IdC.push(document.getElementById("Idclie"+i));
        stock.push(document.getElementById("stock"+i));
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
        cantAux = parseInt(cantidadDefault[i]);
        if( cant >= parseInt(stock[i].value)){
            cant = parseInt(stock[i].value);
            cantidad[i].value = cant;
        }
        if (cantAux != cant) {
            cantidadDefault[i] = cant;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                }
            };
            xmlhttp.open("GET", "php/cart_proceso.php?q="+cant+"&ida="+IdA[i].value+"&idc="+IdC[i].value, true);
            xmlhttp.send()

            pre = parseInt(precio[i].innerHTML);
            if (!isNaN(cant) && !isNaN(pre)) {
                total[i].innerHTML = "$" + (pre * cant) + ".00";
                if (totalFinal == 0)
                    totalFinal = (pre * cant);
                else
                    totalFinal += (pre * cant);
            }
            else {
                total[i].innerHTML = "$ " + 0.00;
            }
        }
        i++;
    }
    var tf = document.getElementById("totalfinal");
    var subt = document.getElementById("Subtotal");
    subt.innerHTML = "$"+totalFinal+".00";
    tf.innerHTML ="$"+totalFinal+".00";
    
    
        
}

window.onload = asignar_eventos;