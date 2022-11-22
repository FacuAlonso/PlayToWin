<?php 
require_once '../../database.php'; 

function main(){

    $idJugador = $_REQUEST['id'];
    $idEvento = $_REQUEST['idEvento'];

    $sql = "UPDATE `participaciones` SET `descalificado` = '1' WHERE `participaciones`.`id` = $idJugador";
    $conn  = conectarBD();
    if (mysqli_query($conn, $sql)) {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/adminPanel/publish.php?id=$idEvento");
      } else {
        echo "Error: " . $sql . mysqli_error($conn);
      }
    desconectarBD($conn); 
}

main();
?>