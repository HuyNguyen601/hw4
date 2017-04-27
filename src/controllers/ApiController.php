<?php
namespace hw4\controllers;

use hw4\models\Model;
class ApiController 
{
	public function __construct()
	{
		if(isset($_GET['name']))
			$name = $_GET['name'];
		$str = file_get_contents('php://input');
		$model = new Model();
		$model->updateSheet($name,$str);
	}
}
