<?php 
require_once '../../auxPHP/database.php'; 

function agregarPreset($nombre,$rutaFoto){
    
    $sql = "INSERT INTO `presets` (`id`, `nomJuego`, `portada`) VALUES (NULL, '$nombre', '$rutaFoto')";

    $conn  = conectarBD();

    if (mysqli_query($conn, $sql)) {
        echo "✅ Carga de preset exitosa. ✅";
      } else {
        echo "Error: " . $sql . mysqli_error($conn);
      }
    desconectarBD($conn); 
}
?>