<?php
require_once('db_connect.php');

echo $_POST['edit_type'];
echo $_POST['edit_path'];







	if(isset($_POST['edit_username']) && isset($_POST['edit_email'])  && isset($_POST['edit_path']) && isset($_POST['edit_password'])   && isset($_POST['edit_type']))
	{

		if( $_POST['edit_username'] == "" || $_POST['edit_email'] == ""  || $_POST['edit_path'] == "" ||  $_POST['edit_password'] == ""  || $_POST['edit_type'] == "" )
		{
			die("Empty string not accepted!");
		}
		else{
	         	$query_updateUser =  "update usr set email='".$_POST['edit_email']."',username='".$_POST['edit_username']."',password='".$_POST['edit_password']."',usr_type_id=".$_POST['edit_type'].",usr_path_id=".$_POST['edit_path']." where usr_id=".$_POST['usr_id'];		
			mysqli_query($conn, $query_updateUser);
			echo "succesfully edited!";
			echo $conn->error;
		}
	}else
	{
		die("some kind of error");
	}
	$conn->close();	



?>
