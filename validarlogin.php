<?php
include('database.php');
$usuario=$_POST['nombre'];
$contraseña=$_POST['apellido'];

$sql="SELECT*FROM usuarios where email='$usuario' and pass='$contraseña'";
$resultado=Validarpass($sql);

if($resultado){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("login.php");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}