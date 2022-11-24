<?php 
require_once '../../auxPHP/database.php'; 

function main(){

    $id = $_POST['id'];
    $eventos = listaEventos();
    foreach($eventos as $evento){
      if($evento["preset"]==$id){
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/adminPanel/presets.php?err=fk");
        die;
      }
    }
      $sql = "DELETE FROM presets WHERE id='".$id."'";
      $conn  = conectarBD();
      if (mysqli_query($conn, $sql)) {
          header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/adminPanel/presets.php");
        } else {
          echo "Error: " . $sql . mysqli_error($conn);
        }
      desconectarBD($conn);
}

main();
?>