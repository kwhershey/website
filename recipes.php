<html>
<head><title>recipes</title>
</head>
<body>
<h1>Recipes</h1>

<?php include("header.php")?>

<div id="centeredmenu">
<ul>
	<li><A href=upform_recipes.html>Upload</a></li>
</ul>
</div>
<br>
<br>
<?php
$dir=opendir("docs/recipes");
$files=array();
while (($file=readdir($dir)) !== false)
{
	if ($file != "." and $file != ".." and $file != "index.php")
	{
		array_push($files, $file);
	}
}

closedir($dir);
sort($files,SORT_STRING | SORT_FLAG_CASE);
print "<div class=\"blocktext\">";
foreach ($files as $file)
	print "<A href=\"docs/recipes/$file\">$file</a><br>";
	
print "</div>";
?>


<br>
<br>
<br>
<br>
<p>
Care to share? <A href=upform_recipes.html>Upload a file</a>
</p>

</body>
</html>
