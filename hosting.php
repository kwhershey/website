<html>
<link rel="stylesheet" href="mystyle.css">
<head><title>Hosting</title>
</head>
<body>
<h1>Hosting</h1>

<?php include("header.php")?>

<div id="centeredmenu">
<ul>
	<li><A href=upform_hosting.html>Upload</a></li>
</ul>
</div>
<br>
<br>
<?php
$dir=opendir("hosting/");
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
print "<div class=\"blocktext\">";
foreach ($files as $file)
	print "<A href=\"hosting/$file\">$file</a><br>";
print "</div>";
?>	
<p>
Care to share? <A href=upform_hosting.html>Upload a file</a>
</p>

</body>
</html>
