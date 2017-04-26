<?php

namespace hw4/views/layouts;

class Layout {

public function htmlLayout($view){
	?>
	<!DOCTYPE html>
	<html>
    	<head><title>Homework 3</title>
			<h1><a href = "index.php"> Web Sheets</a></h1>
		</head>
    	<body>
    	<?php
			$v = new View();
    		$v->$view();
    	?>
    	</body>
	</html><?php
}
}
