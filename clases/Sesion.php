<?php
	require_once "Conexion.php" ;
	require_once "Usuario.php" ;
	class Sesion {

		//Variables y estaticas
		private $expire_time = 300 ;
		private $usuario          = null ; // información usuario
		private static $instancia = null ;	// instancia


		// FUNCIONES
		private function __construc() { }

		private function __clone()    { }

		public static function iniciarSesion() {
			session_start() ;
			if (isset($_SESSION["sesion"])):
				self::$instancia = unserialize($_SESSION["sesion"]) ;
			else:
				if (is_null(self::$instancia)):
					self::$instancia = new Sesion() ;
				endif ;
			endif ;
			return self::$instancia ;
		}

		function login($user, $pass) {

				// Obtenemos la contraseña de ese usuario
				$db = Conexion::getInstancia() ;
				$query= "select contrasena from usuario where usuario = :usuario" ;
				$sql = $db->prepare($query);
				$sql->bindParam(':usuario',$user, PDO::PARAM_STR);
       			$sql->execute();
       			$result = $sql->fetch();

				// comprobamos si hay resultado y decodificamos y verificamos la clave
				if (($sql->rowCount()) && (password_verify($pass, $result['contrasena']))) {
					//obtenemos todos los datos menos la contraseña
					$query2 = "select usuario, correo, ciudad, ciudad1, ciudad2, ciudad3 from usuario where usuario = :usuario" ;
					$sql2 = $db->prepare($query2);
					$sql2->bindParam(':usuario',$user, PDO::PARAM_STR);
       				$sql2->execute();
					$resultado = $sql2->fetchObject('Usuario');
					//Obtenemos todas las ciudades, que serán muy utilizadas para validaciones, para no hacer constantes llamadas 
					$query3 = "SELECT * FROM ciudad" ;
					$sql3 = $db->prepare($query3);
    				$sql3->execute();
					$resulta = $sql3->fetchAll();
					//Obtenemos el viaje programado del usuario (si es que tuviese)
					$query4 = "SELECT ciudad, fecha_ini, fecha_fin  FROM viaje where usuario= :usuario" ;
					$sql4 = $db->prepare($query4);
					$sql4->bindParam(':usuario',$user, PDO::PARAM_STR);
    				$sql4->execute();
					$result4 = $sql4->fetch(PDO::FETCH_ASSOC);
					//si es así, debemos guardarlo
					// A partir de aquí, en una base de datos con permisos admin uso un evento en mysql, pero en el remoto uso esto:
    				// (Es para borrar los viajes 'caducados')
    				if ($sql4->rowCount()) {
    					if ($result4['fecha_fin'] < date('Y-m-d')) {
							$query5= "DELETE FROM viaje WHERE fecha_fin < NOW()" ;
							$sql5 = $db->prepare($query5);
    						$sql5->execute();
    					} else {
    						$_SESSION["viaje"] = [ "ciudad" => $result4['ciudad'], "fecha_ini" => $result4['fecha_ini'], "fecha_fin" =>  $result4['fecha_fin']];
    					}
    				}

					//recorremos las ciudades, y las guardamos en session como el resto de datos
					$_SESSION["ciudades"] = array();
					$i = 0;
					foreach ($resulta as $row) {
						$_SESSION["ciudades"][$i] = $row['ciudad'] ;
						$i++;
					}
					$_SESSION["usuario"] = $resultado ;
					$_SESSION["time"]    = time() ;
					$_SESSION["session"] = serialize(self::$instancia) ;
					return true;
				} else {
					return false;
				}
			}

		private function isExpired() {
			return ((time() - $_SESSION["time"]) > $this->expire_time) ;
		}

		public function isLogged() {
			return !empty($_SESSION) ;
		}

		public function checkActiveSession() 
		{
			// Comprobamos si el usuario está registrado
			if (($this->isLogged()) && !($this->isExpired())):
				//recargamos el tiempo de la sesion
				$_SESSION["time"] = time() ;
				return true;
			else:
				return false ;
			endif;
		}

		public function close() {
			if ($this->checkActiveSession()):
				// Destruimos las variables de sesión
				session_unset() ;
				// Cerramos la sesión
				session_destroy() ;
			endif; 
		}

		public function __sleep() {
			return ["expire_time", "usuario"] ;
		}
	}