<?php
namespace hw4\controllers;

use hw4\views\layout;
use hw4\models\Model;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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
			$obj['name'] = $_GET['name'];
			$model = new Model();
			$results = $model->getSheet($obj['name']);
			foreach($results as $row)
			{
				$obj['data'] = $row['sheet_data'];
			}
			$results = $model->getCodes($obj['name']);
			foreach($results as $row)
			{
				if($row['code_type'] === 'edit')
					$obj['hash_edit'] = $row['hash_code'];
				elseif($row['code_type'] === 'read')
					$obj['hash_read'] = $row['hash_code'];
				elseif($row['code_type'] === 'file')
					$obj['hash_file'] = $row['hash_code'];
			}
		}
		else if(isset($_GET['code']))
		{
			$obj['hash_edit'] = $_GET['code'];
			$model = new Model();
			$results = $model->readModel($obj['hash_edit']);
			foreach($results as $row)
			{
				$obj['data'] = $row['sheet_data'];
				$obj['name'] = $row['sheet_name'];
			}
			$results = $model->getCodes($obj['name']);
			foreach($results as $row)
			{
				if($row['code_type'] === 'edit')
					$obj['hash_edit'] = $row['hash_code'];
				elseif($row['code_type'] === 'read')
					$obj['hash_read'] = $row['hash_code'];
				elseif($row['code_type'] === 'file')
					$obj['hash_file'] = $row['hash_code'];
			}
		}

		// Create the logger
		$logger = new Logger('my_logger');
		// Now add some handlers
		$logger->pushHandler(new StreamHandler(__DIR__.'/../../spread.log', Logger::DEBUG));
		// You can now use your logger
		$logger->info('Edit Page was visited.');

		$l = new layout('editView',$obj);
	}	
}
