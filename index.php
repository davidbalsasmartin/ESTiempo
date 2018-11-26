<?php
require_once "clases/Sesion.php";
$ss = Sesion::iniciarSesion() ;
//configurar header
$index = true;

if ($ss->checkActiveSession()) {
	//indicar que la sesion esta activa para no llamar constantemente
	$activ = true;
	//comprobar que header mostrar
	$header = 'libs/header.php';
} else {
	$header = 'libs/headerno.php';
}
//comprobar que busque una ciudad
if (isset($_POST["buscaCiudad"])) {
	$buscaCiudad = $_POST["buscaCiudad"];
	//eliminar ciudades pred
	$eliminaCiu = "1";
	include_once $header;
	require_once 'modelo/index_modelo.php'; //modelo
	if (isset($error)) {
		header('Location: error');
	} else {
		require_once 'vista/index_vista.php';//vista
	}
//comprobar que no esté registrado o que quiera buscar alguna ciudad 
} else if (!isset($activ) || (isset($_POST["buscar"]))) {
	include_once $header;
	require_once 'vista/mapa.html'; //vista
// si no es asi, significa que hay que mandar al index de usuario registrado
} else {
	$buscaCiudad = $_SESSION["usuario"]->ciudad;
	include_once 'libs/header.php';
	require_once 'modelo/index_modelo.php'; //modelo
	require_once 'vista/index_vista.php';//vista
}
include_once 'libs/footer.php';//footer
?>