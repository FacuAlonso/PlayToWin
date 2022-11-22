<?php
function main(){
  session_start();
    
  unset($_SESSION['usuario']); 
  unset($_SESSION['tipo']);
  unset($_SESSION['instante']);

  // Elimina la sesion
  session_destroy();
   
  // Redirecciona a la landing page
  header("HTTP/1.1 302 Moved Temporarily"); 
  header("Location: index.html");
}
main();
  
?>