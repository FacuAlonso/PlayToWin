<?php 
include 'database.php'; 
$eventosActivos = listaEventos();
foreach($eventosActivos as $evento): 
                
    $infoPreset = buscaPreset($evento["preset"]);
    
    <div class="tarjeta-evento" id="ev_01" onclick="window.location.href = '<?php echo 'InfoEvent.php?id='.$evento["id"];?>';">
        <div class="info-tarjeta">
            <p class="nombre-evento"><?php echo $evento["nomEvento"];?></p>
            <p class="label-juego"><?php echo $infoPreset[0]["nomJuego"];?></p>
            <p class="participa-boton">Participa</p>
        </div>
        <div class="back-portada"><img class="portada-evento" src=<?php echo $infoPreset[0]["portada"];?>></div>
    </div>
endforeach;
?php>