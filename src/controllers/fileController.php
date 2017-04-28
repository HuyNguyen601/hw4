<?php
namespace hw4\controllers;
use hw4\views\fileView;
use hw4\models\Model;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class fileController 
{
	public function __construct()
	{
		// Create the logger
		$logger = new Logger('my_logger');
		// Now add some handlers
		$logger->pushHandler(new StreamHandler(__DIR__.'/../../spread.log', Logger::DEBUG));
		// You can now use your logger
		$logger->info('File Page was visited.');
		if(isset($_GET['code']))
			$code = $_GET['code'];
		$model = new Model();
		$result = $model->getAll($code);
		foreach($result as $row)
		{
			$obj['name'] = $row['sheet_name'];
			$obj['sheet_id'] = $row['sheet_id'];
			$obj['data'] = $row['sheet_data'];
		}
		$v = new fileView($obj);
	}
}
