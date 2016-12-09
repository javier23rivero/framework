<?php

abstract class AppsController
{
	//Se crea un objeto 
	protected $_view;

	abstract public function index(); 

	public function __construct()
	{
		$this->_view = new View(new Request);
		$controller = new Request();
		$className = $controller->getController();
		$this->$className = new classPDO();


	}
	public function redirect($url = array()){
		$path = "";
		if ($url["controller"]) {
			$path .=$url["controller"];
		}
		if ($url["method"]) {
			$path .= "/". $url["method"];
		}

		header("LOCATION:" .APP_URL."/".$path);
	}
	//$one nombre de array de los valores de la funtion set
	//$two Los valores que van dentro del array de la function set

	public function set($one, $two=null){
		if (is_array($one)) {
			if (is_array($two)) {
				$data = array_combine($one, $two);
			}else{
				$data = $one;
			}
		}else{
			$data = array($one=>$two);
		}

		$this->_view->setVars($data);

	}

}