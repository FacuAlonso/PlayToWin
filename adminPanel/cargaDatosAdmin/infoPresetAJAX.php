<?php 
require_once '../../database.php'; 

function main(){
    $id = $_POST['id'];
    $infoDBPreset = buscaPreset($id);
    echo($infoDBPreset);
}

main();
?>