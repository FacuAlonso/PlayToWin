<?php 
require_once '../../database.php'; 

function agregarPreset($nombre,$rutaFoto){
    
    $sql = "INSERT INTO `presets` (`id`, `nomJuego`, `portada`) VALUES (NULL, '$nombre', '$rutaFoto')";

    $conn  = conectarBD();

    if (mysqli_query($conn, $sql)) {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/adminPanel/presets.php");
      } else {
        echo "Error: " . $sql . mysqli_error($conn);
      }
    desconectarBD($conn); 
}
?>