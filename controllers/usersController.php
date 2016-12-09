<?php

/**
  * Esta clase usersController
  * 
  *  Métodos que sirve para hacer diferentes peticiones como: agregar, editar, eliminar y logear.
  * @param  $id es el identificador del usuario
  * @return object
  */
class usersController extends AppsController
{
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		//Es para agregar la ruta de las librerias
		$this->_view->setlayout("website");
		//Estos valores se envian en la vista de los usuarios index.php
		$conditions = array("conditions" => "users.type_id=types.id");
		//Segunda opción
		$users = $this->users->find("users , types", "all", $conditions);
		$usersCount = $this->users->find("users", "count");
		$this->set("users", $users);
		$this->set("usersCount", $usersCount);
		$title = "Listado de usarios";
		$this->set("title", $title);
		
	}

	public function add(){
		if ($_SESSION["type_name"]=="Administradores") {
			$this->_view->setlayout("website");
			if ($_POST) {
				$pass = new Password();
				$_POST["password"] = $pass->getPassword($_POST["password"]);
			//Manda los valores en la funcion save para guardar los registros
			if ($this->users->save("users",$_POST )) {
				$this->redirect(array("controller"=>"users"));
			}else{
				$this->redirect(array("controller"=>"users", "methos"=>"add"));
			}
		}
		$this->set("types", $this->users->find("types"));//Hacemos referencia a la tabla types
		$this->_view->setView("add");//Es una funcion indicamos que vista queremos visualizar
		}else{
			$this->redirect(array("controller"=>"users"));
		}
	}

	public function edit($id){

		if ($_SESSION["type_name"]=="Administradores") {
			$this->_view->setlayout("website");
			if ($_GET) {
				if ($id){
					$options = array("conditions"=>"id=".$id);
					$user = $this->users->find("users", "first", $options);
					$this->set("user", $user);
					//Hacemos referencia a la tabla types
					$this->set("types", $this->users->find("types"));
					//$this->set("title", "Agregar usuario");
				}else{
					//Redirecciona cuando se hace la peticion de update
					$this->redirect(array("controller"=>"users"));
				}
				//Comporbar si esta recibiendo los datos con el $_POST
				if ($_POST) {
					if (!empty($_POST["newPassword"])) {
						$pass = new Password();
						$_POST["password"] = $pass->getPassword($_POST["newPassword"]);
					}
					//Primero le mandamo el nombre d ela tabla y luego el POST es donde estan almacenados los datos a editar
					if ($this->users->update("users", $_POST)) {
						$this->redirect(array("controller"=>"users"));
					}else{
					$this->redirect(array("controller"=>"users", "method"=>"edit/".$_POST["id"]));
					}
					
				}	
			}
		}else{
			$this->redirect(array("controller"=>"users"));
		}	
	}


	public function delete($id){
		if ($_SESSION["type_name"]=="Administradores") {
			$conditions = "id=".$id;
			if ($_GET) {
				if ($this->users->delete("users", $conditions)) {
					$this->redirect(array("controller"=>"users"));
				}else{
					$this->redirect(array("controller"=> "users", "method"=>"add"));
				}
			}
		}else{
			$this->redirect(array("controller"=>"users"));
		}
	}

	public function login(){
		$this->_view->setLayout("login");
		
		if ($_POST){
			$pass = new Password();
			$auth = new Authorization();
			//Poner nombre de la clase 
			$filter = new Validations();
			$username = $filter->sanitizeText($_POST["username"]);
			$password = $filter->sanitizeText($_POST["password"]);

			$options = array(
				"field"=>"users.id as user_id,
						   users.password as password, 
						   users.username as username, 
						   types.id as type_id,
						   types.name as type_name",
				"conditions"=>"users.username='$username' and users.type_id=types.id");
			//Aqui s ponen las tablas a consultar
			$user = $this->users->find("users, types", "first", $options);
			
			if ($pass->isValid($password, $user["password"])) {
				$auth->login($user);
				$this->redirect(array("controller"=>"pages"));
			}else{
				echo "Usuario no valido";
			}
		}
	}
			
	public function logout(){
		$auth = new Authorization();
		$auth->logout();
		//$this->_view->render("login");
	}

	public function form(){
		
	}
}