<?php
require_once('db_connect.php');
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST['body']) && isset($_POST['author_id']))
	{
		if($_POST['body'] != "")
		{
			$query_insertPost = "insert into post(author_id, body) values (".$_POST['author_id'].",'".$_POST['body']."')";
			if($conn->query($query_insertPost) === TRUE)
			{
				echo "Post has been succesfully added!";
			}else
			{
				echo "Can't insert this post";
			}
		}else
		{
			die("Can't accept an empty string!");
		}
	}
?>
