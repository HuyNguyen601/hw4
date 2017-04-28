<?php

namespace hw4\views;

use hw4\views\landingView;
use hw4\views\editView;
use hw4\views\readView;

class layout {

public function __construct($view,$obj){
	?>
	<!DOCTYPE html>
	<html>
    	<head><title>Homework 4</title>
			<h1><a href = "index.php"> Web Sheets</a><?php
			if ($view == 'landingView')
				$v = new landingView();
			else if ($view == 'editView')
				$v = new editView($obj);
			else if($view == 'readView')
				$v = new readView($obj);
			else if($view=='fileView')
				$v = new fileView($obj);
    	?>
	</html><?php
	}
}
