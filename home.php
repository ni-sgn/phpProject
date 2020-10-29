<?php
require_once('server/db_connect.php');
$mydb = new dbAbstract();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>0(home)0</title>
		<link rel="stylesheet" href="styles/style.css" />
		<script src="scripts/jquery.min.js"></script>
		<script src="scripts/parser.js"></script>
		<script src="scripts/interactive.js"></script>
		<script src="scripts/xmlRegister.js"></script>
<script>
$(document).ready(function() {
    $("input[type='text']").attr('autocomplete', 'off');
});

$(document).ready(function($) {
	$(".prevdefault").click(function(event){
		event.preventDefault();
	});	
});

</script>
	</head>

<body>
<!--branch for authorized and unathorized users-->
	<?php
	if(isset($_COOKIE["id"]))
	{
		$user_id = $_COOKIE["id"];
        echo "		
	<!--Control System-->
		<div id='control'>

	<div class='console'>
		<textarea id='cli' placeholder='console://' onkeypress='enter_command(event)'></textarea>
	</div><!--End of console-->



	<nav id='taskbar'>
		<div class='taskbar_item' onclick='window.location = \"#\"'>
			<svg class='icon' width='1em' height='1em' viewBox='0 0 16 16' fill='red' xmlns='http://www.w3.org/2000/svg'>
  <path d='M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z'/>
  <path fill-rule='evenodd' d='M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
</svg>
		</div>
		<div class='taskbar_item extendable' onclick='kliku2()'>
			<svg class='icon' width='1em' height='1em' viewBox='0 0 16 16' fill='red' xmlns='http://www.w3.org/2000/svg'>
  <path fill-rule='evenodd' d='M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z'/>
  <path fill-rule='evenodd' d='M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l.418-.785-.419.785-5.169-2.756z'/>
</svg>
		</div>
		<div class='extended-content'>
			<ul>
				<li><a href='notes/layout.html'>ayout</a></li>
				<li><a href='notes/styling.html'>Styiling</a></li>
			</ul>
		</div>


		<div class='taskbar_item' onclick='kliku()'>
			<svg class='icon' width='1em' height='1em' viewBox='0 0 16 16' fill='red' xmlns='http://www.w3.org/2000/svg'>
  <path fill-rule='evenodd' d='M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm9.5 5.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm-6.354-.354L4.793 6.5 3.146 4.854a.5.5 0 1 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708z'/>
</svg>
		</div>";
		if($mydb->get_userTypeId($user_id) == 1)
		{	
echo "
		<div class='taskbar_item'  onclick='window.location = \"control_panel.php\"'>
			<svg width='1em' height='1em' viewBox='0 0 16 16' class='icon' fill='red' xmlns='http://www.w3.org/2000/svg'>
  <path fill-rule='evenodd' d='M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z'/>
  <path fill-rule='evenodd' d='M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z'/>
</svg>
		</div>";
		}

		echo " 
	</nav> <!--End of taskbar-->
	
	</div> <!--End of control-->
	";

echo "	
<!-- Start of wrapper-->
	<div id='wrapper'>
			<form method='post', action='server/logout.php'>	
				<input type='submit' value='Logout'/>
			</form>	

		     <form>
			<fieldset>
				<legend>Post</legend>
				<textarea name='post_text'></textarea>
				<input type='hidden' name='author' value=".$user_id." />
		    		<input type='submit' value='post' onclick='postu()' class='prevdefault'/>
				<p id='test'>go ahead</p>
			</fieldset>
		     </form>
		     
	<!---Start of Content's'--->
	<div id='contents'>";
	$rezo = $mydb->get_postRows();
	while($row_post = mysqli_fetch_assoc($rezo))
	{
		$post_id = $row_post['post_id'];
		$author_id = $row_post['author_id'];
		$author_name = $mydb->get_userName($author_id);
		$body = $mydb->get_postBody($post_id);
		echo "
			<div class='content'>
				<input type='text' placeholder='".$author_name."' readonly>
				<span>".$post_id."</span>
				<p class='info'>".$body."</p>
			</div>
			";

	}
		
echo "
	</div>
	<!--End of wrapper-->
	";



	}
	else{
		echo "
			<div id='wrapper'>
			<form class='login' action='server/login.php' method='post'>
			<fieldset>
			<legend>Login</legend>
			<p>email</p>
		      <input type='text' name='email'/>
			<p>password</p>
		      <input type='password' name='password'/>
		      <input type='submit' value='Proceed!' />
			</fieldset>
		      </form>";
		echo "<form class='register' method='post' >
			<fieldset>
		      <legend>Register</legend>
			<p>userName</p>
		      <input type='text' name='username'/>
			<p>email</p>
		      <input type='text' name='reg_email'/>
			<p>password</p>
		      <input type='password' name='reg_password'/>";

                $query_selectAll = "select * from path";
                $output_table = mysqli_query($conn, $query_selectAll);
		echo "<div style='display:flex;'>";

		echo "<div>";
		echo "<ul>";
		echo "<p>loadPath();</p>";
                while($row = mysqli_fetch_assoc($output_table))
		{
			echo "<label><li><input type='radio' name='path' value=".$row['path_id']." id='".$row['path_name']."'>
				<i>".$row['path_name']."<i></li></label>";
		}
		echo "</ul>";
		echo "</div>";



		$query_selectAll = "select * from affiliations";
                $output_table = mysqli_query($conn, $query_selectAll);
		echo "<div style='display:inline-block;'>";
		echo "<ul>";
		echo "<p>loadAffiliations();</p>";
                while($row = mysqli_fetch_assoc($output_table))
		{
			echo "<label><li><input type='checkbox' name='affils[]' value=".$row['affil_id']." id='".$row['affil_name']."'>
				<i>".$row['affil_name']."</i></li></label>";
		}
		echo "</ul>";
		echo "</div>";


		echo "</div>";



		echo   "<input type='submit' value='Proceed!' onclick='regu()' class='prevdefault'/>
			<p id = 'test' class='info'> >>> Merge With the Machine <<< </p>
			</fieldset>
		      </form>
			</div>
			<!--End of wrapper-->";
	}
         $conn->close();
	?>
	<!--End of branching-->





</body>
</html>
