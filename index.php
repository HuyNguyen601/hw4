<?php
require __DIR__ . '/vendor/autoload.php';

use hw4\controllers\editController;
use hw4\controllers\readController;
use hw4\controllers\landingController;

if (isset($_REQUEST['c']))
{
	if($_REQUEST['c'] == 'edit')
		$c = new editController();
	else
		$c = new readController();
}
else
	$c = new landingController();

