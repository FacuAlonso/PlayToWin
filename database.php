<?php
require_once 'config.php';
//http://php.net/manual/es/mysqli-result.fetch-array.php
//https://cybmeta.com/isset-is_null-y-empty-diferencias-y-ejemplos-de-uso

function conectarBD($conf) {
    //string de conexion
    if(!isset($conf))
        $conf = configDB();
    
    // Crear conexión
    $conn = new mysqli($conf['servername'], $conf['username'],
                       $conf['password'] , $conf['dbname']);
    
    // Checkear conexión
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    } 
    //echo "Conexion EXISTOSA";
    return $conn;
}

function desconectarBD($conn) {
    // cerrar conexión
    $conn->close();
}


?>
