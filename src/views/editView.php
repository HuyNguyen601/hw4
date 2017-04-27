<?php
namespace hw4\views;

class editView {

	public function __construct($obj){
		?> : <?=$obj['name']?>
		</h1>
        <link rel="stylesheet" type="text/css" href="src/styles/style.css">
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
            var str = "<? echo $obj['name']?>";
            spreadsheet2 = new Spreadsheet(str,"edit", 
               [[""]], {"mode":"write"}); //editable
            spreadsheet2.draw();
        </script>
		<?php
	}

 
}
