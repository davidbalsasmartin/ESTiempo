<?php 

// Si no hay datos o no pueden validarse, error, si no redirecciona una vez logueado
if (empty($_POST['user']) || empty($_POST['pass']) || !$ss->login($_POST["user"], $_POST["pass"])) {
	$comprobar = false;
} else {
	header("Location: ../index");
}

?>