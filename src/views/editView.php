<?php
namespace hw4\views;

class editView {

	public function __construct(){
		?> : <?=$_POST['name']?>
		</h1>
		<style>
		table, th, td {
    	border: 1px solid black;
		}
		</style>
		</head>
    	<body>
    		Edit Url: <br>
    		Read Url: <br>
    		File Url: <br>
            <div id="edit"></div>
    	</body>
        <script type="text/javascript" src="spreadsheet.js"></script>
        <script>
            spreadsheet2 = new Spreadsheet("edit", 
               [[""]], {"mode":"write"}); //editable
            spreadsheet2.draw();
        </script>
		<?php
	}
}
