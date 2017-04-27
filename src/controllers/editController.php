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
			//for edit
			$model = new Model();
			$model->addSheet($name,'');
			$model->addCode($name,$hash_name,'edit');
			// for read
			$salt = time()*1000000+1;
			$salt = $name + strval($salt);
			$hash_read = substr(md5($salt),0,8);
			$model->addCode($name,$hash_read,'read');
			//for file
			$salt = time()*1000000+2;
			$salt = $name + strval($salt);
			$hash_file = substr(md5($salt),0,8);
			$model->addCode($name,$hash_file,'file');
			// transfer data to view
			$obj['data'] = '';
			$obj['name'] = $name;
			$obj['hash_edit'] = $hash_name;
			$obj['hash_read'] = $hash_read;
			$obj['hash_file'] = $hash_file;

		}
		else if(isset($_GET['name']))
		{
			$obj = $_GET;
			$obj['hash'] ='';
		}
		$l = new layout('editView',$obj);
	}	
}
