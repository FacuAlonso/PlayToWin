<?php 
require_once '../../database.php'; 

function main(){
    $nomEvento  = $_POST['nombre'];
    $preset = $_POST['preset'];
    $descEvento = $_POST['desc'];
    $reglasEvento = $_POST['reglas'];
    $fechaFinal = $_POST['fecha'];
    $id = $_POST['id'];
    
    $sql = "UPDATE eventos
    SET nomEvento = '$nomEvento', preset = '$preset', descEvento = '$descEvento', reglasEvento = '$reglasEvento', fechaFinal = '$fechaFinal'
    WHERE id = $id";

    $conn  = conectarBD();

    if (mysqli_query($conn, $sql)) {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/adminPanel/dashboard.php");
      } else {
        echo "Error: " . $sql . mysqli_error($conn);
      }
    desconectarBD($conn); 
}

main();
?>