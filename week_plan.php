<html>
<head><title>recipes+</title>
</head>
<body>
<h1>Recipes+</h1>

<?php include("header.php")?>

<div id="centeredmenu">
<ul>
	<li><A href=add_ingredients.php>New Ingredient</a></li>
	<li><A href=add_recipe.php>New Recipe</a></li>
</ul>
</div>
<br>


<form method="post" action="week_plan_post.php">
<?php
$db = new mysqli('localhost','root','mellon','recipes');
if($db->connect_errno >0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

$query="select distinct recipe from contents;";
if(!$results= $db->query($query)){
	die('There was an error running the query [' . $db->error . ']');
}


print "<div class=\"checkboxes\">";

while($row = $results->fetch_assoc()){
	echo "<input type=\"checkbox\" name=\"meals[]\" value=\"" . $row['recipe'] . "\"/> " . $row['recipe']. "</br>";
}
print "</div>";
?>
<input type="submit" value="Submit" />
</form>


</body>
</html>
