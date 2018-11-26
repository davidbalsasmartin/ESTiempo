<?php
	require_once "../clases/Sesion.php";
	$ss = Sesion::iniciarSesion();
	$ss->close();
	header('Location: ../index');

?>