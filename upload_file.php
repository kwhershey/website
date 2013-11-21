<html>
<body>
<br>
<?php
print "<A href=".$_POST["caller"].">Return to ".$_POST["caller"]."!</a>";
?>
<br>
<br>
<br>
<?php
if ($_FILES["file"]["error"] > 0)
{
	echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else
{
	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	echo "Type: " . $_FILES["file"]["type"] . "<br>";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . "kB<br>";
	echo "Temp Stored in: " . $_FILES["file"]["tmp_name"] . "<br><br>";

	if (file_exists($argv[2] . $_FILES["file"]["name"]))
	{
		echo $_FILES["file"]["name"] . " already exists. ";
		print "<h2> Upload Failed! </h2>";
	}
	else
	{
		
		print "<meta http-equiv=\"refresh\" content=\".5;url=".$_POST["caller"]."\">";
		move_uploaded_file($_FILES["file"]["tmp_name"],
				$_POST["path"] . $_FILES["file"]["name"]);
		echo "Stored in: " . $_POST["path"] . $_FILES["file"]["name"];
		print "<h2>Thank you for your submission!</h2>";
	}
}
?>
