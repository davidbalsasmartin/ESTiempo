<?php

//Mi código de app y de usuario para acceder a la api rest
const appId = "app_id=CvQc66dRvUvjp1TqOIRx";
const appCode = "app_code=mpsNlIV8r6FMxWylwMfOTQ";
const lengua = "&language=spanish";

//API TIEMPO ACTUALIDAD
function tiempoactual($ciu) {

	$ciudad = $ciu;
	//sustituir nombres de ciudades que no recoge la api 
	if ($ciu == "La Palma") {
		$ciu = 'aridane';
	} else if ($ciu == "La Coruña") {
		$ciu = 'Coruña';
	}
	//nombre de variables en minusculas, sin espacios y sin tildes ni ñ
	$ciu = str_replace(array(' ','á', 'é', 'í', 'ó', 'ú', 'ñ'), array('%20','a', 'e', 'i', 'o', 'u', 'n'), mb_strtolower($ciu,'UTF-8'));
	//Conversion a cadena de texto legible por la api
	$name = "name=".$ciu."%20spain";

	require_once "clases/Conexion.php" ;
	$db = Conexion::getInstancia() ;
	$query= "SELECT * FROM ciudad WHERE ciudad=:ciudad" ;
	$sql = $db->prepare($query);
	$sql->bindParam(':ciudad',$ciudad, PDO::PARAM_STR);
    $sql->execute();
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);
	//comprobar que existe la ciudad
	if($sql->rowCount()) {
		$fecha1 = new DateTime(date('Y-m-d H:i:s'));
		$fecha2 = new DateTime($result[0]['hora']);

		//comprobar que la query ha sido actualizada hace menos de x tiempo (3 horas y media y 10 segundos)
		//si es así, muestra la informacion recogida de la bd
		if (abs($fecha1->getTimestamp()-$fecha2->getTimestamp()) < 12610) {
			$arrayciu = array(
			  'temp' => $result[0]['temp'],
			  'icono' => $result[0]['icono'],
			  'viento' => $result[0]['viento'],
			  'pviento' => $result[0]['pviento'],
			  'hume' => $result[0]['hume'],
			  'precidesc' => $result[0]['precidesc'],
			  'ciudad' => $ciudad,
			  'link'=> $result[0]['link']);
	
		//si no es así, hace una llamada a la api, hace un update y despues muestra la informacion
		} else {
	
			$data = json_decode(file_get_contents('https://weather.api.here.com/weather/1.0/report.json?product=observation&'.implode("&", array($name, lengua, appId, appCode))), true);
	
			$arrayciu = array(
			  'temp' => $data{"observations"}{"location"}[0]{"observation"}[0]{"temperature"},
			  'icono' => $data{"observations"}{"location"}[0]{"observation"}[0]{"iconLink"},
			  'viento' => $data{"observations"}{"location"}[0]{"observation"}[0]{"windSpeed"},
			  'pviento' => $data{"observations"}{"location"}[0]{"observation"}[0]{"windDescShort"},
			  'hume' => $data{"observations"}{"location"}[0]{"observation"}[0]{"humidity"},
			  'precidesc' => $data{"observations"}{"location"}[0]{"observation"}[0]{"precipitationDesc"},
			  'hora' => str_replace(array("T", ".000+01:00"), array(" ",""), $data{"observations"}{"location"}[0]{"observation"}[0]{"utcTime"}),
			  'ciudad' => $ciudad,
			  'link'=> $result[0]['link']);
			
			$query2 = "UPDATE ciudad SET temp=:temp, icono=:icono, viento=:viento, pviento=:pviento, hume=:hume, precidesc=:precidesc, hora=:hora where ciudad =:ciudad " ;
			$sql2 = $db->prepare($query2);
	
	  		$sql2->bindParam(':temp',$arrayciu{"temp"}, PDO::PARAM_STR);
	  		$sql2->bindParam(':icono',$arrayciu{"icono"}, PDO::PARAM_STR);
	  		$sql2->bindParam(':hume', $arrayciu{"hume"}, PDO::PARAM_INT);
	  		$sql2->bindParam(':viento', $arrayciu{"viento"}, PDO::PARAM_STR);
	  		$sql2->bindParam(':pviento', $arrayciu{"pviento"}, PDO::PARAM_STR);
	  		$sql2->bindParam(':precidesc', $arrayciu{"precidesc"}, PDO::PARAM_STR);
	  		$sql2->bindParam(':hora', $arrayciu{"hora"}, PDO::PARAM_STR);
	  		$sql2->bindParam(':ciudad',  $arrayciu{"ciudad"}, PDO::PARAM_STR);
	
			$sql2->execute();
		}
	return $arrayciu;
	//si no existe la ciudad redirecciona a la pagina de error
	} else {
		return false;
	}
}

