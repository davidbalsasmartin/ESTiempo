<?php 
require_once "../clases/Sesion.php";
$ss = Sesion::iniciarSesion() ;

if ($ss->checkActiveSession()) {
  header("Location: ../index") ;
} else {
  $comprobar = true;
  $loguea = true;
  //si no está logueado pero ha pulsado el boton de logueo, filtrar los datos y loguear
  if (isset($_POST['loguear'])) {
    require_once '../modelo/login_modela.php'; //modelo
  }
  include_once '../libs/headerno.php'; //header
  include_once '../vista/login_vista.php'; //vista
  include_once '../libs/footer.php'; //footer
}
?>