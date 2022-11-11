<?php
require_once 'config.php';
define("DBCONF", configDB());
//http://php.net/manual/es/mysqli-result.fetch-array.php
//https://cybmeta.com/isset-is_null-y-empty-diferencias-y-ejemplos-de-uso

function conectarBD(){
    // Crear conexión
    $conn = new mysqli(DBCONF['servername'], DBCONF['username'],
                       DBCONF['password'] , DBCONF['dbname']);
    
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

function consultarBD($sql){
	##############################################
	#### C O N S U L T A
	$preresult=NULL;
    $result=NULL;
	if ($sql!=""){
		$conn  = conectarBD();               # conectar a base de datos
		$preresult = mysqli_query($conn, $sql);  # enviar la consulta a BD y recibir el resultado
        $result = mysqli_fetch_all($preresult, MYSQLI_ASSOC);
		desconectarBD($conn);                # desconectar la base de datos
	}	
	# var_dump($dataTable);
	# die();
	return  $result;
}

// Generar un array que contenga todos los eventos activos
function listaEventos(){
    $res=NULL;
    $sql = "SELECT * FROM eventos WHERE estado = 'activo' ORDER BY fechaFinal";
    $res=consultarBD($sql);
    return $res;
}

// Generar un array que contenga todos los datos del evento de ID igual al QueryString del URL
function buscaEvento($id){
    $infoEvento=NULL;
    if ($id!=""){
        $sql = "SELECT * FROM eventos WHERE id = '".$id."'";
        $infoEvento=consultarBD($sql);
    }
    return $infoEvento;
}

// Busca la información del preset del evento correspondiente
function buscaPreset($idPres){
    $infoPreset=NULL;
    if ($idPres!=""){
        $sql = "SELECT * FROM presets WHERE id = '".$idPres."'";
        $infoPreset=consultarBD($sql);
    }
    return $infoPreset;
}

// Retornar lista de participantes del evento 

function listaJugadores($id){
    $res=NULL;
    if ($id!=""){
        $sql = "SELECT * FROM participaciones WHERE evento = '".$id."' ORDER BY puntaje DESC";
        $res=consultarBD($sql);
    }
    return $res;
}
function Validarpass($usuario){
	##############################################
    $preresult=NULL;
    $result=NULL;
	if ($usuario!=""){
		$conn  = conectarBD();
        $sql="SELECT*FROM usuarios where email='$usuario'";               # conectar a base de datos
		$preresult = mysqli_query($conn, $sql);  # enviar la consulta a BD y recibir el resultado
        $result = mysqli_fetch_array($preresult);
		desconectarBD($conn);                # desconectar la base de datos
	}	
	# var_dump($dataTable);
	# die();
	return  $result;
}
function Crearcuenta($usuario, $pass){
$conn=conectarBD();
$sql = "INSERT INTO usuarios (email,pass) VALUES ('$usuario', $pass)";
if (mysqli_query($conn,$sql)) {
    echo '<script language="javascript">alert("Se ha creado correctamente");</script>';
}
else {
  echo '<script language="javascript">alert(""Error: " . $sql . "<br>" . $conn->error;");</script>';
}
desconectarBD($conn); 
}
?>