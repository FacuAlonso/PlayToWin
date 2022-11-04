<?php
include('database.php');
function Validacion($usuario,$contraseña){
  $resultado=Validarpass($usuario,$contraseña);

  if($resultado!=NUll){
    
      header("location:home.php");

  }else{
      ?>
      <?php
      include("login.php");

    echo('<h1 class="bad">ERROR DE AUTENTIFICACION</h1>');
  }
}
function main(){
  $usuario=$_POST['nombre'];
  $contraseña=$_POST['apellido'];
  Validacion($usuario,$contraseña);
}
main();