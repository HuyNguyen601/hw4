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
    		<table id="table" border=1>
    			<tr id ="1st row">
    				<th></th>
    				<th style="min-width:1in;text-align:right;">A<button onclick=addCol(this)>+</button></th>
    			</tr>
    			<tr id = "2nd row">
    				<th style=" min-width:1.1in;text-align:right;">1<button onclick=addRow()>+</button></th>
    				<td></td>
    			</tr>

    		</table>
    	</body>
        <script>
            function addCol(obj)
            {
                
            }

            function addRow()
            {
                var table = document.getElementById("table");
                var row = table.insertRow(-1);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);

                cell1.style.minWidth = "1.1in";
                cell1.style.textAlign = "right";
                cell1.innerHTML = "<button onclick= deleteRow(this)>-</button>" +row.rowIndex.toString().bold()+"<button onclick=addRow()>+</button>";
            }

            function deleteRow(row)
            {
                var i = row.parentNode.parentNode.rowIndex;
                document.getElementById("table").deleteRow(i);
                for(var j=1; j< table.rows.length;j++)
                {
                    var minus='';
                    if(j!=1)
                        minus = '<button onclick= deleteRow(this)>-</button>';
                    var plus = '<button onclick=addRow()>+</button>';
                    table.rows[j].cells[0].style.minWidth = "1.1in";
                    table.rows[j].cells[0].style.textAlign = "right";
                    table.rows[j].cells[0].innerHTML =minus+j.toString().bold()+plus;
                }
            }
		</script>
		<?php
	}
}
