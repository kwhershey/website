<html>
<head>
<TITLE> Add Recipe</TITLE>
<h1>New Recipe</h1>
<?php include("header.php")?>

<div id="centeredmenu">
<ul>
	<li><A href=week_plan.php>Back</a></li>
	<li><A href=add_ingredients.php>New Ingredient</a></li>
</ul>
</div>
<br>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<SCRIPT language="javascript">
function addRow(tableID) {

	var table = document.getElementById(tableID);

	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);

	var colCount = table.rows[1].cells.length;

	for(var i=0; i<colCount; i++) {

		var newcell = row.insertCell(i);

		newcell.innerHTML = table.rows[1].cells[i].innerHTML;
		//alert(newcell.childNodes);
		switch(newcell.childNodes[0].type) {
			case "text":
				newcell.childNodes[0].value = "";
				break;
			case "checkbox":
				newcell.childNodes[0].checked = false;
				break;
			case "select-one":
				newcell.childNodes[0].selectedIndex = 0;
				break;
		}
	}
}

function deleteRow(tableID) {
	try {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;

		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[0];
			if(null != chkbox && true == chkbox.checked) {
				if(rowCount <= 2) {
					alert("Cannot delete all the rows.");
					break;
				}
				table.deleteRow(i);
				rowCount--;
				i--;
			}


		}
	}catch(e) {
		alert(e);
	}
}

function rows()
{
	$("#dataTable tr").each(function() {
		var ingr= $(this).find("td").eq(2).html();
		var prep= $(this).find("td").eq(3).val();
		var quant= $(this).find("td").eq(4).html();
		alert(prep);
	});
}
function DocumentReady()
{
	$("#divTest1").text("Hello, World!");
}
$(document).ready(DocumentReady);
</SCRIPT>
</HEAD>
<BODY>

<div id="divTest1"></div>
</br>
</br>
<form method="post" action="add_recipe_post.php">
<TABLE name="ingredients" id="dataTable" width="350px" align="center" border="0">
<TR>
<td></td>
<td>Ingredient</td>
<td>Preparation</td>
<td>Amount</td>
</tr>
<tr>
<td><input type="checkbox" name="chk"/></td>
<TD>
<SELECT name="ingredient">
<?php
$db = new mysqli('localhost','root','mellon','recipes');
if($db->connect_errno >0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

$query="select * from ingredients;";
if(!$results= $db->query($query)){
	die('There was an error running the query [' . $db->error . ']');
}

while($row = $results->fetch_assoc()){
	echo "<option value=\'" . $row['name'] . ">" . $row['name'] . " (" . $row['units'] . ")" . "</option>";
}
$results->free();
$db->close();

?>
</SELECT>
</TD>
<TD><INPUT type="text" name="prep"/></TD>
<TD><INPUT type="text" name="quantity"/></TD>
</TR>
</TABLE>

<INPUT type="button" value="Add Ingredient" onclick="addRow('dataTable')" />

<INPUT type="button" value="Remove Ingredient" onclick="deleteRow('dataTable')" />
<INPUT type="button" value="print" onclick="rows()" />
</br>
<input type="submit" value="Add Recipe!"/>
</form>
</BODY>
</HTML>
