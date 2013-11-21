<html>
<head><title>recipes+</title>
</head>
<body>
<h1>Recipes+</h1>

<?php include("header.php")?>

<div id="centeredmenu">
<ul>
	<li><A href=week_plan.php>Back</a></li>
</ul>
</div>
<br>
<?php
$meals = $_POST['meals'];
$db = new mysqli('localhost','root','mellon','recipes');
if($db->connect_errno >0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}
$N=count($meals);
for($i=0;$i<$N;$i++)
{
	$query="select * from contents where recipe=\"" . $meals[$i] . "\";";
	$results=$db->query($query) or die($db->error);
print "<div class=\"blocktext\">";
	while($row = $results->fetch_assoc()){
		echo  $row['ingredient'] . "</br>"; 
	}
	print "</div>";
}

$results->free();
$db->close();

?>
</body>
</html>
