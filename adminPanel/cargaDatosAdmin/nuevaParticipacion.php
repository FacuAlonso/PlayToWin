<?php 
require_once '../../database.php'; 

function main(){
    $idEvento  = $_REQUEST['idEvento'];
    $idUsuario = $_REQUEST['idUsuario'];
    $nick = $_REQUEST['nick'];
    $puntaje = $_REQUEST['puntaje'];

    var_dump($idEvento);
    var_dump($idUsuario);
    var_dump($nick);
    var_dump($puntaje);
    
    $sql = "INSERT INTO `participaciones` (`id`, `evento`, `usuario`, `nickJugador`, `puntaje`, `fechaParticipa`)
    VALUES (NULL, '$idEvento', '$idUsuario', '$nick', '$puntaje', current_timestamp())";

    $conn  = conectarBD();

    if (mysqli_query($conn, $sql)) {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/InfoEvent.php?id=".$idEvento);
      } else {
        echo "Error: " . $sql . mysqli_error($conn);
      }
    desconectarBD($conn); 
}

main();
?>