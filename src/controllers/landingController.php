<?php
namespace hw4\controllers;

use hw4\views\layout;
use hw4\models\Model;

class landingController {

	public function __construct()
	{
		$check = 0;
		$l = new layout('landingView','','');
		if(isset($_POST['name']))
			$name = $_POST['name'];
		if(isset($_POST['go']))
		{
			$model = new Model();
			$result = $model->getSheet($name);
			foreach ($result as $row)
			{
				if(isset($row['sheet_data'])) // check if name is existed name
				{
					$data = $row['sheet_data'];
					$url = "index.php?c=edit&name=$name&data=$data";
					header("Location: $url");
					$check = 1; //1 name is existed
				}
			}
			if ($check!==1) // check $name is hash code
			{
				$result = $model->getCode($name);
				foreach ($result as $row)
				{
					$type = $row['code_type'];
					if($type==='edit' || $type==='read' || $type==='file')
					{
						$sheet_name = $row['sheet_name'];
						$url = "index.php?c=$type&code=$name&name=$sheet_name";
						header("Location: $url");
						$check = 2; //2 name is hash code
					}
				}
			}
			else // new name for spreadsheet
			{
				$url = "index.php?c=edit&newName=$name";
				header("Location: $url");
			}
		}
	}
}
