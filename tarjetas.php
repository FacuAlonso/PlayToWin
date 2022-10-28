<?php 
include 'database.php'; 
$eventosActivos = listaEventos(); // Lo busca en database.php 
foreach($eventosActivos as $evento): 
                
    $infoPreset = buscaPreset($evento["preset"]);
    $nomJuego = $infoPreset[0]["nomJuego"]; // Es el nombre del preset del evento
    $portada = $infoPreset[0]["portada"];
    $idEvento = strval($evento["id"]); // Convierte al ID numérico en string
    $nomEvento = $evento["nomEvento"];
    
    $tarjetas = <<<TARJETAS
    <div class="tarjeta-evento" id="ev_01" onclick="window.location.href = 'InfoEvent.php?id=$idEvento';">
        <div class="info-tarjeta">
            <p class="nombre-evento">$nomEvento</p>
            <p class="label-juego">$nomJuego</p>
            <p class="participa-boton">Participa</p>
        </div>
        <div class="back-portada"><img class="portada-evento" src=$portada></div>
    </div>
    TARJETAS;
endforeach;
?>