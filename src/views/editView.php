<?php
namespace hw4\views;

class editView {

	public function __construct(){
		?> : <?=$_POST['name']?>
		</h1>
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
		</head>
    	<body>
    		Edit Url: <br>
    		Read Url: <br>
    		File Url: <br>
            <div id="edit"></div>
			<div id="test"></div>
    	</body>
        <script type="text/javascript" src="spreadsheet.js"></script>
        <script>
            spreadsheet2 = new Spreadsheet("edit", 
               [[""]], {"mode":"write"}); //editable
            spreadsheet2.draw();
        </script>
		<?php
        echo var_dump($_REQUEST);
	}
}
