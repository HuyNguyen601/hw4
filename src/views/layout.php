<?php

namespace hw4\views;

use hw4\views\landingView;
use hw4\views\editView;
use hw4\views\readView;

class layout {

public function __construct($view){
	?>
	<!DOCTYPE html>
	<html>
    	<head><title>Homework 4</title>
			<h1><a href = "index.php"> Web Sheets</a></h1>
		</head>
    	<body>
    	<?php
			if ($view == 'landingView')
				$v = new landingView();
			else if ($view == 'editView')
				$v = new editView();
			else $v = new readView();
    	?>
    	</body>
	</html><?php
	}
}
