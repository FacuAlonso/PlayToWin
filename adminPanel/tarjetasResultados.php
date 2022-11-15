<?php 
require_once '../database.php'; 

function genTarjetasResultados($id){
    $lstJugadores = listaJugadores($_GET['id']); // Lo busca en database.php 
    $tarjetas="";

    foreach($lstJugadores as $jugador): 
        $nombre = $jugador['nickJugador'];
        $mail = getUsrMail($jugador['usuario']);
        $puntaje = $jugador['puntaje'];
        
        $tarjeta = <<<TARJETA
        <label for="nom01" class="datos-titulo">jugador@email.com</label>
            <label for="nom01" class="puntaje">43 puntos</label>
            <select name="select" class="selecPuntaje">
                <option value="nowin" selected disabled>Seleccionar posición</option>
                <option value="1">1er lugar</option>
                <option value="2">2do lugar</option>
                <option value="3">3er lugar</option>
            </select>
        TARJETA;
        $tarjetas.=$tarjeta;
    endforeach;
    return($tarjetas);
}
?>