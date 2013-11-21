<html>
<link rel="stylesheet" href="mystyle.css">
<head><title>Structures</title>
</head>
<body>
<h1>Structures</h1>

<?php include("header.php")?>

<div id="centeredmenu">
<ul>
<li><A href=classes.php>Back</a></li>
<li><A href="https://ay13.moodle.umn.edu/course/view.php?id=7026">Moodle Page</a></li>
</ul>
</div>
<?php
$dir=opendir("docs/School/structures");
$files=array();
while (($file=readdir($dir)) !== false)
{
	if ($file != "." and $file != ".." and $file != "index.php")
	{
		array_push($files, $file);
	}
}

closedir($dir);
sort($files);
print "<p>";
foreach ($files as $file)
	print "<A href=\"docs/School/structures/$file\">$file</a><br>";
print "</p>"	
	
?>

<br><br>
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
<input type="hidden" name="path" value="docs/School/structures/">
<input type="hidden" name="caller" value="structures.php">
</form>
<!--
<form action="upload_file_structures.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
-->
</body>
</html>
