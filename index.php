<?php
require __DIR__ . '/vendor/autoload.php';

use hw4\controllers\editController;
use hw4\controllers\readController;
use hw4\controllers\landingController;
use hw4\controllers\ApiController;
use hw4\controllers\fileController;

if (isset($_REQUEST['c']))
{
	if($_REQUEST['c'] == 'edit')
		$c = new editController();
	else if($_REQUEST['c'] == 'read')
		$c = new readController();
	else if($_REQUEST['c']=='api') 
		$c= new ApiController();
	else if ($_REQUEST['c'] == 'main')
		$c = new landingController();
	else if($_REQUEST['c'] == 'file')
		$c = new fileController();
}
else
	$c = new landingController();

