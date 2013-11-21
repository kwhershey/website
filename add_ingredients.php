<html>
<head><title>recipes+</title>
</head>
<body>
<h1>Recipes+</h1>

<?php include("header.php")?>

<div id="centeredmenu">
<ul>
	<li><A href=recipes_database.php>Back</a></li>
</ul>
</div>
<br>

<form method="post" action="add_ingredient_post.php">
Ingredient to add: 
<input type="text" maxlength=100 name="ingredient"/> </br>
Units: 
<input type="text" maxlength=100 name="units"/> </br>
Store Section:
<input type="text" maxlength=100 name="section"/>  </br>

<input type="submit" value="Submit" />
</body>
</html>

