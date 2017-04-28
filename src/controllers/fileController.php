<?php
namespace hw4\controllers;
use hw4\views\layout;
use hw4\models\Model;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class fileController 
{
	public function __construct()
	{
		if(isset($_GET['name']))
			$name = $_GET['name'];

		$l = new layout("fileView",'');
	}
}
