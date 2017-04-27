<?php
namespace hw4\controllers;

use hw4\views\layout;
use hw4\models\Model;

class editController {

	public function __construct()
	{
		if(isset($_GET['newName']))
		{
			$name = $_GET['newName'];
			$salt = time()*1000000;
			$salt = $name + strval($salt);
			$hash_name = substr(md5($salt),0,8);
			$obj['data'] = '';
			$obj['name'] = $name;
			$obj['hash'] = $hash_name;
			$model = new Model();
			$model->updateCode($name,$hash_name,'edit');
		}
		else if(isset($_GET['name']))
		{
			$obj = $_GET;
			$obj['hash'] ='';
		}
		$l = new layout('editView',$obj);
	}	
}
