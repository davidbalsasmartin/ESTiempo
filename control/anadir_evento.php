<?php

require_once "../clases/Sesion.php";
$ss = Sesion::iniciarSesion();

if ($ss->checkActiveSession()) {
	//comprobar que se ha pulsado el boton de añadir, si es asi filtrar formulario
	if (isset($_POST['aniade'])) {
  		require_once '../modelo/anade_even_modelo.php';
 	}

 	//indicarle al header que no siga mostrando el link a esta pagina
	$anade_even = 1;
	require_once '../libs/header.php';
 	require_once '../vista/anade_even.php';
 	include_once '../libs/footer.php';
 } else {
 	//Si no está logueado, error
 	header("Location: error") ;
 }

?>