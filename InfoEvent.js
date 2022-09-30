const RE_NUM_ENTERO= /^\d*\.\d+$/;
const RE_VACIO = /^\s*$/;

function es2Ent2Dec(miID) {
    var patron = RE_NUM_ENTERO;
    var contenido = document.getElementById(miID).value;
    return esVacio(miID) || patron.test(contenido);
}

function esVacio(miID) {
    var patron = RE_VACIO;
    var contenido = document.getElementById(miID).value;
    return patron.test(contenido);
  }

function validarNum(miID) {
    var valido;
  
    if (es2Ent2Dec(miID)) {
      valido = true;
    }
    else {
      valido = false;
    }
    return valido;
  }
  

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


 function validardatos() {
    res = true
    var num03 = document.forms["Datos"]["nom01"].value;
    var num01 = document.forms["Datos"]["datos01"].value;
   

    if ((num03 == null || num03 == "") || (num01 == null || num01 == "")) {
        alert("Falta completar campos");
        res = false;
    }

    return res 
}

