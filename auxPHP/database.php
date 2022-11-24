<?php
require_once 'config.php';
define("DBCONF", configDB());
//http://php.net/manual/es/mysqli-result.fetch-array.php
//https://cybmeta.com/isset-is_null-y-empty-diferencias-y-ejemplos-de-uso
date_default_timezone_set('America/Argentina/Buenos_Aires');

function conectarBD(){
    // Crear conexión
    $conn = new \MySQLi(DBCONF['servername'], DBCONF['username'],
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
function listaEventosActivos(){
    $res=NULL;
    $sql = "SELECT * FROM eventos WHERE estado = 'activo' ORDER BY fechaFinal";
    $res=consultarBD($sql);
    return $res;
}

// Generar un array que contenga todos los eventos finalizados
function listaEventosFin(){
    $res=NULL;
    $sql = "SELECT * FROM eventos WHERE estado = 'finalizado' ORDER BY fechaFinal";
    $res=consultarBD($sql);
    return $res;
}

// Generar un array que contenga todos los eventos, de todos los estados
function listaEventos(){
    $res=NULL;
    $sql = "SELECT * FROM eventos ORDER BY fechaFinal";
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

// Busca todos los presets
function listaPresets(){
    $lstPresets=NULL;
    $sql = "SELECT * FROM presets";
    $lstPresets=consultarBD($sql);
    return $lstPresets;
}

// Retornar lista de participantes del evento 

function listaJugadores($id){
    $res=NULL;
    if ($id!=""){
        $sql = "SELECT * FROM participaciones WHERE evento = '".$id."' AND `descalificado` = 0 ORDER BY puntaje DESC";
        $res=consultarBD($sql);
    }
    return $res;
}

// Busca el mail de un usuario, sabiendo su ID
function getUsrMail($id){
    $mail=NULL;
    $sql = "SELECT email FROM usuarios WHERE id = '".$id."'";
    $mail=consultarBD($sql)[0]['email'];
    return $mail;
}

// Busca el ID de un usuario, sabiendo su mail
function getUsrID($mail){
    $id=NULL;
    $sql = "SELECT id FROM `usuarios` WHERE `email` LIKE '".$mail."'";
    $id=consultarBD($sql)[0]['id'];
    return $id;
}

//Busca si un usuario participa en un evento específico (devuelve entrada completa)
function buscaParticipante($idEvento,$idUser){
    $res=NULL;
    $sql = "SELECT * FROM `participaciones` WHERE `evento` = $idEvento AND `usuario` = $idUser";
    $res=consultarBD($sql);
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
    $sql = "INSERT INTO `usuarios` (`id`, `email`, `pass`, `isAdmin`) VALUES (NULL, '$usuario', '$pass', '0')";
    if (mysqli_query($conn,$sql)) {
        echo '<script language="javascript">alert("Se ha creado correctamente");</script>';
    }
    else {
    echo '<script language="javascript">alert(""Error: " . $sql . "<br>" . $conn->error;");</script>';
    }
    desconectarBD($conn); 
}

function expirarEvento($id){
    $sql = "UPDATE `eventos` SET `estado` = 'finalizado' WHERE `eventos`.`id` = $id";
    $conn  = conectarBD();
    mysqli_query($conn, $sql);
    desconectarBD($conn); 
}


function validarFechaEventosActivos(){
    $fechaServer = time();
    foreach(listaEventosActivos() as $evento){
        $fechaEvento = strtotime($evento["fechaFinal"]);
        if($fechaServer>=$fechaEvento){
            expirarEvento($evento["id"]);
        }
    }
}

validarFechaEventosActivos(); //

?>

