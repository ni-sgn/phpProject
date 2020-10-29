<?php
require_once('server/db_connect.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>0(Control_Panel)0</title>
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
	<!--Control System-->
		<div id="control">

	<div class="console">
		<textarea id="cli" placeholder="console://" onkeypress="enter_command(event)"></textarea>
	</div><!--End of console-->



	<nav id="taskbar">
		<div class="taskbar_item" onclick="window.location = 'home.php'">
			<svg class="icon" width="1em" height="1em" viewBox="0 0 16 16" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
</svg>
		</div>
		<div class="taskbar_item extendable" onclick="kliku2()">
			<svg class="icon" width="1em" height="1em" viewBox="0 0 16 16" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
  <path fill-rule="evenodd" d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l.418-.785-.419.785-5.169-2.756z"/>
</svg>
		</div>
		<div class="extended-content">
			<ul>
				<li><a href="notes/layout.html">Layout</a></li>
				<li><a href="notes/styling.html">Styiling</a></li>
			</ul>
		</div>


		<div class="taskbar_item" onclick="kliku()">
			<svg class="icon" width="1em" height="1em" viewBox="0 0 16 16" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm9.5 5.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm-6.354-.354L4.793 6.5 3.146 4.854a.5.5 0 1 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708z"/>
</svg>
		</div>
		<div class="taskbar_item"  onclick="window.location = '#'">
		<svg width='1em' height='1em' viewBox='0 0 16 16' class='icon' fill='red' xmlns='http://www.w3.org/2000/svg'>
  <path fill-rule='evenodd' d='M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z'/>
  <path fill-rule='evenodd' d='M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z'/>
</svg>
	
		</div>
	</nav> <!--End of taskbar-->
	
	</div> <!--End of control-->
<!-- Start of wrapper-->
	<div id="wrapper">



	<!--branch for authorized and unathorized users-->
	<?php
	if(isset($_COOKIE["id"]))
	{
		echo "<form method='post', action='server/logout.php'>
		     <input type='submit' value='Logout'/>
		     <input type='text' style='display: none;' name='logout' value='logout' />
		     </form>";
		$conn->close();
		$mydb = new dbAbstract;
		$output = $mydb->get_currentUserRow();
		if($output['usr_type_id'] == 1)
		{
		echo "
			<form>
			<fieldset>
			<legend>modifyUser(...);</legend>	


			<label>select_to_modify</label>
			<select name='usr_id'>
			";
			$rezo = $mydb->get_allUsersRows();
			while($row_user = mysqli_fetch_assoc($rezo))
			{
				echo " <option value=".$row_user['usr_id'].">".$row_user['usr_id']."</option>";
			}

                echo "  </select>

                        <label for='edit_username'>username_new</label>
                        <input type='text' name='edit_username'/>
			
			<label for='edit_email'>email_new</label>
                        <input type='text' name='edit_email'/>

			<label for='edit_password'>password_new</label>
                        <input type='text' name='edit_password'/>

			<label>path_new</label>
			<select name='edit_path'>
			";

			$rezo = $mydb->get_allPathRows();
			while($row_path = mysqli_fetch_assoc($rezo))
			{
				echo "<option value=".$row_path['path_id'].">".$row_path['path_name']."</option>";
			}	
		echo "	
			</select>
                         
			<label>title_new</label>
			<select name='edit_type'>
			";
			$rezo = $mydb->get_allUserTypeRows();
			while($row_type = mysqli_fetch_assoc($rezo))
			{
				echo "<option value=".$row_type['usr_type_id'].">".$row_type['name']."</option>";
			}
		echo "
			</select>
                        <input type='submit' value='edit' onclick='editu()' class='prevDefault'>
			<p id='test'><<< MODIFY USER >>></p>
			</fieldset>
			</form>

		     "; //end of editing form





			
			echo "  <div class='list_users'>
				<table>  	
					 <tr>
						<th>userId</th>
						<th>userName</th>
					        <th>email</th>
                                                <th>password</th>
                                                <th>userType</th>
						<th>userPath</th>
					 </tr>
			 	";

		        $rezo = $mydb->get_allUsersRows();	
			$type = $mydb->get_currentUserType();
			$path = $mydb->get_currentUserPath();
			while( $row_usrs = mysqli_fetch_assoc($rezo))
			{	
			echo "
					 <tr>
					 <td><input type='text' value=".$row_usrs['usr_id']." readonly></td>
                                         <td><input type='text' value=".$row_usrs['username']." readonly></td>
                          		 <td><input type='text' value=".$row_usrs['email']." readonly></td>
					 <td><input type='text' value=".$row_usrs['password']." readonly></td>
					 <td><input type='text' value=".$type['name']." readonly>
					 <td><input type='text' value=".$mydb->get_pathName($row_usrs['usr_id'])."></td>
					 </tr>
			     ";
	
			}
				
			echo "</table></div>";
			
			
			
		}
	}else{
		
		die("no cookie!");
		}
         ?>
	<!--End of branching-->




	</div><!--End of wrapper-->
</body>
</html>
