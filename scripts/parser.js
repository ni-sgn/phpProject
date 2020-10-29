

//first attempt to write a parser
function enter_command(event)
{
	var input_string = document.getElementById('cli').value;	
	if(event.keyCode == 13)
	{
		event.preventDefault();
		//accepts either two words with spaces between them or one word with spaces
		var accepted_string = /(\S(\w)+(\s)*(\S)*)/i;
		console.log(accepted_string.exec(input_string));
		if(accepted_string.test(input_string) == true)
		{
			console.log("accepted");
			var input_parsed = accepted_string.exec(input_string);

			//grammar for acceptable expressions
			var before_whitespace = /(\S)*/i;
			var after_whitespace = /\s(\S)+(\s)*/i;
			var after_whitespace_modified = /\S(\w)*\S/i;
			//parsing
			var command_name = before_whitespace.exec(input_parsed[0]);
			console.log("frustrating");
			var command_input = after_whitespace.exec(input_parsed[0]);
			// so if there isn't non-whitespace characters after the whitespace the regex class is null
			// main branch
			if(command_input == null)
			{
				switch (command_name[0])
				{
					case "help":
						document.getElementById("cli").setAttribute("placeholder", "\'close\' to close the console\n\'list\' to list available pages");
						break;
					case "close":
						$(".console").hide();
						break;
					case "list":
						document.getElementById("cli").setAttribute("placeholder", "notes\\layout\nnotes\\styling");
						break;

					default:
						document.getElementById("cli").setAttribute("placeholder", "type 'help'");
				}
			}else{ //here the tree branches to detect the command with inputs
			// I had to modify this because couldn't extract the whitespace with substring for some reason!!!
			console.log("command_input :" + command_input[0]);
			var command_input_modified = after_whitespace_modified.exec(command_input[0]);
			switch(command_name[0])
			{
				case "cd":
					if (command_input_modified[0] == "home")
					{
						window.location = "./styling.html";
					}
					else
					{
						window.location = "./" + command_input_modified[0]+".html"; 
					}

				break;
				default:
				 console.log("going through");
			}
			
			}
			//end of the main branch
	
						
	
		document.getElementById('cli').value = "";
		}else
		{
			document.getElementById("cli").setAttribute("placeholder", "type 'help'");
		}

	}
}
