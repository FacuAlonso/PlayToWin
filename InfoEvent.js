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

