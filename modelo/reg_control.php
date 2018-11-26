<?php
	$comprobar = false;

	header("Content-Type: text/html;charset=utf-8");

	// Comprobamos que los datos esten bien
	if (isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["correo"]) && isset($_POST["ciudad"]) && isset($_POST["pass2"]) && ($_POST["pass"] === $_POST["pass2"])) {
		 // Comprobamos que no exista ese usuario ni contraseña			
		$query2= "SELECT usuario FROM usuario where usuario=:usuario or correo=:correo" ;
		$sql2 = $db->prepare($query2);
		$sql2->bindParam(':usuario', $_POST["user"], PDO::PARAM_STR);
		$sql2->bindParam(':correo', $_POST["correo"], PDO::PARAM_STR);
		$sql2->execute();

			// Comprobar que sea una ciudad existente
			foreach($result as $row):
            	if ($row['ciudad'] == $_POST['ciudad']) {
            		$comprobar = true;
            	}
            endforeach;
            //comprobar que exista la ciudad, no haya errores ni tampoco ningun espacio en el nombre, y si es correcto, hacer la insercion
			if ((!$sql2->rowCount()) && ($comprobar == true) && (!preg_match('/\s/', $_POST["user"]))) { 
				$passHash = password_hash($_POST['pass'], PASSWORD_BCRYPT);

				$query3 = "INSERT INTO usuario(usuario, contrasena, correo, ciudad) VALUES (:usuario, :contrasena, :correo, :ciudad)";
				$sql3 = $db->prepare($query3);
    			$sql3->bindParam(':usuario',$_POST['user'], PDO::PARAM_STR);
    			$sql3->bindParam(':contrasena',$passHash, PDO::PARAM_STR);
    			$sql3->bindParam(':correo',$_POST['correo'], PDO::PARAM_STR);
    			$sql3->bindParam(':ciudad',$_POST['ciudad'], PDO::PARAM_STR);
    			$sql3->execute();
    			$result3 = $sql3->fetch();

			} else {
				$comprobar = false;
			}

	} else {
		$comprobar = false;
	}

	// Si todo es correcto, redireccionar al login
	if ($comprobar == true) {
		header('Location: login');
	}

?>