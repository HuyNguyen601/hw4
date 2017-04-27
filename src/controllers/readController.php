<?php
namespace hw4\controllers;
use hw4\views\layout;
use hw4\models\Model;

class readController 
{
	public function __construct()
	{

		if(isset($_GET['code']))
			$code = $_GET['code'];
		$model = new Model();
		$result = $model->getNameAndCode($code);
		foreach($result as $row)
		{
			$obj['name'] = $row['sheet_name'];
		}
		$result = $model->getCodes($obj['name']);
		foreach($result as $row)
		{
			if($row['code_type'] === 'file')
				$obj['hash_file']=$row['hash_code'];
		}
		$l = new layout('readView',$obj);
	}

}
