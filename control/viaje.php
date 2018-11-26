<?php
require_once "../clases/Sesion.php";
$ss = Sesion::iniciarSesion() ;

if ($ss->checkActiveSession()) {

  	require_once '../modelo/viaje_modelo.php'; //modelo
 	//indicarle al header que no siga mostrando el link a esta pagina
	$mod_via = 1;
	require_once '../libs/header.php'; //header
 	require_once '../vista/mod_via.php'; //vista
 	include_once '../libs/footer.php'; //footer

 } else {
 	//Si no está registrado, redirección a error
 	header("Location: error") ;
 }
?>