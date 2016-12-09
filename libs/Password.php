
<?php

/**
* Clase password
* 
* Clase para el manejo de contraseñas
*
* @author Javier Rivero <javier93rivero@gmail.com>
* @version 1.0 Primera versión estable
* 
*/

class Password{

	/**
	 * 
	 */
	public function __construct(){
		$this->checkBlowfish();
	}
	/**
	 * checkBlowfish chequeo de algoritmo de codificación
	 * @return void
	 */
	private function checkBlowfish(){
		if (!defined("CRYPT_BLOWFISH") && !CRYPT_BLOWFISH) {
			echo "Algoritmo Blowfish no roportado";
			die();
		}
	}
	/**
	 * getPassword método para generar hash de contraseña
	 * @param  string  $password contraseña base para generar hash
	 * @param  integer $dig cuota de procesamiento
	 * @return string hash de contraseña generado
	 */
	public function getPassword($password, $dig = 7){
		/**
		 * $set_salt caracteres para generar la sal
		 * @var string
		 */
		$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		/**
		 * $salt sal generada
		 * @var string
		 */
		$salt = sprintf('$2a$%02d$', $dig);

		for ($i=0; $i < 22; $i++) { 
			$salt .= $set_salt[mt_rand(0, 22)];
		}

		return crypt($password, $salt);
	}
	/**
	 * isValid validación de hash de contraseña
	 *
	 * Método que compara dos has de contraseñas y 
	 * regresa falso en caso de no ser identicas y verdadero en caso de coincidir
	 * @param  string  $pass1 hash a comparar
	 * @param  string  $pass2 hash base
	 * @return boolean
	 */
	public function isValid($pass1, $pass2){
		if (crypt($pass1, $pass2) == $pass2) {
			return true;
		}
		
		return false;	
	}
	/**
	 * passwordVerify verificación de contraseña
	 * @param  string $pass1 hash a comparar
	 * @param  string $pass2 hash base
	 * @return boolean
	 * @since 5.5 php
	 */
	public function passwordVerify($pass1, $pass2){
		if (password_verify($pass1, $pass2)) {
			return true;
		}
		return false;
	}
}