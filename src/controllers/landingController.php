<?php
namespace hw4\controllers;

use hw4\views\layout;
use hw4\models\Model;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class landingController {

	public function __construct()
	{
		// Create the logger
		$logger = new Logger('my_logger');
		// Now add some handlers
		$logger->pushHandler(new StreamHandler(__DIR__.'/../../spread.log', Logger::DEBUG));
		// You can now use your logger
		$logger->info('Landing Page was visited.');
		$check = 0;
		$l = new layout('landingView','');
		if(isset($_POST['name']))
			$name = $_POST['name'];
		else if(isset($_GET['name']))
			$name = $_GET['name'];
		if(isset($name))
		{
			$model = new Model();
			$result = $model->getSheet($name);
			foreach ($result as $row)
			{
				if(isset($row['sheet_data'])) // check if name is existed name
				{
					$data = $row['sheet_data'];
					$url = "index.php?c=edit&name=$name";
					header("Location: $url");
					$check = 1; //1 name is existed
				}
			}
			if ($check != 1) // check $name is hash code
			{
				$result = $model->getNameAndCode($name);
				foreach ($result as $row)
				{
					$type = $row['code_type'];
					if($type==='edit' || $type==='read' || $type==='file')
					{
						$sheet_name = $row['sheet_name'];
						$url = "index.php?c=$type&code=$name";
						header("Location: $url");
						$check = 2; //2 name is hash code
					}
				}
				if($check == 0)// new name for spreadsheet
				{
					$url = "index.php?c=edit&newName=$name";
					header("Location: $url");
				}
			}
		}
	}
}
