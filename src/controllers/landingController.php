<?php
namespace hw4\controllers;

use hw4\views\layout;

class landingController {

	public function __construct()
	{
		//$layout = (isset($_REQUEST['f']) && in_array($_REQUEST['f'], [
		//"html"])) ? $_REQUEST['f'] . "Layout" : "htmlLayout";
		$l = new layout('landingView');
	}
}
