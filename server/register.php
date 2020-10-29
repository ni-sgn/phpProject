<?php
require_once('db_connect.php');

echo $_POST['path_id'];
foreach($_POST['affils'] as $a)
	echo $a; 

	if(isset($_POST['username']) && isset($_POST['reg_email'])  && isset($_POST['path_id']) && isset($_POST['reg_password'])   && isset($_POST['affils']))
	{

		if( $_POST['username'] == "" || $_POST['reg_email'] == ""  || $_POST['path_id'] == "" ||  $_POST['reg_password'] == ""  || $_POST['affils'] == "" )
		{
			die("You must fill every form!");
		}
		else{
	         	$query_insertUser =  "INSERT into usr(email, username, password, usr_type_id, usr_path_id) values('".$_POST['reg_email']."','".$_POST['username']."','".$_POST['reg_password']."','2','".$_POST['path_id']."')";		
			mysqli_query($conn, $query_insertUser);
			$query_selectMaxId = "select max(usr_id) from usr";
			$maxId = mysqli_fetch_array(mysqli_query($conn, $query_selectMaxId));
			foreach($_POST['affils'] as $a)
			{
				$query_usrAffils = "insert into usr_affils values('".$maxId[0]."','".$a."')";
				mysqli_query($conn, $query_usrAffils);
			}
			echo "You are now part of US!";
			echo $conn->error;
		}
	}else
	{
		die("some kind of error");
	}
	$conn->close();	
	
?>	

