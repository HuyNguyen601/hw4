<?php
namespace hw4\views;

class editView {

	public function __construct($obj){
		?> : <?=$obj['name']?>
		</h1>
        <link rel="stylesheet" type="text/css" href="src/styles/style.css">
		</head>
    	<body>
    		Edit Url:<a href="index.php?c=main&name=<?=$obj['hash_edit']?>"> index.php?c=main&name=<?=$obj['hash_edit']?></a> <br>
    		Read Url:<a href="index.php?c=main&name=<?=$obj['hash_read']?>"> index.php?c=main&name=<?=$obj['hash_read']?></a> <br>
    		File Url:<a href="index.php?c=main&name=<?=$obj['hash_file']?>"> index.php?c=main&name=<?=$obj['hash_file']?></a>  <br>
            <div id="edit"></div>
    	</body>
        <script type="text/javascript" src="spreadsheet.js"></script>
        <script>
            var str = "<? echo $obj['name']?>";
            var data = <? echo $obj['data']?>;
            spreadsheet2 = new Spreadsheet(str,"edit", data,{"mode":"write"}); //editable
            spreadsheet2.draw();
        </script>
		<?php
	}

 
}
