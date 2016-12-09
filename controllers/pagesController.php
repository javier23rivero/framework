<?php
/**
 * 
 */
class PagesController extends AppsController
{
	


	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$this->_view->setlayout("website");
	}

	public function edit(){
		
	}
}