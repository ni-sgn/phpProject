<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'owo';
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if($conn->connect_error)
{
	die($conn->connect_error);
}

//basic database abstractions 
//gvian mivxvdi ro klasis dawera saqmes bevrad gaaadvilebda
class dbAbstract 
{
	private $db_host;
	private $db_username;
	private $db_password;
	private $db_name;
	private $conn;
	function __construct($host = 'localhost', $username = 'root', $password = '', $dname = 'owo')
	{
		$this->db_host = $host;
		$this->db_username = $username;
	        $this->db_password = $password;
		$this->db_name = $dname;
		$this->conn = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
		if($this->conn->connect_error)
		{
			die($this->conn->connect_error);
		}
	}
	function __destruct()
	{
		$this->conn->close();
	}

	
	function get_currentUserRow()
	{
		if(isset($_COOKIE['id']))
		{
			$query_selectUser = "select * from usr where usr_id=".$_COOKIE['id']; 

			$result = mysqli_query($this->conn, $query_selectUser);
			return mysqli_fetch_assoc($result);
		}
		else
			die("Cookie isn't set!");
	}

	function get_currentUserPath()
	{
		$query_selectPath = "select * from path where path_id=".$this->get_currentUserRow()['usr_path_id'];
		$result = mysqli_query($this->conn, $query_selectPath);
		return mysqli_fetch_assoc($result);
	}

	function get_currentUserType()
	{
		$query_selectType = "select * from usr_type where usr_type_id=".$this->get_currentUserRow()['usr_type_id'];
		$result = mysqli_query($this->conn, $query_selectType);
		return mysqli_fetch_assoc($result);
	}

	function get_allUsersRows()
	{
		$query_selectAllUsers = "select * from usr";
		$result = mysqli_query($this->conn, $query_selectAllUsers);
		return $result; 
	}
	function get_allPathRows()
	{
		$query_selectAllPath = "select * from path";
		$result = mysqli_query($this->conn, $query_selectAllPath);
		return $result;

	}
	function get_allUserTypeRows()
	{
		$query_selectAllUsrType = "select * from usr_type";
		$result = mysqli_query($this->conn, $query_selectAllUsrType);
		return $result;
	}

	function get_pathId($user_id)
	{
		$query_selectUserPath = "select usr_path_id from usr where usr_id = ".$user_id;
		$result = mysqli_query($this->conn, $query_selectUserPath);
		$fetched = mysqli_fetch_assoc($result);
	        return $fetched['usr_path_id'];	
	}

	function get_pathName($user_id)
	{
		$path_id = $this->get_pathId($user_id);
		$query_selectUserPath = "select path_name from path where path_id = ".$path_id;
		$result = mysqli_query($this->conn, $query_selectUserPath);
		$fetched = mysqli_fetch_assoc($result);
	        return $fetched['path_name'];	
	}

	function get_userName($user_id)
	{
		$query_selectName = "select username from usr where usr_id=".$user_id;
		$result = mysqli_query($this->conn, $query_selectName);
		$fetched = mysqli_fetch_assoc($result);
		return $fetched['username'];
	}
	function get_userPathId($user_id)
	{
		$query_selectPath = "select usr_path_id from usr where usr_id=".$user_id;
		$result = mysqli_query($this->conn, $query_selectPath);
		$fetched = mysqli_fetch_assoc($result);
		return $fetched['usr_path_id'];
	}

	function get_userPathName($user_id)
	{
		$query_selectPath = "select path_name from path where path_id=".$this->get_userPathId($user_id);
		$result = mysqli_query($this->conn, $query_selectPath);
		$fetched = mysqli_fetch_assoc($result);
		return $fetched['path_name'];
	}

	function get_userTypeId($user_id)
	{
		$query_selectType = "select usr_type_id from usr where usr_id=".$user_id;
		$result = mysqli_query($this->conn, $query_selectType);
		$fetched = mysqli_fetch_assoc($result);
		return $fetched['usr_type_id'];
	}

	function get_userTypeName($user_id)
	{
		$query_selectType = "select name from usr_type where usr_type_id=".$this->get_userTypeId($user_id);
		$result = mysqli_query($this->conn, $query_selectType);
		$fetched = mysqli_fetch_assoc($result);
		return $fetched['name'];
	}
	       	



	function get_postRows()
	{
		$query_selectPostRows = "select * from post";
		$result = mysqli_query($this->conn, $query_selectPostRows);

		return $result;
	}	

	function get_postAuthorId($post_id)
	{
		$query_selectPost = "select author_id from post where post_id=".$post_id;
		$result = mysqli_query($this->conn, $query_selectPost);
		$fetched = mysqli_fetch_assoc($result);
	       return $fetched['author_id'];	
	}

	function get_postBody($post_id)
	{	
		$query_selectPost = "select body from post where post_id=".$post_id;
		$result = mysqli_query($this->conn, $query_selectPost);
		$fetched = mysqli_fetch_assoc($result);
		return $fetched['body'];
	}

        
}

?>


