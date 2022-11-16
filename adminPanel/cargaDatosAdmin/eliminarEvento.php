<?php 
require_once '../../database.php'; 

function main(){
    $id = $_POST['id'];

    $sql = "DELETE FROM eventos WHERE id='".$id."'";
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