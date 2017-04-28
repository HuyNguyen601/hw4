<?php
namespace hw4\views;

use hw4\views\layout;
use hw4\models\Model;
class readView {

	public function __construct($obj){
		?> : <?=$obj['name']?>
		</h1>
        <link rel="stylesheet" type="text/css" href="src/styles/style.css">
		</head>
    	<body>
    		File Url:<a href="index.php?c=main&name=<?=$obj['hash_file']?>"> index.php?c=main&name=<?=$obj['hash_file']?></a>  <br>
            <div id="view"></div>
    	</body>
        <script type="text/javascript" src="spreadsheet.js"></script>
        <script>
            var str = "<? echo $obj['name']?>";
            var data = <? echo $obj['data']?>;
            console.log(data);
            spreadsheet2 = new Spreadsheet(str,"view",data);
            spreadsheet2.draw();
        </script>
		<?php
	}

 
}
