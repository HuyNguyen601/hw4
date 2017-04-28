<?php
namespace hw4\controllers;
use hw4\views\layout;
use hw4\models\Model;

class readController 
{
	public function __construct()
	{

		if(isset($_GET['code']))
			$obj['hash_read'] = $_GET['code'];
		$model = new Model();
		$result = $model->readModel($obj['hash_read']);
		foreach($result as $row)
		{
			$obj['name'] = $row['sheet_name'];
			$obj['data'] = $row['sheet_data'];
			$obj['hash_file'] = $row['hash_code'];
		}
		$l = new layout('readView',$obj);
	}

}
