$(function() {
    
    $("#add_user_submit").click(function(){
        var canSubmit = true;
        var username = $("#username").val();
        var password = $("#password").val();

        $(".boder_red").removeClass("boder_red");

        if(!username){
            $("#username").addClass("boder_red");
            canSubmit = false;
        }
        if(!password){
            $("#password").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            $.ajax({
				url : "../action/HomeController.php",
				data : { 
                    task : encode('login_task'),
                    username : encode(username),
                    password : encode(password)
                },
				type: 'POST',
				success : function(data) {			
					window.location.reload();
				}
			});
        }
    });
    
    function encode(str) {
        var encoded = "";
        for (let i = 0; i < str.length; i++) {
            var a = str.charCodeAt(i);
            var b = a ^ 20;
            encoded = encoded+String.fromCharCode(b);
        }
        return encoded;
    }
});
