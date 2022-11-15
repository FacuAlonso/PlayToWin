<?php 
require_once '../database.php'; 

function genTarjetasPresets(){
    $tarjetas="";
    $presets = listaPresets(); // Lo busca en database.php 
    foreach($presets as $preset): 
        $nombre = $preset['nomJuego'];
        $portada = $preset['portada'];
        
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
                            <button class="boton-editar" onclick="abrir('popup-caja')">EDITAR PRESET</button>  
                        </div>
                        <div class="box-evento-c-1-2">
                            <button class="boton-eliminar" onclick="fun()">ELIMINAR PRESET</button> 
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