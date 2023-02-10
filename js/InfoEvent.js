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
 

 function comprobar(param){
    for (let i in param){
        if (i==False) {
            onsubmit= disable
        }
    }
}

 function cerrar(id){
     nodo = document.getElementById(id);
     eliminarClase(id, 'visibilidad');
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

function ValidarSingUp(id, id2, id3, id4){ // id2 es mail, id3 y id4 son las contraseñas
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

function mostrarBoton(){
    eliminarClase("bot-participar", "no-mostrar");
    eliminarClase("cont-cant-jugadores", "no-mostrar");
}

function contador(fechaCierre){
    // Establecer la fecha de cierre de evento
    var countDownDate = new Date(fechaCierre).getTime();

    function cicloContador(countDownDate){
        // Tomar la fecha actual (FALTA RESOLVER ZONAS HORARIAS)
        var now = new Date().getTime();

        // Hallar la diferencia de tiempo entre la fecha límite y el presente
        var distance = countDownDate - now;

        // Al iniciar el script, verifica si debe o no mostrar el boton de participar, segun la cuenta regresiva
        var load = 0;
        if (distance > 0 && load == 0){
            mostrarBoton();
            load = 1;
        }

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
            clearInterval(xCont);
            document.getElementById("contador-cierre").innerHTML = "Evento Finalizado";
            agregarClase("titulo-contador", "no-mostrar");
            agregarClase("bot-participar", "no-mostrar");
            agregarClase("cont-cant-jugadores", "no-mostrar");
            eliminarClase("bot-res", "no-mostrar");
        }
    }
    cicloContador(countDownDate); //La llama por primera vez
    // Actualizar el contador cada 1 segundo
    var xCont = setInterval(function() {
        cicloContador(countDownDate);
    }, 1000);
}

