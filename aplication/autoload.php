<?php

/**
  * Método __autoload
  * 
  * 
  * 
  * @param  $className nombre de la clase a cargar
  * @author Javier Rivero <javier93rivero@gmail.com>
  * @return object
  */
function __autoload($className){
	require_once(ROOT."libs".DS.$className.".php");
}