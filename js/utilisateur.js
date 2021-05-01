$(function() {
    
    var oTable = $('#user_datatable').DataTable({
        "pagingType": "simple_numbers",
        "scrollX": true,
        "columnDefs": [
           {"targets": 2, 'searchable':false, 'orderable':true},
           {"targets": 3, 'searchable':false, 'orderable':true},
		   {"targets": 4, 'searchable':false, 'orderable':false},
           {"targets": 5, 'searchable':false, 'orderable':false}
		 ]
    });
    
    $('#add_user_popup_wrap').popup();
	$('#add_user_popup_open').click(function(){
        $('#add_user_popup_wrap').popup('show');
	});
    $('#add_close_popup').click(function(){
        $('#add_user_popup_wrap').popup('hide');
        
        $("#add_username").val("");
        $("#add_email").val("");
        $("#add_password").val("");
        $("#add_confirmation").val("");
        $("#add_check_admin").prop("unchecked", true);
	});
    $('#add_cancel_popup').click(function(){
        $('#add_user_popup_wrap').popup('hide');
        
        $("#add_username").val("");
        $("#add_email").val("");
        $("#add_password").val("");
        $("#add_confirmation").val("");
        $("#add_check_admin").prop("unchecked", true);
	});
    
    $('#edit_user_popup_wrap').popup();
	$('.edit_user_popup_open').click(function(){
        var id = $(this).data("id");
        
        $("#edit_user_id").val(id);
        $("#edit_username").val(users[id].UserName);
        $("#edit_email").text(users[id].Email);
        $("#edit_check_admin").prop((users[id].IsAdmin ? "checked" : "unchecked"), true);

        $('#edit_user_popup_wrap').popup('show');
	});
    $('#edit_close_popup').click(function(){
        $('#edit_user_popup_wrap').popup('hide');
	});
    $('#edit_cancel_popup').click(function(){
        $('#edit_user_popup_wrap').popup('hide');
	});
    
    $('#delete_user_popup_wrap').popup();
	$('.delete_user_popup_open').click(function(){
        var id = $(this).data("id");
        
        $("#delete_user_id").val(id);
        $('#delete_user_popup_wrap').popup('show');
	});
    $('#delete_close_popup').click(function(){
        $('#delete_user_popup_wrap').popup('hide');
	});
    $('#delete_cancel_popup').click(function(){
        $('#delete_user_popup_wrap').popup('hide');
	});

    $("#add_user_submit").click(function(){
        var canSubmit = true;
        var username = encode($("#add_username").val());
        var email = encode($("#add_email").val());
        var password = encode($("#add_password").val());
        var confirmation = encode($("#add_confirmation").val());

        $(".boder_red").removeClass("boder_red");

        if(!username){
            $("#add_username").addClass("boder_red");
            canSubmit = false;
        }
        if(!email){
            $("#add_email").addClass("boder_red");
            canSubmit = false;
        }
        if(!password){
            $("#add_password").addClass("boder_red");
            canSubmit = false;
        }
        if(!confirmation || (password != confirmation)){
            $("#add_confirmation").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            var admin = encode('0');
            if($("#add_check_admin").prop("checked")){
                admin = encode('1');
            }
            
            $.ajax({
				url : "../action/HomeController.php",
				data : { 
                    task : 'add_user',
                    username : username,
                    email : email,
                    password : sha256(password),
                    confirmation : sha256(confirmation),
                    admin : admin
                },
				type: 'POST',
				success : function(data) {			
					window.location.reload();
				}
			});
        }
    });
    
    $("#edit_user_submit").click(function(){
        var canSubmit = true;
        var username = $("#edit_username").val();

        $(".boder_red").removeClass("boder_red");

        if(!username){
            $("#edit_username").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            if($("#edit_check_admin").prop("checked")){
                $("#edit_admin").val(1);
            }
            else{
                $("#edit_admin").val(0);
            }
            $("#edit_user_form").submit();
        }
    });
    
    $("#delete_user_submit").click(function(){
        $("#delete_user_form").submit();
    });
    
    function encode(str) {
        return str;
    }
});
