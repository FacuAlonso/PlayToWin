<?php 
require_once 'database.php'; 
function genTarjetas($estado){
    $tarjetas="";
    $eventosActivos = listaEventosActivos(); // Lo busca en database.php 
    $eventosFin = listaEventosFin(); // Lo busca en database.php 
        if ($estado=="ACTIVOS" && $eventosActivos){ // Revisa, además, si existen eventos activos
            foreach($eventosActivos as $evento): 
                $infoPreset = buscaPreset($evento["preset"]); //dentro del evento busca el preset al que pertenece
                $nomJuego = $infoPreset[0]["nomJuego"]; // Es el nombre del preset del evento
                $portada = $infoPreset[0]["portada"];
                $idEvento = $evento["id"]; 
                $nomEvento = $evento["nomEvento"];
                
                $tarjeta = <<<TARJETA
                <div class="tarjeta-evento" id="ev_01" onclick="window.location.href = 'InfoEvent.php?id=$idEvento';">
                    <div class="info-tarjeta">
                        <p class="nombre-evento">$nomEvento</p>
                        <p class="label-juego">$nomJuego</p>
                        <p class="participa-boton">Participa</p>
                    </div>
                    <div class="back-portada"><img class="portada-evento" src="$portada"></div>
                </div>
                TARJETA;
                $tarjetas.=$tarjeta;
            endforeach;

        } elseif($estado=="FINALIZADOS" && $eventosFin){ // Revisa, además, si existen eventos finalizados
            foreach($eventosFin as $evento): 
                $infoPreset = buscaPreset($evento["preset"]);
                $nomJuego = $infoPreset[0]["nomJuego"]; // Es el nombre del preset del evento
                $portada = $infoPreset[0]["portada"];
                $idEvento = $evento["id"]; 
                $nomEvento = $evento["nomEvento"];
                
                $tarjeta = <<<TARJETA
                <div class="tarjeta-evento" id="ev_01" onclick="window.location.href = '../results.php?id=$idEvento';">
                    <div class="info-tarjeta">
                        <p class="nombre-evento">$nomEvento</p>
                        <p class="label-juego">$nomJuego</p>
                        <p class="participa-boton">Ver resultados</p>
                    </div>
                    <div class="back-portada"><img class="portada-evento" src="$portada"></div>
                </div>
                TARJETA;
                $tarjetas.=$tarjeta;
            endforeach;
        }
        else{
            $tarjetas="<p class='nombre-evento'> No hay contenido disponible en este momento.</p>";
        }
    return($tarjetas);
} 
?>