<?php

/**
* 
*/
class Request
{
	private $controller;
	private $_method;
	private $_args;
	
	function __construct()
	{


			if(isset($_GET['url'])){
				$url = filter_input(INPUT_GET, 'url' , FILTER_SANITIZE_URL);
				$url = explode("/", $url);
				$url = array_filter($url);

				//convierte la cadena en minusculas
				$this->_controller = strtolower(array_shift($url));

				if (count($url)>0) {
					$this->_method = strtolower(array_shift($url));
				}else{
					$this->_method = "index";
				}
				
				$this->_args = $url;
			}

			if (!isset($this->_controller)) {
				//$this->_controller = "pages";
				$this->_controller = DEFAULT_CONTROLLER;
			}

			if (!isset($this->_method)) {
				$this->_method = "index";
			}

			if (empty($this->_args)) {
				$this->_args = array(
					0=>NULL
				);
			}



	}
	//Acceder a atributos privados
	public function getController(){
		return $this->_controller;
	}
	public function getMethod(){
		return $this->_method;
	}
	public function getArgs(){
		return $this->_args;
	}


}