<?php
include('database.php');
function iniciarSesion($usuario,$tipo){  
  if ($tipo!= 1){  
    $_SESSION['usuario']  = $usuario;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['instante']   = time();
    header("Location: home.php");
  }
  else{
    $_SESSION['usuario']  = $usuario;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['instante']   = time();
    header("Location: dashboard.html");
  }  
    
}
function loguear (){
    $usuario=$_REQUEST['usuario'];
    $resultado= Validarpass($usuario);
    if ($resultado!=NULL){  //      consultar a partir de los datos obtenidos del formulario $_REQUEST['usuario']
      $pass=$resultado['pass'];                 // obtengo de la BD el pass correspondiente 
      $tipo=$resultado['isAdmin'];                // obtengo de la BD el tipo de usuario   
      if ( $_REQUEST['pass']==$pass){                
          iniciarSesion($_REQUEST['usuario'],$tipo);
      }     
    }
    else{
      ?>
      <?php
      include("login.php");

      echo('<h1 class="bad">ERROR DE AUTENTIFICACION</h1>');
    }
}
function main(){
    session_start();
    if(False/**isset($_SESSION['usuario'])*/){
        header("Location: principal.php");
    }
    
    else{
        if (isset($_REQUEST['usuario'])&& isset($_REQUEST['pass']) ) {            
            loguear ();   
            #header("Location: home.php");  Ejecuta sin hacer validacion
        }
    }     
}
main();

/*
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
*/
?>