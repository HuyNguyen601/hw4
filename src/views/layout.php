<?php

namespace hw4\views;

use hw4\views\landingView;
use hw4\views\editView;
use hw4\views\readView;

class layout {

public function __construct($view,$name,$code){
	?>
	<!DOCTYPE html>
	<html>
    	<head><title>Homework 4</title>
			<h1><a href = "index.php"> Web Sheets</a><?php
			if ($view == 'landingView')
				$v = new landingView();
			else if ($view == 'editView')
				$v = new editView($name,$code);
			else $v = new readView();
    	?>
	</html><?php
	}
}
