<?php

		// Si hay datrs introducidos
		if ((isset($_POST['user'])) && (isset($_POST['pass'])) && (isset($_POST['correo'])) && (isset($_POST['ciuR']))) {

			require_once "../clases/Conexion.php" ;
			$db = Conexion::getInstancia() ;
			// Comprobante
			$mod_user = true;

			// Comprueba que sea un dato diferente, o si no, que no exista ya en la bd
			if ($_POST['user'] != $_SESSION['usuario']->usuario) {

				$query= "select usuario from usuario where usuario = :usuario" ;
				$sql = $db->prepare($query);
				$sql->bindParam(':usuario', $_POST['user'], PDO::PARAM_STR);
       			$sql->execute();
       			$result = $sql->fetch();

       			if ($sql->rowCount()) {
       				$mod_user = false;
       			} else {
       				$user = $_POST['user'];
       			}
			}

			// Comprueba que sea un dato diferente, o si no, que no exista ya en la bd
			if ($_POST['correo'] != $_SESSION['usuario']->correo) {

				$query2= "select usuario from usuario where usuario = :usuario" ;
				$sql2 = $db->prepare($query2);
				$sql2->bindParam(':usuario', $_POST['correo'], PDO::PARAM_STR);
       			$sql2->execute();
       			$result2 = $sql2->fetch();
       			
       			if ($sql2->rowCount()) {
       				$mod_user = false;
       			} else {
       				$correo = $_POST['correo'];
       			}
			}

			// Comprueba que sea un dato diferente, o si no, que no exista ya en la bd
			if ($_POST['ciuR'] != $_SESSION['usuario']->ciudad) {
				$ciuR = in_array($_POST['ciuR'] , $_SESSION['ciudades']);
				if ($ciuR) {
					$ciuR = $_POST['ciuR'];
				} else {
					$mod_user = false;
				}
			}

			//Igual, pero primero comprueba que exista, ya que es un dato opcional
			if (isset($_POST['ciu1'])) {
				if ($_POST['ciu1'] == $_SESSION['usuario']->ciudad1) {
					$ciu1 = $_POST['ciu1'];
				} else if ($_POST['ciu1'] == "Eliminar") {
					$ciu1 = null;
				} else {
					$ciu1 = in_array($_POST['ciu1'] , $_SESSION['ciudades']);
					if ($ciu1) {
						$ciu1 = $_POST['ciu1'];
					} else {
						$mod_user = false;
					}
				}
			} else {
				$ciu1 = null;
			}


			//Igual, pero primero comprueba que exista, ya que es un dato opcional
			if (isset($_POST['ciu2'])) {
				if ($_POST['ciu2'] == $_SESSION['usuario']->ciudad2) {
					$ciu2 = $_POST['ciu2'];
				} else if ($_POST['ciu2'] == "Eliminar") {
					$ciu2 = null;
				} else {
					$ciu2 = in_array($_POST['ciu2'] , $_SESSION['ciudades']);
					if ($ciu2) {
						$ciu2 = $_POST['ciu2'];
					} else {
						$mod_user = false;
					}
				}
			} else {
				$ciu2 = null;
			}

			//Igual, pero primero comprueba que exista, ya que es un dato opcional
			if (isset($_POST['ciu3'])) {
				if ($_POST['ciu3'] == $_SESSION['usuario']->ciudad3) {
					$ciu3 = $_POST['ciu3'];
				} else if ($_POST['ciu3'] == "Eliminar") {
					$ciu3 = null;
				} else {
					$ciu3 = in_array($_POST['ciu3'] , $_SESSION['ciudades']);
					if ($ciu3) {
						$ciu3 = $_POST['ciu3'];
					} else {
						$mod_user = false;
					}
				}
			} else {
				$ciu3 = null;
			}

			// Si es correcto, continua y actualiza al usuario (incluida la contraseña como obligatorio (tener ciudado))
			if ($mod_user == true) {
				$usuario = $_SESSION['usuario']->usuario;
				$query3= "UPDATE usuario set usuario = :user, contrasena = :contrasena, correo = :correo, ciudad = :ciudad, ciudad1 = :ciudad1, ciudad2 = :ciudad2, ciudad3 = :ciudad3 where usuario = :usuario" ;
				$passHash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
				$sql3 = $db->prepare($query3);
				$sql3->bindParam(':user',$_POST['user'], PDO::PARAM_STR);
				$sql3->bindParam(':contrasena', $passHash, PDO::PARAM_STR);
				$sql3->bindParam(':correo',$_POST['correo'], PDO::PARAM_STR);
				$sql3->bindParam(':ciudad',$_POST['ciuR'], PDO::PARAM_STR);
				$sql3->bindParam(':ciudad1',$ciu1, PDO::PARAM_STR);
				$sql3->bindParam(':ciudad2',$ciu2, PDO::PARAM_STR);
				$sql3->bindParam(':ciudad3',$ciu3, PDO::PARAM_STR);
				$sql3->bindParam(':usuario', $usuario , PDO::PARAM_STR);
       			$sql3->execute();
       			$resultado = $sql3->fetch();
       			// Setear el usuario para actualzar los datos
       			if ($sql3->rowCount()) {
       				$_SESSION['usuario']->__set("usuario",$_POST['user']);
					$_SESSION['usuario']->__set("correo",$_POST['correo']);
					$_SESSION['usuario']->__set("ciudad",$_POST['ciuR']);
					$_SESSION['usuario']->__set("ciudad1",$ciu1);
					$_SESSION['usuario']->__set("ciudad2",$ciu2);
					$_SESSION['usuario']->__set("ciudad3",$ciu3);
       			}
			}

	} else {
		$mod_user = false;
	}
?>