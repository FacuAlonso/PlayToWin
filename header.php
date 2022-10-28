<?php
function genHeader($titulo){
    $header = <<<HEAD
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="home.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets\JoystickFAVICON64.png">
        <title>$titulo</title>
    </head>
    HEAD;
    echo($header);
}
?>