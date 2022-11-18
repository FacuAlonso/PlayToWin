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

// Cierra el formulario y borra el contenido, para otro uso.
function cerrarForm(id,idForm){ 
    nodo = document.getElementById(id);
    eliminarClase(id, "visibilidad");
    nodoForm = document.getElementById(idForm);
    nodoForm.reset();
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

function CargaPresetAJAX($id){
    loadContTextAjax('cargaDatosAdmin/infoPresetAJAX.php',$id)
    abrir('popup-caja');
}


/*
Ready State:
0: La peticion no se ha inicializado
1: Conexion con el servidor establecida
2: Peticion recibida
3: Procesando Peticion
4: Peticion finalizada y la respuesta esta lista.

Status:
200: ok
404: Pagina no encontrada

https://developer.mozilla.org/es/docs/Web/Guide/AJAX/Getting_Started
http://www.saregune.net/ikasi/hezigune/curso.php?curso=ajax&leccion=ajax_xml_intro

*/

// ============================================================
// FUNCIONES AJAX
// ============================================================
function conectAjax() {
	var httpRequest = false;        		 //	CREA EL OBJETO "AJAX".Que es una instancia de XMLHttpRequest.
    										 // Esta funcion es generica para cualquier utilidad 
    if (window.XMLHttpRequest) {             // -> Mozilla, Safari, ...
		httpRequest = new XMLHttpRequest();  
    } else if (window.ActiveXObject) {       // -> IE
		httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return httpRequest;
}

function loadContTextAjax(url,idPres,method="POST") {
    // url : es la dirección donde se obtiene los datos (el servidor)
    // console.log(url); 
    var xhr = conectAjax();                                     // Creo el objeto AJAX     
    if(xhr) {
        xhr.open(method, url, true);                  // false = sincro , true = asincro
        xhr.onreadystatechange = function() {
            if (xhr.readyState!=1) {
                document.body.style.cursor = 'wait';            // SET ESPERA Cursor mouse en espera
                //Otra opción sería: agregar una imagen de espera
                //  en el div (o elemento) donde serán cargado los datos
                //  y así liberar el puntero del mouse
            }
            if (xhr.readyState==4 && xhr.status==200) {                                                
                document.body.style.cursor = 'default';        // RESET ESPERA Cursor mouse en normal
                textHTML = xhr.responseText;                   // recupera la respuesta
                console.log(xhr.responseText);             
            }
        }
        if (idPres!=NULL){
            xhr.send("id=" + toString(idPres));
        } else{
            xhr.send(null);
        }
    }
    else{
        console.log('No se pudo instanciar el objeto AJAX!');
    }    
}

function loadContTextAjaxForm(url,idForm,method="POST"){
    // Envio de datos desde formulario
    // Apartir de los datos que se encuentran en el formulario 'idForm'
    // se obtiene los datos de la 'url' pasandole las claves valor de los input por post o get
    //https://developer.mozilla.org/en-US/docs/Learn/Forms/Sending_forms_through_JavaScript
    //CARGAR los datos del formulario
    var formData =getDataForm(idForm);
    
    //// formData manual
    //formData.append('nombre', 'mariano'); // simula ser el name y el valor del input
    //formData.append('apellido', 'diego'); // simula ser el name y el valor del input 
    var xhr = conectAjax();   
    if(xhr) {
        xhr.open(method, url, true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                alert("¡Carga existosa, preset creado!");
                location.reload();
            }
        }
        xhr.send(formData);
    }
    else{
        console.log('No se pudo instanciar el objeto AJAX!');
    }    
}


// ============================================================
// FUNCIONES AUXILIARES
// ============================================================

// ============================================================
// ==== Funciones Auxiliares que no son ajax pero las utilizamos
// ==== para cumplir los objetivos
// ============================================================

function getDataForm(idForm){
    // obtiene los name y los value de los elementos de un formulario.
    // y retorna un objeto FormData()
    var formData = new FormData();

    //alert("XXX");
    data=document.forms[idForm].getElementsByTagName("input");
    for (let i=0; i<data.length;i++) {
        if (data[i].name!=undefined && data[i].value!=undefined)
            if (data[i].type=='text' || data[i].type=='password'){
                formData.append(data[i].name, data[i].value);
            }
            else if ((data[i].type=='checkbox' || data[i].type=='radio') && data[i].checked){
                formData.append(data[i].name, data[i].value);
            }
            else if (data[i].type=='file'){

                formData.append(data[i].name, data[i].files[0]);
            }
    }
    data=document.forms[idForm].getElementsByTagName("select");
    for (let i=0; i<data.length;i++) {
        if(data[i]!=undefined && data[i].type=='select-one' ){                
            nombre=data[i].name;
            valor=data[i].options[data[i].selectedIndex].value;
            formData.append(nombre, valor);
        }
        if(data[i]!=undefined && data[i].type=='select-multiple'){                
            nombre=data[i].name;
            for(let j=0;j<data[i].selectedOptions.length;j++){
                formData.append(nombre, data[i].selectedOptions[j].value);
            }
        }
    }
return formData;
}