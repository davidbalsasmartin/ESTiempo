<?php
require_once "../clases/Sesion.php";
$ss = Sesion::iniciarSesion() ;

if ($ss->checkActiveSession()) {
	//comprobar que se ha pulsado el boton de añadir, si es asi filtrar formulario
	if (isset($_POST['moduser'])) {
  		require_once '../modelo/modifica_usuario_modelo.php';
 	}

 	//indicarle al header que no siga mostrando el link a esta pagina
 	//anadir que con $anade_even redireccione en la vista a otroa lado si no lo tiene 
	$modifica_user = 1;
	require_once '../libs/header.php';
 	require_once '../vista/modifica_user.php';
 	include_once '../libs/footer.php';
 } else {
 	header("Location: error") ;
 	//header('Location: error');
 }
?>