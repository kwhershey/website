<html>
<head><title>recipes+</title>
</head>
<body>
<h1>Recipes+</h1>

<?php include("header.php")?>

<div id="centeredmenu">
<ul>
	<li><A href=add_ingredients.php>New Ingredient</a></li>
</ul>
</div>
<br>


<select size='10' name='recipeList' multiple='no' >
<?php
$db = new mysqli('localhost','root','mellon','recipes');
if($db->connect_errno >0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

$query="select distinct recipe from contents;";
if(!$results= $db->query($query)){
	die('There was an error running the query [' . $db->error . ']');
}

while($row = $results->fetch_assoc()){
	echo "<option value=\'" . $row['recipe'] . ">" . $row['recipe'] . "</option>";
}
?>
</select>


<select size='10' name='ingredientsList' multiple='no'> 
<?php
$db = new mysqli('localhost','root','mellon','recipes');
if($db->connect_errno >0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

$query="select distinct name from ingredients;";
if(!$results= $db->query($query)){
	die('There was an error running the query [' . $db->error . ']');
}

while($row = $results->fetch_assoc()){
	echo "<option value=\'" . $row['name'] . ">" . $row['name'] . "</option>";
}
$results->free();
$db->close();

?>
</select>
</body>
</html>
