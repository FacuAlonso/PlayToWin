<?php 
require_once '../auxPHP/database.php'; 
function genTarjetasAdmin(){
    $tarjetas="";
    $eventosActivos = listaEventosActivos(); // Lo busca en database.php 
    foreach($eventosActivos as $evento): 
        $infoPreset = buscaPreset($evento["preset"]);
        $nomJuego = $infoPreset[0]["nomJuego"]; // Es el nombre del preset del evento
        $portada = $infoPreset[0]["portada"];
        $idEvento = strval($evento["id"]); // Convierte al ID numérico en string
        $nomEvento = $evento["nomEvento"];
        $estado = $evento["estado"];
        $lstJugadores = listaJugadores($evento['id']);
        $cantJugadores = count($lstJugadores);
        
        $tarjeta = <<<TARJETA
        <div class="box-evento">
            <div class="box-evento-a">
                <img class="portada-evento" src="../$portada">
            </div>
            <div class="box-evento-b">
                <div class="box-evento-b-1">
                    <p class="titulo-evento">$nomEvento</p>
                </div>
                <div class="box-evento-b-2">
                    <div class="box-evento-b-2-1">
                        <p class="juego-evento">$nomJuego</p>
                    </div>
                    <div class="box-evento-b-2-2">
                        <p class="jugadores-evento">$cantJugadores</p>
                        <img class="icono-jugadores" src="../assets/usuariosIcono.png">
                        <p class="estado-evento">Evento $estado</p>
                    </div>
                </div>
            </div>
            <div class="box-evento-c">
                <div class="box-evento-c-1">
                    <div class="box-evento-c-1-1">
                        <button class="boton-editar" onclick="window.location.href = 'edit.php?id=$idEvento';">EDITAR EVENTO</button>  
                    </div>
                    <div class="box-evento-c-1-2">
                        <form method="post" action="cargaDatosAdmin/eliminarEvento.php"
                        onSubmit="if(!confirm('¿Deseas eliminar este evento? Las participaciones asociadas se eliminarán. Esta acción es irreversible ⚠')){return false;}">
                            <input type="text" class="no-mostrar" value="$idEvento" name="id">
                            <input type="submit" name="boton" class="boton-eliminar" value="ELIMINAR EVENTO"/>
                        </form>
                    </div>
                </div>
                <div class="box-evento-c-2">
                    <button class="boton-publicarRes" onclick="window.location.href = 'revisar.php?id=$idEvento';">REVISAR RESULTADOS</button> 
                </div>
            </div>
        </div>
        TARJETA;
        $tarjetas.=$tarjeta;
    endforeach;
    return($tarjetas);
}

function genTarjetasAdminFin(){
    $tarjetas="";
    $eventosFin = listaEventosFin(); // Lo busca en database.php 
    foreach($eventosFin as $evento): 
        $infoPreset = buscaPreset($evento["preset"]);
        $nomJuego = $infoPreset[0]["nomJuego"]; // Es el nombre del preset del evento
        $portada = $infoPreset[0]["portada"];
        $idEvento = strval($evento["id"]); // Convierte al ID numérico en string
        $nomEvento = $evento["nomEvento"];
        $estado = $evento["estado"];
        $lstJugadores = listaJugadores($evento['id']);
        $cantJugadores = count($lstJugadores);
        
        $tarjeta = <<<TARJETA
        <div class="box-evento-fin">
            <div class="box-evento-a">
                <img class="portada-evento" src="../$portada">
            </div>
            <div class="box-evento-b">
                <div class="box-evento-b-1">
                    <p class="titulo-evento">$nomEvento</p>
                </div>
                <div class="box-evento-b-2">
                    <div class="box-evento-b-2-1">
                        <p class="juego-evento">$nomJuego</p>
                    </div>
                    <div class="box-evento-b-2-2">
                        <p class="jugadores-evento">$cantJugadores</p>
                        <img class="icono-jugadores" src="../assets/usuariosIcono.png">
                        <p class="estado-evento">Evento $estado</p>
                    </div>
                </div>
            </div>
            <div class="box-evento-c">
                <div class="box-evento-c-1">
                    
                    <div class="box-evento-c-1-2">
                        <form method="post" action="../cargaDatosAdmin/eliminarEvento.php">
                            <input type="text" class="no-mostrar" value="$idEvento" name="id">
                            <input type="submit" name="boton" class="boton-eliminar" value="ELIMINAR EVENTO"/>
                        </form>
                    </div>
                </div>
                <div class="box-evento-c-2">
                    <button class="boton-publicarRes" onclick="window.location.href = '../revisar.php?id=$idEvento';">REVISAR RESULTADOS</button> 
                </div>
            </div>
        </div>
        TARJETA;
        $tarjetas.=$tarjeta;
    endforeach;
    return($tarjetas);
}

?>