<?php
/*
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
 */
?>

<html>
<head>
<title>()works()</title>
<script>
function formu()
{
var request = new XMLHttpRequest();
request.onreadystatechange = function()
{
	document.getElementById("test").innerHTML = this.responseText;
};

request.open("GET", "form.php?name="+document.getElementById("name").value, true);
request.send(null);
}

</script>	
</head>
<body>
<p id = "test" onclick="formu()"> uWu Hello uWu </p>
<form action="">
<input type="text" id="name" name="name" style="display:inline-block;"></input>
<div style="width: 43px; height:33px; background-color: violet; display:inline-block;" onclick="formu()"></div>
</form>
<body>
</html>


