<?php
namespace hw4\controllers;
use hw4\views\layout;
use hw4\models\Model;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class readController 
{
	public function __construct()
	{
		// Create the logger
		$logger = new Logger('my_logger');
		// Now add some handlers
		$logger->pushHandler(new StreamHandler(__DIR__.'/../../spread.log', Logger::DEBUG));
		// You can now use your logger
		$logger->info('Read Page was visited.');


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
