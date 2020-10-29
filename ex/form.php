<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'uwu';
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if($conn->connect_error)
{
	die($conn->connect_error);
}
//if(isset($_GET['name']))
//{
//	print("<p>round 1 completed</p>");
//}else
//{
//	print("cant find anything in this form!");
//}

	if(isset($_GET['name']))
	{
		$input=$_GET['name'];	
		if($input == "")
		{
			print("<p>it's an empty string my uwu</p>");
		}
		else{
			$worked = $conn->query(" insert into artists(name) values('".$_GET['name']."')");
			echo "<p>it worked</p>";
			echo $conn->error;
		}
	}else
	{
		die("some kind of error");
	}
		
	
?>	
</body>
</html>