//API TIEMPO 7 DIAS
function tiempodias($ciu) {
	//comprobar si habrá llamada a la api
	$comprobante = false;
	$ciudad = $ciu;
	//sustituir nombres de ciudades que no recoge la api 
	if ($ciu == "La Palma") {
		$ciu = 'aridane';
	}
	//nombre de variables en minusculas, sin espacios y sin tildes ni ñ
	$ciu = str_replace(array(' ','á', 'é', 'í', 'ó', 'ú', 'ñ'), array('%20','a', 'e', 'i', 'o', 'u', 'n'), mb_strtolower($ciu,'UTF-8'));
	//Conversion a cadena de texto legible por la api
	$name = "name=".$ciu."%20spain";

	require_once "clases/Conexion.php" ;
	$lnk= Conexion::getInstancia() ;

	$query1 = "SELECT * FROM tiempof WHERE ciudad=:ciudad" ;
	$sql1 = $lnk->prepare($query1);
	$sql1->bindParam(':ciudad',$ciudad, PDO::PARAM_STR);
    $sql1->execute();
	$result1 = $sql1->fetchAll(PDO::FETCH_ASSOC);

	//comprobar que existe un tiempo registrado en esa ciudad
	if ($sql1->rowCount()){
		$fecha11 = new DateTime(date('Y-m-d h:i:s'));
		$fecha22 = new DateTime($result1[0]['hora']);
		//comprobar que la query ha sido actualizada hace menos de x tiempo
		//si es así, muestra la informacion recogida de la bd
		if (abs($fecha11->getTimestamp()-$fecha22->getTimestamp()) < 3600) {
			for ($i = 0; $i < 7; $i++) {
				${$ciu.($i+1)} = array(
				  'cod' => $i+1,
				  'temp' => $result1[$i]['temp'],
				  'icono' => $result1[$i]['icono'],
				  'viento' => $result1[$i]['viento'],
				  'pviento' => $result1[$i]['pviento'],
				  'hume' => $result1[$i]['hume'],
				  'precidesc' => $result1[$i]['precidesc'],
				  'preciprob' => $result1[$i]['preciprob'],
				  'ciudad' => $result1[$i]['ciudad'] );
			}
		//si no es asi, preparar sentencia update e indicar que se consultara el json
		} else {
			$query2 = "UPDATE tiempof SET temp=:temp, icono=:icono, viento=:viento, pviento=:pviento, hume=:hume, precidesc=:precidesc, preciprob=:preciprob, hora= NOW() where ciudad =:ciudad AND cod=:cod";
			$sql2 = $lnk->prepare($query2);
			$comprobante = true;
		}
	//si no es asi, preparar sentencia insert e indicar que se consultara el json
	} else {
		$query2 = "INSERT INTO tiempof(cod, temp, icono, viento, pviento, hume, precidesc, preciprob, ciudad, hora) VALUES (:cod, :temp, :icono, :viento, :pviento, :hume, :precidesc, :preciprob, :ciudad, NOW())";
			$sql2 = $lnk->prepare($query2);
			$comprobante = true;
    }

    if ($comprobante == true) {
    	$data2 = json_decode(file_get_contents('https://weather.api.here.com/weather/1.0/report.json?product=forecast_7days_simple&'.implode("&", array($name, lengua, appId, appCode))), true);
		for ($i = 0; $i < 7; $i++) {
			${$ciu.($i+1)} = array(
			'cod' => $i+1,
			'temp' => (($data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"highTemperature"} + $data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"lowTemperature"}) / 2),
			'icono' => $data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"iconLink"},
			'viento' => $data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"windSpeed"},
			'pviento' => $data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"windDescShort"},
			'hume' => $data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"humidity"},
			'precidesc' => $data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"precipitationDesc"},
			'preciprob' => $data2{"dailyForecasts"}{"forecastLocation"}{"forecast"}[$i]{"precipitationProbability"},
			'ciudad' => $ciudad);	
			$sql2->bindParam(':cod', ${$ciu.($i+1)}['cod'] , PDO::PARAM_INT);
    		$sql2->bindParam(':temp',${$ciu.($i+1)}['temp'], PDO::PARAM_STR);
			$sql2->bindParam(':icono',${$ciu.($i+1)}['icono'], PDO::PARAM_STR);
			$sql2->bindParam(':viento', ${$ciu.($i+1)}['viento'], PDO::PARAM_STR);
			$sql2->bindParam(':pviento', ${$ciu.($i+1)}['pviento'], PDO::PARAM_STR);
			$sql2->bindParam(':hume',${$ciu.($i+1)}['hume'], PDO::PARAM_INT);
			$sql2->bindParam(':precidesc',${$ciu.($i+1)}['precidesc'], PDO::PARAM_STR);
			$sql2->bindParam(':preciprob',${$ciu.($i+1)}['preciprob'], PDO::PARAM_INT);
			$sql2->bindParam(':ciudad',${$ciu.($i+1)}['ciudad'], PDO::PARAM_STR);
    		$sql2->execute();

        }
    }
    //devolver un array que contenga todos los arrays para mostrarlo en las vistas
    return array(${$ciu."1"}, ${$ciu."2"}, ${$ciu."3"}, ${$ciu."4"}, ${$ciu."5"}, ${$ciu."6"}, ${$ciu."7"});
}

?>