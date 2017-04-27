<?php
namespace hw4\controllers;

use hw4\models\Model;
class fileController 
{
	public function __construct()
	{
		if(isset($_GET['name']))
			$name = $_GET['name'];
	}
}
