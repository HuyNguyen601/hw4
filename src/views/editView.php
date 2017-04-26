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
            <div id="edit">
    		<!-- <table id="table" border=1>
    			<tr id ="1st row">
    				<th></th>
    				<th style="min-width:1in;text-align:right;">A<button onclick=addCol()>+</button></th>
    			</tr>
    			<tr id = "2nd row">
    				<th style=" min-width:1.1in;text-align:right;">1<button onclick=addRow()>+</button></th>
    				<td></td>
    			</tr>

    		</table>
            -->
            </div>
    	</body>
        <script type="text/javascript" src="spreadsheet.js"></script>
        <script>
            spreadsheet2 = new Spreadsheet("edit", 
               [["Tom"],["Sally"]], {"mode":"write"}); //editable
            spreadsheet2.draw();
        </script>
		<?php
	}
}
