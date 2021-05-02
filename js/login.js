$(function() {
    
    $("#login_submit").click(function(){
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
            $("#username_output").val(sha256(username));
            $("#password_output").val(sha256(password));
            $("#login_submit_form").submit();
        }
    });
});
