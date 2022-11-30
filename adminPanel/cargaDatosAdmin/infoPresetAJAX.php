<?php 
require_once '../../auxPHP/database.php'; 

function main(){
    $id = $_GET['id'];
    $infoDBPreset = buscaPreset($id);
    $nombre = $infoDBPreset[0]['nomJuego'];
    $portada = $infoDBPreset[0]['portada'];

    $res = <<<FORM
    <div class="popup">
        <h1 id="titulo-popup">Editar un preset:</h1>

        <form id="presets-form-edit" action="" method="">
            <div class="contenedor-input" name="001" id="nom02">
                <label for="nom01" class="dato-input">Nombre del juego:</label>
                <input type="text" class="caja-input"  name="nombre" value="$nombre">
                <label for="datos01" class="dato-input">Imagen (Hasta 5 MB)</label>
                <img class="portada-evento" src="../$portada">
                <input type="file" class="caja-input" name="fileToUpload" id="fileToUpload" value="$portada">
                <input type="text" class="no-mostrar" value="$id" name="id">
            </div>
            <input type="button" class="boton-popup" value="Enviar" onclick="loadContTextAjaxForm('../adminPanel/cargaDatosAdmin/editPresetAJAX.php','presets-form-edit')">
        </form>
        <button class="boton-popup" id="cerrar" onclick="cerrarForm('popup-caja-editar','presets-form')">Cerrar</button>
    </div>
    FORM;
    
    echo $res;
}

main();
?>