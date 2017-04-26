function addCol()
{
    var table = document.getElementById("table");
    for(var i =0; i<table.rows.length;i++)
    {
        cell = table.rows[i].insertCell(-1);
        var num = cell.cellIndex +64;
        var char = '&#'+num;
        if(i==0)
        {
            cell.style.minWidth = "1in";
            cell.style.textAlign ="right";
            cell.innerHTML ="<button onclick=deleteCol(this)>-</button>"+char.bold()+"<button onclick=addCol()>+</button>";
        }
    }  
}

function deleteCol(cell)
{
    var table = document.getElementById("table");
    var index = cell.parentNode.cellIndex;
    for(var i =0; i<table.rows.length;i++)
    {
        table.rows[i].deleteCell(index);
        for(var j=1;j<table.rows[0].cells.length;j++)
        {
            if(i==0)
            {
                var cell = table.rows[0].cells[j];
                var minus='';
                if(j!=1)
                    minus = "<button onclick=deleteCol(this)>-</button>";
                plus = "<button onclick=addCol()>+</button>";
                var num = cell.cellIndex +64;
                var char = '&#'+num;
                cell.innerHTML=minus+char.bold()+plus;
            }
        }
    }
}

function addRow()
{
    var table = document.getElementById("table");
    var row = table.insertRow(-1);

    var cell1 = row.insertCell(0);
    for(var i=1;i<table.rows[0].cells.length;i++)
    {
        row.insertCell(i);
    }

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

            /* <table id="table" border=1>
                <tr id ="1st row">
                    <th></th>
                    <th style="min-width:1in;text-align:right;">A<button onclick=addCol()>+</button></th>
                </tr>
                <tr id = "2nd row">
                    <th style=" min-width:1.1in;text-align:right;">1<button onclick=addRow()>+</button></th>
                    <td></td>
                </tr>

            </table>
            */