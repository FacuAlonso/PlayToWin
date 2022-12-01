<?php 
require_once '../../auxPHP/database.php'; 
require_once 'upload.php';

function editarPreset($nombre,$rutaFoto,$id){
    
    $sql = "UPDATE `presets` SET `nomJuego` = '$nombre', `portada` = '$rutaFoto' WHERE `presets`.`id` = $id";
    $conn  = conectarBD();
    mysqli_query($conn, $sql);
    desconectarBD($conn); 
}

function recibirDatos(){
	//Recibe los datos por 'post' o por 'get'

	if (isset($_REQUEST['nombre'])){
		$nombre=$_REQUEST['nombre'];
	}

    if (isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
	}

    if (isset($_REQUEST['fileToUpload'])){ //Si no se carga ninguna imagen nueva, entonces busca la ruta ya existente en la DB
        $rutaFoto = buscaPreset($id)[0]["portada"];
    } 
    else{
        // * * * * A R C H I V O * * * * * *
        // 'fileToUpload' es el name del input html tipo file (cuando se envía por fecth)
        // 'fileToUpload' es el name del input html tipo submit 'del boton' (cuando se envía por form)
        if(isset($_REQUEST['fileToUpload']) || isset($_FILES['fileToUpload'])){
            if (isset($_FILES['fileToUpload'])){
                $res = recibirArchivo();
                if ($res!=null ){
                    if ($res['uploadOk']){// SI SE LOGRÓ SUBIR CON EXITO
                        $rutaFoto="portadas/";
                        $rutaFoto.=$res['filename'];
                    }
                }	
            }
        }
    }
    editarPreset($nombre,$rutaFoto,$id);	
    echo "✅ Edición de preset exitosa ✅";
}
recibirDatos();
?>