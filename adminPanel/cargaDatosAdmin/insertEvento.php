<?php 
require_once '../../auxPHP/database.php'; 

function main(){
    $nomEvento  = $_POST['nombre'];
    $preset = $_POST['preset'];
    $descEvento = $_POST['desc'];
    $reglasEvento = $_POST['reglas'];
    $fechaFinal = $_POST['fecha'];
    
    $sql = "INSERT INTO `eventos` (`id`, `nomEvento`, `preset`, `descEvento`, `reglasEvento`, `fechaFinal`) 
    VALUES (NULL, '$nomEvento', '$preset', '$descEvento', '$reglasEvento', '$fechaFinal')";

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