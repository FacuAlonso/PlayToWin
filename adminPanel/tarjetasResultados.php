<?php 
require_once '../database.php'; 

function genTarjetasResultados($id){
    $lstJugadores = listaJugadores($id); // Lo busca en database.php 
    $tarjetas="";

    foreach($lstJugadores as $participante): 
        $nombre = $participante['nickJugador'];
        $mail = getUsrMail($participante['usuario']);
        $puntaje = $participante['puntaje'];
        $idParticipacion = $participante['id']; // Es el ID de la participación; no del usuario. 
        
        $tarjeta = <<<TARJETA
        <div class="tarjeta-participante">
            <p class="datos-titulo">$nombre ($mail)</p>
            <p class="puntaje">$puntaje puntos<p>
            <form method="post" action="cargaDatosAdmin/descalificar.php">
                <input type="text" class="no-mostrar" name="id" value="$idParticipacion">
                <input type="text" class="no-mostrar" name="idEvento" value="$id">
                <input type="submit" name="boton" class="boton-eliminar" value="DESCALIFICAR JUGADOR"/>
            </form>
        </div>
        TARJETA;
        $tarjetas.=$tarjeta;
    endforeach;
    return($tarjetas);
}
?>

