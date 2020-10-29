function regu(){

	var affils = new Array();
        $("input[name='affils[]']:checked").each(function(i)
		{
			affils.push($(this).val());
		});

  $.post("server/register.php",
  {
    username:  $('input[name="username"]').val(),
    reg_email: $('input[name="reg_email"]').val(),
    reg_password: $('input[name="reg_password"]').val(),
    path_id: $('input[name="path"]:checked').val(),	  
    affils:  affils,


  },
  function(data, status){
     $("#test").html(data);
  });

}

function editu()
{
  $.post("server/edit.php",
  {
    usr_id: $('select[name="usr_id"]').val(),
    edit_username:  $('input[name="edit_username"]').val(),
    edit_email: $('input[name="edit_email"]').val(),
    edit_password: $('input[name="edit_password"]').val(),
    edit_type: $('select[name="edit_type"]').val(),
    edit_path: $('select[name="edit_path"]').val(),

  },
  function(data, status){
     $("#test").html(data);
  });

}

function postu()
{
	$.post("server/post.php",
		{
			body: $('textarea[name="post_text"]').val(),
			author_id : $('input[name="author"]').val(),
		},
	function(data, status){
		$("#test").html(data);
	});

}

