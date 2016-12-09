<?php
/**	
 * Clase autorizacion es para el manejo de sesiones para identificar los tipos de usuario
 * 
 * @author  Javier Rivero <javier93rivero@gmail.com>
 * @param   $user es para crearción de sesion.
 * 
 * 
 */

class Authorization
{

	static function logged(){
		session_start();
		if (!$_SESSION["logged"]) {
			header("Location: ".APP_URL."/users/login");
			exit;
		}
	}

	public function login($user){
		session_start();
		$_SESSION["logged"] = true;
		$_SESSION["username"] = $user["username"];
		$_SESSION["type_name"] = $user["type_name"]; 
		$_SESSION["start"] = time(); 
		$_SESSION["expire"] = $_SESSION["start"] + (5 * 60); 
	}

	public function logout(){
		session_unset();

		session_destroy();

		echo "
			<script type='text/javascript'>
			alert('Ha salido correctamente');
			window.location='http://localhost/framework/users/login';
			</script>
		";
	}
}