<?php

/**
  * Esta clase transactionsController
  * 
  * @return object
  */
 
class transactionsController extends AppsController
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Methos index
	 * 
	 * @return type
	 */
	public function index(){
		//Es para agregar la ruta de las librerias
		$this->_view->setlayout("website");
		//Estos valores se envian en la vista de los usuarios index.php
		$conditions = array("conditions" => "transactions.account_id=accounts.id AND transactions.category_id=categories.id");
		//$conditions = array("conditions" => "transactions.category_id=categories.id");

		//Segunda opción
		$transactions = $this->transactions->find("transactions , accounts, categories", "all", $conditions);
		$transactionsCount = $this->transactions->find("transactions", "count");
		$parameters = array("parameters"=>"transactions.amount");
		$transactionsBalance = $this->transactions->find("transactions", "suma");
		$this->set("transactions", $transactions);
		$this->set("transactionsCount", $transactionsCount);
		$this->set("transactionsBalance", $transactionsBalance);

	}

	public function add(){
		if ($_SESSION["type_name"]=="Administradores") {
			$this->_view->setlayout("website");
			if ($_POST) {
				if ($_POST["typeTransaction"]=="Egreso"){
						$TotalAmount = $_POST["amount"]*(-1);
						$_POST["amount"] = $TotalAmount; 
				}
			//Manda los valores en la funcion save para guardar los registros
				if ($this->transactions->save("transactions",$_POST)) {
					//$this->redirect(array("controller"=>"transactions"));
				}else{
					$this->redirect(array("controller"=>"transactions", "methos"=>"add"));
				}
			}
		//$this->set("types", $this->users->find("types"));//Hacemos referencia a la tabla types
			$this->set("accounts", $this->transactions->find("accounts"));
			$this->set("categories", $this->transactions->find("categories"));
		//$this->_view->setView("add");//Es una funcion indicamos que vista queremos visualizar
		}else{
			$this->redirect(array("controller"=>"transactions"));
		}
	}

	public function edit($id){

		if ($_SESSION["type_name"]=="Administradores") {
				$this->_view->setlayout("website");
			if ($_GET) {
				if ($id){
					$options = array("conditions"=>"id=".$id);
					$transaction = $this->transactions->find("transactions", "first", $options);
					$this->set("transaction", $transaction);
					//Hacemos referencia a la tabla types
					$this->set("accounts", $this->transactions->find("accounts"));
					$this->set("categories", $this->transactions->find("categories"));
				}else{
					//Redirecciona cuando se hace la peticion de update
					$this->redirect(array("controller"=>"transactions"));
				}

				if ($_POST){
					if ($_POST["typeTransaction"]=="Egreso"){
						$TotalAmount = $_POST["amount"]*(-1);
						$_POST["amount"] = $TotalAmount;	
					}

					if($this->transactions->update("transactions", $_POST)){
						$this->redirect(array("controller"=>"transactions"));
					}else{
						$this->redirect(array("controller"=>"transactions", "method"=>"edit/".$_POST["id"]));
					}
				}
					

				//Comporbar si esta recibiendo los datos con el $_POST
			/*	if ($_POST) {
					if ($this->transactions->update("transactions", $_POST)) {
						$this->redirect(array("controller"=>"transactions"));
					}else{
					$this->redirect(array("controller"=>"transactions", "method"=>"edit/".$_POST["id"]));
					}
					
				}*/	
			}
		}else{
			$this->redirect(array("controller"=>"transactions"));
		}	
	}


	public function delete($id){
		if ($_SESSION["type_name"]=="Administradores") {
			$conditions = "id=".$id;
			if ($_GET) {
				if ($this->transactions->delete("transactions", $conditions)) {
					$this->redirect(array("controller"=>"transactions"));
				}else{
					$this->redirect(array("controller"=> "transactions", "method"=>"add"));
				}
			}
		}else{
			$this->redirect(array("controller"=>"transactions"));
		}
	}

}