<?php 
	require_once 'libs/obtieneTiempo.php';

	//saber que ciudad debo buscar en concreto, si la del usuario (si esta registrado o si ha seleccionado alguna, registrado o no) 
	$miBusqueda = (isset($_POST["buscaCiudad"])) ? $_POST["buscaCiudad"] : $_SESSION["usuario"]->ciudad;

	// Si la ciudad es correcta, despues de obtener el tiempo actual obtiene el de los 7 días de la semana (contando hoy)
	$ciudadAhora = tiempoactual($miBusqueda);
	if (!empty($ciudadAhora)) {
		$ciudadDias = tiempodias($miBusqueda);
	} else {
		$error = true;
	}

	//Si hay alguna ciudad de las marcadas, buscamos la prevision actual
	if (!isset($eliminaCiu)) {
		$ciudad1 = $_SESSION['usuario']->ciudad1;
		if (isset($ciudad1)) {
			$ciu1 =  tiempoactual($ciudad1);
		}
		$ciudad2 = $_SESSION['usuario']->ciudad2;
		if (isset($ciudad2)) {
			$ciu2 =  tiempoactual($ciudad2);
		}
		$ciudad3 = $_SESSION['usuario']->ciudad3;
		if (isset($ciudad3)) {
			$ciu3 =  tiempoactual($ciudad3);
		}
	}

	//resta de dias para el viaje
	if (isset($_SESSION['viaje'])) {
		$inicio = new DateTime($_SESSION['viaje']['fecha_ini']);
		$actual = new DateTime(date("Y-m-d"));
		$intervalo = $inicio->diff($actual);
		if ($intervalo->format('%R%a') < 0) {
			$restaDias = $intervalo->format('%a');
		}
 	}

 	//Comprobar los siguientes 5 eventos para la ciudad prcincipal
 	if (isset($miBusqueda)) {
 		require_once "clases/Conexion.php" ;
		$db= Conexion::getInstancia() ;
		$query7= "SELECT * FROM evento WHERE lugar = :ciudad ORDER BY fecha_inicio LIMIT 5 " ;
		$sql7 = $db->prepare($query7);
		$sql7->bindParam(':ciudad', $miBusqueda, PDO::PARAM_STR);
    	$sql7->execute();
    	$result7 = $sql7->fetchAll(PDO::FETCH_ASSOC);

    	if ($sql7->rowCount()) {
    			$eventos = $result7;
    		}
 	}
 	
	 //indicamos el español para el día de la semana
 	setlocale(LC_ALL,"es_ES");
?>
