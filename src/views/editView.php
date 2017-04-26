<?php
namespace hw4\views;

class editView {

	public function __construct(){
		?> : <?=$_POST['name']?>
		</h1>
		</head>
    	<body>
    		Edit Url: <br>
    		Read Url: <br>
    		File Url: <br>
            <div id="edit"></div>
			<div id="test"></div>
    	</body>
        <script type="text/javascript" src="spreadsheet.js?v=1"></script>
        <script>
            spreadsheet2 = new Spreadsheet("edit", 
               [[""]], {"mode":"write"}); //editable
            spreadsheet2.draw();
        </script>
		<?php
        die(var_dump($_REQUEST));
	}
}
