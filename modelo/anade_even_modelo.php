<?php

$comprobar = true;
		//comprobamos si ha ocurrido un error.
		if (empty($_FILES['foto']) || ($_FILES["foto"]["error"] > 0) || (empty($_POST['ciudad']) || (empty($_POST['fecha_fin'])) || (empty($_POST['fecha_fin'])) ||  (empty($_POST['titul'])))){
		 $comprobar = false;
		 //Si está todo correcto, seguir con el proceso
		} else {
			$ciudad = $_POST['ciudad'];
			$fecha_inicio = $_POST['fecha_inicio'];
			$fecha_fin = $_POST['fecha_fin'];
			$titulo = $_POST['titul'];

		 //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido y que el tamaño no exceda 1,5MB +-
		 $permitidos = array("image/jpg", "image/jpeg", "image/png");
		 $limite = 1500000;

		  // Fecha y hora es parte del nombre de la imagen para que no problema con los nombres
		  $fechaactual  = date("Y-m-d-h-i-s");
		  // Ruta donde copiaremos la imagen
		  $ruta = "../img/fotos_eventos/" .$fechaactual.$_FILES['foto']['name'];

		  // Comprobamos que sea una imagen permitida
		  if (in_array($_FILES['foto']['type'], $permitidos)){
		  //aqui se mueve el archivo desde la ruta temporal a nuestra ruta
		   if (@move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta)){

		    $imagen = $fechaactual.$_FILES['foto']['name'];
		    $tamano = $_FILES['foto']['size'];
		    $info = getimagesize($ruta);
		  	$ancho = $info[0];   
		  	$alto = $info[1];

		  	//Validar que esté todo correcto
		    if (($tamano <= $limite) && ( $ancho > $alto ) && ($fecha_inicio >= date("Y-m-d")) && ( $fecha_inicio <= $fecha_fin ) && ($fecha_fin <= date("Y-m-d",strtotime("+ 183 days")))) {

		    	$buscasCiudad = in_array($_POST['ciudad'] , $_SESSION['ciudades']);

		    	//si la ciudad es correcta y no hay fallos hacemos el insert
				if ($buscasCiudad == 1 && $comprobar == true) {

					require_once "../clases/Conexion.php" ;
					$db = Conexion::getInstancia() ;
					$query= "INSERT INTO evento ( nombre, lugar, foto, fecha_inicio, fecha_fin, validado, usuario) VALUES(:titulo ,:ciudad, :foto , :fecha_inicio, :fecha_fin, :validado, :usuario )" ;
					$usuario = $_SESSION['usuario']->usuario;
					//valor de verificado en la vista al usuario root
					$validar = ($_SESSION['usuario']->usuario == 'root') ? 'si' : 'no';

					$sql = $db->prepare($query);
					$sql->bindParam(':titulo', $titulo, PDO::PARAM_STR);
					$sql->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
					$sql->bindParam(':foto', $imagen, PDO::PARAM_STR);
					$sql->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
					$sql->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
					$sql->bindParam(':usuario', $usuario, PDO::PARAM_STR);
					$sql->bindParam(':validado', $validar, PDO::PARAM_STR);
       				$sql->execute();

				} else {
					$comprobar = false;
				}
			} else {
				$comprobar = false;
			}
   		} else {
    		$comprobar = false;

   		}
 		} else {
  			$comprobar = false;
 		}
	}
?>