<?php 
require_once "../clases/Sesion.php";
require_once "../clases/Conexion.php";

$ss = Sesion::iniciarSesion() ;
//Seleccionar todas las ciudades para el select y para filtrar el registro
  $db = Conexion::getInstancia() ;
  $query= "SELECT ciudad FROM ciudad" ;
  $sql = $db->prepare($query);
  $sql->execute();
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);

if (!$ss->checkActiveSession()) {

  //Si se ha pulsado el boton para registrar
  if (isset($_POST['registra'])) {
    require_once '../modelo/reg_control.php'; //modelo
  }

  include_once '../libs/headerno.php'; //header
  include_once '../vista/registro_vista.php'; //vista
  include_once '../libs/footer.php'; //footer

} else {
  header("Location: ../index") ;
}

?>