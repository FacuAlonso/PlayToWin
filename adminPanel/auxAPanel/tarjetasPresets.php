<?php 
require_once '../auxPHP/database.php'; 

function genTarjetasPresets(){
    $tarjetas="";
    $presets = listaPresets(); // Lo busca en database.php 
    foreach($presets as $preset): 
        $nombre = $preset['nomJuego'];
        $portada = $preset['portada'];
        $idPreset = $preset['id'];
        
        $tarjeta = <<<TARJETA
        <div class="box-evento">
                <div class="box-evento-a">
                    <img class="portada-evento" src="../$portada">
                </div>
                <div class="box-evento-b">
                    <div class="box-evento-b-1">
                        <p class="titulo-evento">$nombre</p>
                    </div>
                    <div class="box-evento-b-2">
                        <div class="box-evento-b-2-1">
                        </div>
                    </div>
                </div>
                <div class="box-evento-c">
                    <div class="box-evento-c-1">
                        <div class="box-evento-c-1-1">
                            <button class="boton-editar" onclick="CargaPresetAJAX($idPreset,'popup-caja-editar')">EDITAR PRESET</button>  
                        </div>
                        <div class="box-evento-c-1-2">
                            <form method="post" action="cargaDatosAdmin/eliminarPreset.php">
                                <input type="text" class="no-mostrar" value="$idPreset" name="id">
                                <input type="submit" name="boton" class="boton-eliminar" value="ELIMINAR"/>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        TARJETA;
        $tarjetas.=$tarjeta;
    endforeach;
    return($tarjetas);
}
?>