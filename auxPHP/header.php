<?php
function genHeader($titulo,$cssFile,$JSScript){ //copia la informacion previa al html/java que siempre se pone dependiendo si es java(agrega una linea) o html
    if(isset($JSScript)){
        $script = '<script language="javascript" type="text/javascript" src="'.$JSScript.'"></script>';
    }
    else{
        $script = '';
    }

    $header = <<<HEAD
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href=$cssFile rel="stylesheet">
        $script
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets\JoystickFAVICON64.png">
        <title>$titulo</title>
    </head>
    HEAD;
    echo($header);
}

function genHeaderAdmin($titulo,$cssFile,$JSScript){ // Sólo cambia el nivel de directorio para el ícono (la imagen ../)
    if(isset($JSScript)){
        $script = '<script language="javascript" type="text/javascript" src="'.$JSScript.'"></script>';
    }
    else{
        $script = '';
    }

    $header = <<<HEAD
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href=$cssFile rel="stylesheet">
        $script
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../assets/JoystickFAVICON64.png">
        <title>$titulo</title>
    </head>
    HEAD;
    echo($header);
}
?>