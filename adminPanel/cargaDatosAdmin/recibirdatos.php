<?php
require_once('upload.php');
require_once('insertPreset.php');

function recibirDatos(){
	//Recibe los datos por 'post' o por 'get'
	$nombre="";
	$nombreArchivo="portadas/";

	if (isset($_REQUEST['nombre'])){
		$nombre=$_REQUEST['nombre'];
	}

	// * * * * A R C H I V O * * * * * *
	// 'fileToUpload' es el name del input html tipo file (cuando se envía por fecth)
	// 'fileToUpload' es el name del input html tipo submit 'del boton' (cuando se envía por form)
	if(isset($_REQUEST['fileToUpload']) || isset($_FILES['fileToUpload'])){
		if (isset($_FILES['fileToUpload'])){
			$res = recibirArchivo();
			if ($res!=null ){
				if ($res['uploadOk']){// SI SE LOGRÓ SUBIR CON EXITO
					$nombreArchivo.=$res['filename'];
                    agregarPreset($nombre,$nombreArchivo);
				}
			}	
		}
	}		
}

recibirDatos();

/*	
	PHP, a traves de un conjunto de variables globales, es capaz
	de recuperar el conjunto de datos de un formulario que han 
	sido enviados desde el navegador para, despues, poder trabajar 
	con ellos. Las tres variables principales para realizar esta 
	operacion son:

	_POST: Array que contiene las variables pasadas a traves del 
	       metodo POST. En versiones anteriores a la 4.2.0, se 
		   llamaba HTTP_POST_VARS.
	_GET: Array que contiene las variables pasadas a traves del 
	      metodo GET. En versiones anteriores a la 4.2.0. se 
		  llamaba HTTP_GET_VARS.
	_REQUEST: Array que contiene las variables pasadas a traves 
	          de cualquier mecanismo de entrada.
*/
?>