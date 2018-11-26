<?php
require_once "../clases/Conexion.php" ;
$db = Conexion::getInstancia() ;
//comprobamos que se quiera modificar un viaje
if (isset($_POST['mod_viaje'])) {
	//comprobamos que todos los datos sean correctos
	if (isset($_POST['ciudad']) && isset($_POST['fecha_ini']) && isset($_POST['fecha_fin']) && ($_POST['fecha_ini'] >= date("Y-m-d")) && ( $_POST['fecha_ini'] <= $_POST['fecha_fin'] ) && ($_POST['fecha_fin'] <= date("Y-m-d",strtotime("+ 365 days")))) {
		// Si la ciudad es correcta
		$busCiudad = in_array($_POST['ciudad'] , $_SESSION['ciudades']);
		if ($busCiudad) {
			// Si existe un viaje, actualizar
			if (isset($_SESSION['viaje'])) {
				$query= "UPDATE viaje set ciudad= :ciudad, fecha_ini = :fecha_ini, fecha_fin = :fecha_fin where usuario = :usuario" ;
			} else {
			// Si no existe, insertar			
				$query= "INSERT INTO viaje (ciudad, usuario, fecha_ini, fecha_fin) VALUES ( :ciudad, :usuario, :fecha_ini, :fecha_fin)" ;
			}
			$sql = $db->prepare($query);
			$usuario = $_SESSION['usuario']->usuario;
			$sql->bindParam(':usuario', $usuario , PDO::PARAM_STR);
			$sql->bindParam(':ciudad', $_POST['ciudad'], PDO::PARAM_STR);
			$sql->bindParam(':fecha_ini', $_POST['fecha_ini'], PDO::PARAM_STR);
			$sql->bindParam(':fecha_fin', $_POST['fecha_fin'], PDO::PARAM_STR);
   			$sql->execute();
   			$_SESSION['viaje'] = [ 'ciudad' => $_POST['ciudad'], 'fecha_ini' => $_POST['fecha_ini'], 'fecha_fin' => $_POST['fecha_fin'] ];
		} else {
			$error = "si";
		}
	} else {
		$error = "si";
	}
	//comprobamos que se quiera borrar una foto
} else if (isset($_POST['borrar'])) {
	$query= "DELETE FROM viaje WHERE usuario = :usuario" ;
	$sql = $db->prepare($query);
	$usuario = $_SESSION['usuario']->usuario;
	$sql->bindParam(':usuario', $usuario , PDO::PARAM_STR);
   	$sql->execute();
   	unset($_SESSION['viaje']);
}

?>



