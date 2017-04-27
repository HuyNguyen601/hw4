<?php
namespace hw4\controllers;

use hw4\views\layout;
use hw4\models\Model;

class editController {

	public function __construct()
	{
		if(isset($_POST['name']))
			$name = $_POST['name'];
		$salt = time()*1000000;
		$salt = $name + strval($salt);
		$hash_name = substr(md5($salt),0,8);
		$l = new layout('editView',$name,$hash_name);
		$model = new Model();
		$model->updateCode($name,$hash_name,'edit');
	}	
}
