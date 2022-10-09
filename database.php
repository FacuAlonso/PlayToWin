<?php
    // Datos de conexion
    define('DB_HOST','localhost');
    define('DB_USER','p2wadmin');
    define('DB_PASS','X!/N22nJ6sDVL[U)');
    define('DB_NAME','playtowin');

    // Generar la conexion
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Revisar conexion
    if($conn->connect_error){
        die('Error al conectar la BD: ' . $conn->connect_error);
    }
?>