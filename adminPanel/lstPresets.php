<?php 
require_once '../database.php'; 
function genlstPresetsEdit($idSelect){
    $lista="";
    $presets=listaPresets();
    foreach($presets as $preset):
        $nomJuego = $preset['nomJuego'];
        $idPres = $preset['id'];
        if($idPres == $idSelect){
            $select = "selected";
        }
        else{
            $select = "";
        }
        $lista.= "<option value='$idPres' $select>$nomJuego</option>";
    endforeach;
    return($lista);
}

function genlstPresets(){
    $lista="";
    $presets=listaPresets();
    foreach($presets as $preset):
        $nomJuego = $preset['nomJuego'];
        $idPres = $preset['id'];
        $lista.= "<option value='$idPres'>$nomJuego</option>";
    endforeach;
    return($lista);
}
?>