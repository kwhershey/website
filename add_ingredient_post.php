<html>
<?php
$ingr=$_POST["ingredient"];
$units= $_POST["units"];
$sect=$_POST["section"];

$db = new mysqli('localhost','root','mellon','recipes');
if($db->connect_errno >0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

$query="insert into ingredients (name,units,section) values ('$ingr' ,' $units' ,' $sect' )";
$db->query($query) or die($db->error);


		print "<meta http-equiv=\"refresh\" content=\".5;url=recipes_database.php\">";

$results->free();
$db->close();

?>
</html>
