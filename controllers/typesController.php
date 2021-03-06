<?php

/**
  * Esta clase usersController
  * 
  *  Métodos que sirve para hacer diferentes peticiones como: agregar, editar, eliminar y logear.
  * @return object
  */
class typesController extends AppsController
{
	function __construct()
	{
		parent::__construct();
		$this->_view->setlayout("website");
	}

	public function index(){
		//Es para agregar la ruta de las librerias
		/*$this->_view->setlayout("website");*/
		//Estos valores se envian en la vista de los usuarios index.php
		//$conditions = array("conditions" => "types.id=users.type_id");
		//Segunda opción
		$types = $this->types->find("types", "all" /*,$conditions*/);
		
		$typesCount = $this->types->find("types", "count");
		$this->set("types", $types);
		$this->set("usersCount", $typesCount);
	}

	public function add(){
		if ($_SESSION["type_name"]=="Administradores") {

			if ($_POST) {
				//$pass = new Password();
				//$_POST["password"] = $pass->getPassword($_POST["password"]);
			//Manda los valores en la funcion save para guardar los registros
			if ($this->types->save("types",$_POST )) {
				$this->redirect(array("controller"=>"types"));
			}else{
				$this->redirect(array("controller"=>"types", "methos"=>"add"));
			}
		}
		$this->set("types", $this->types->find("types"));//Hacemos referencia a la tabla types
		$this->_view->setView("add");//Es una funcion indicamos que vista queremos visualizar
		}else{
			$this->redirect(array("controller"=>"types"));
		}
	}

	public function edit($id){

		if ($_SESSION["type_name"]=="Administradores") {
			//$this->_view->setlayout("website");
			if ($_GET) {
				if ($id){
					$options = array("conditions"=>"id=".$id);
					$type = $this->types->find("types", "first", $options);
					$this->set("type", $type);
					//Hacemos referencia a la tabla types
					//$this->set("types", $this->users->find("types"));
				}else{
					//Redirecciona cuando se hace la peticion de update
					$this->redirect(array("controller"=>"types"));
				}
				//Comporbar si esta recibiendo los datos con el $_POST
				if ($_POST) {
					/*print_r($_POST);
					if (!empty($_POST["newPassword"])) {
						$pass = new Password();
						$_POST["password"] = $pass->getPassword($_POST["newPassword"]);
					}*/
					//Primero le mandamo el nombre d ela tabla y luego el POST es donde estan almacenados los datos a editar
					if ($this->types->update("types", $_POST)) {
						$this->redirect(array("controller"=>"types"));
					}else{
					$this->redirect(array("controller"=>"types", "method"=>"edit/".$_POST["id"]));
					}
					
				}	
			}
		}else{
			$this->redirect(array("controller"=>"types"));
		}	
	}


	public function delete($id){
		if ($_SESSION["type_name"]=="Administradores") {
			$conditions = "id=".$id;
			if ($_GET) {
				if ($this->types->delete("types", $conditions)) {
					$this->redirect(array("controller"=>"types"));
				}else{
					$this->redirect(array("controller"=>"types", "method"=>"add"));
				}
			}
		}else{
			$this->redirect(array("controller"=>"types"));
		}
	}


			
	
}