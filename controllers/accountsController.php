<?php

/**
* 
*/
class accountsController extends AppsController
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_view->setLayout("website");
	}

	public function index(){
		$conditions = array("conditions" => "accounts.user_id=users.id");
		//Estos valores se envian en la vista de los usuarios index.php
		$accounts = $this->accounts->find("accounts, users", "all", $conditions);
		$accountsCount = $this->accounts->find("accounts", "count");
		
		$this->set("accounts", $accounts);
		$this->set("accountsCount", $accountsCount);
	}


	public function add(){
		if ($_SESSION["type_name"]== "Administradores") {
			if ($_POST) {
				if ($this->accounts->save("accounts", $_POST)) {
					$this->redirect(array("controller"=>"accounts"));
				}else{
					$this->redirect(array("controller"=>"accounts", "method"=>"add"));
				}
			}
			//El variable users es que se se manda en la vista de formularion add para visualizar todos los usuarios
			$this->set("users", $this->accounts->find("users"));
			$this->_view->setView("add");
		}else{
			$this->redirect(array("controller"=>"accounts"));
		}
	}

	public function edit($id){
		if ($_SESSION["type_name"]=="Administradores") {
			if ($_GET) {
				if ($id){
					$options = array("conditions"=>"id=".$id);
					$account = $this->accounts->find("accounts", "first", $options);
					$this->set("account", $account);
					//Hacemos referencia a la tabla types
					$this->set("users", $this->accounts->find("users"));
				}else{
					//Redirecciona cuando se hace la peticion de update
					$this->redirect(array("controller"=>"accounts"));
				}

				if ($_POST) {
					//Primero le mandamo el nombre d ela tabla y luego el POST es donde estan almacenados los datos a editar
					if ($this->accounts->update("accounts", $_POST)) {
						$this->redirect(array("controller"=>"accounts"));
					}else{
					$this->redirect(array("controller"=>"accounts", "method"=>"edit/".$_POST["id"]));
					}
				}
			}
		}else{
			$this->redirect(array("controller"=>"accounts"));
		}
	}

	public function delete($id){
		if ($_SESSION["type_name"]=="Administradores") {
			$conditions = "id=".$id;
			if ($_GET) {
				if ($this->accounts->delete("accounts", $conditions)) {
					$this->redirect(array("controller"=>"accounts"));
				}else{
					$this->redirect(array("controller"=>"accounts", "method"=>"add"));
				}
			}
		}else{
			$this->redirect(array("controller"=>"accounts"));
		}
	}
		

	
}