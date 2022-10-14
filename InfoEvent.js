/**
function abrir(id) {
    var element = document.getElementById(id);
    element.classList.add("visibilidad");
}
function cerrar(id) {
    var element = document.getElementById(id);
    element.classList.remove("visibilidad");
}
 */
function agregarClase(id, nomClase){   
     nodo = document.getElementById(id)
     if (nodo.classList==""){
         nodo.setAttribute("class",nomClase);
     }else{
         nodo.classList.add(nomClase);
     }    
 }
 
 function eliminarClase(id, nomClase){
     nodo = document.getElementById(id)
     nodo.classList.remove(nomClase);
 }
 
 function abrir(id){
     nodo = document.getElementById(id);
     agregarClase(id, "visibilidad");
 }

 function comprobar(param){
    for (let i in param){
        if (i==False) {
            onsubmit= disable
        }
    }
}

 function cerrar(id){
     nodo = document.getElementById(id);
     eliminarClase(id, "visibilidad");
 }


 function validardatos(id, id2, id3) {
    res = true
    var num03 = document.forms[id][id2].value;
    var num01 = document.forms[id][id3].value;
   

    if ((num03 == null || num03 == "") || (num01 == null || num01 == "")) {
        alert("Falta completar campos");
        res = false;
    }

    return res 
}

function ValidarSingUp(id, id2, id3, id4){
    res = true
    var num03 = document.forms[id][id2].value;
    var num01 = document.forms[id][id3].value;
    var num02 = document.forms[id][id4].value;

    if ((num03 == null || num03 == "") || (num01 == null || num01 == "")) {
        alert("Falta completar campos");
        res = false;
    }
    if (num02 != num01){
        alert("La contraseña no coincide");
        res = false;
    }

    return res 
}

// Establecer la fecha de cierre de evento
var countDownDate = new Date('2022-11-07T00:00:00').getTime();

// Actualizar el contador cada 1 segundo
var x = setInterval(function() {

  // Tomar la fecha actual (FALTA RESOLVER ZONAS HORARIAS)
  var now = new Date().getTime();

  // Hallar la diferencia de tiempo entre la fecha límite y el presente
  var distance = countDownDate - now;

  // Cálculos de tiempo para cada unidad
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Muestra el resultado del cálculo en el texto id="contador-cierre"
  document.getElementById("contador-cierre").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // Si la cuenta regresiva finalizó, se indica que el evento finalizó.
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("contador-cierre").innerHTML = "Evento Finalizado";
    agregarClase("titulo-contador", "no-mostrar");
    agregarClase("bot-participar", "no-mostrar");
    agregarClase("cont-cant-jugadores", "no-mostrar");
  }
}, 1000);



    // funcion leer mas para preguntas (sobrenos.html)

    function myFunction() {
        var respuesta = document.getElementById("hidden_info");
        var moreText = document.getElementById("mostrar");
        var btnText = document.getElementById("myBtn");
      
        if (respuesta.style.display === "none") {
          respuesta.style.display = "inline";
          btnText.innerHTML = "Read more";
          moreText.style.display = "none";
        } else {
          respuesta.style.display = "none";
          btnText.innerHTML = "Read less";
          moreText.style.display = "inline";
        }
      }