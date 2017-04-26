<?php
require __DIR__ . '/vendor/autoload.php';

use hw4\controllers\editController;
use hw4\controllers\readController;
use hw4\controllers\landingController;
use hw4\controllers\ApiController;

if (isset($_REQUEST['c']))
{
	if($_REQUEST['c'] == 'edit')
		$c = new editController();
	else if($_REQUEST['c'] == 'read')
		$c = new readController();
	else if($_REQUEST['c']=='api') $c= new ApiController();
}
else
	$c = new landingController();

