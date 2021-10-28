$(function() {
    
    $('#client_datatable').DataTable({
        "pagingType": "simple_numbers",
        "scrollX": true,
        "columnDefs": [
		   {"targets": 7, 'searchable':false, 'orderable':false},
           {"targets": 8, 'searchable':false, 'orderable':false}
		 ]
    });
    
    $('#add_client_popup_wrap').popup();
	$('#add_client_popup_open').click(function(){
        $('#add_client_popup_wrap').popup('show');
	});
    $('#add_close_popup').click(function(){
        $('#add_client_popup_wrap').popup('hide');
        
        $("#add_name").val("");
        $("#add_address").val("");
        $("#add_city").val("");
        $("#add_contact").val("");
        $("#add_email1").val("");
        $("#add_contactPay").val("");
        $("#add_email2").val("");
        $("#add_other1").val("");
        $("#add_email3").val("");
        $("#add_other2").val("");
        $("#add_email4").val("");
        
        $("#add_noClient").val("");
        $("#add_telephone1").val("");
        $("#add_telephone2").val("");
        $("#add_province").val("");
        $("#add_codePostal").val("");
        $("#add_pays").val("");
        
        $("#add_valideEmail1").prop("unchecked", true);
        $("#add_valideEmail2").prop("unchecked", true);
        $("#add_valideEmail3").prop("unchecked", true);
        $("#add_valideEmail4").prop("unchecked", true);
	});
    $('#add_cancel_popup').click(function(){
        $('#add_client_popup_wrap').popup('hide');
        
        $("#add_name").val("");
        $("#add_address").val("");
        $("#add_city").val("");
        $("#add_contact").val("");
        $("#add_email1").val("");
        $("#add_contactPay").val("");
        $("#add_email2").val("");
        $("#add_other1").val("");
        $("#add_email3").val("");
        $("#add_other2").val("");
        $("#add_email4").val("");
        
        $("#add_noClient").val("");
        $("#add_province").val("");
        $("#add_codePostal").val("");
        $("#add_pays").val("");
        $("#add_telephone1").val("");
        $("#add_telephone2").val("");
        $("#add_tauxHoraire").val("");
        
        $("#add_valideEmail1").prop("unchecked", true);
        $("#add_valideEmail2").prop("unchecked", true);
        $("#add_valideEmail3").prop("unchecked", true);
        $("#add_valideEmail4").prop("unchecked", true);
	});
    
    $('#edit_client_popup_wrap').popup();
    $('.box_wrap').on('click', '.edit_client_popup_open', function(){
        var id = $(this).data("id");
        
        $("#edit_name").val(clients[id].Name);
        $("#edit_address").val(clients[id].Address);
        $("#edit_city").val(clients[id].City);
        $("#edit_contact").val(clients[id].Contact);
        $("#edit_email1").val(clients[id].Email1);
        $("#edit_contactPay").val(clients[id].ContactPay);
        $("#edit_email2").val(clients[id].Email2);
        $("#edit_other1").val(clients[id].Other1);
        $("#edit_email3").val(clients[id].Email3);
        $("#edit_other2").val(clients[id].Other2);
        $("#edit_email4").val(clients[id].Email4);
        
        $("#edit_noClient").val(clients[id].noClient);
        $("#edit_province").val(clients[id].Province);
        $("#edit_codePostal").val(clients[id].CodePostal);
        $("#edit_pays").val(clients[id].Pays);
        $("#edit_telephone1").val(clients[id].Telephone1);
        $("#edit_telephone2").val(clients[id].Telephone2);
        $("#edit_tauxHoraire").val(clients[id].TauxHoraire);
        
        $("#edit_valideEmail1").prop("checked", clients[id].ValideEmail1);
        $("#edit_valideEmail2").prop("checked", clients[id].ValideEmail2);
        $("#edit_valideEmail3").prop("checked", clients[id].ValideEmail3);
        $("#edit_valideEmail4").prop("checked", clients[id].ValideEmail4);
        $("#edit_client_id").val(id);
        
        $('#edit_client_popup_wrap').popup('show');
	});
    $('#edit_close_popup').click(function(){
        $('#edit_client_popup_wrap').popup('hide');
	});
    $('#edit_cancel_popup').click(function(){
        $('#edit_client_popup_wrap').popup('hide');
	});
    
    $('#delete_client_popup_wrap').popup();
	$('.delete_client_popup_open').click(function(){
        var id = $(this).data("id");
        
        $("#delete_client_id").val(id);
        $('#delete_client_popup_wrap').popup('show');
	});
    $('#delete_close_popup').click(function(){
        $('#delete_client_popup_wrap').popup('hide');
	});
    $('#delete_cancel_popup').click(function(){
        $('#delete_client_popup_wrap').popup('hide');
	});

    $("#add_client_submit").click(function(){
        var canSubmit = true;
        var name = $("#add_name").val();
        var address = $("#add_address").val();
        var city = $("#add_city").val();
        var contact = $("#add_contact").val();
        var email1 = $("#add_email1").val();
        var contactPay = $("#add_contactPay").val();
        var email2 = $("#add_email2").val();
        var other1 = $("#add_other1").val();
        var email3 = $("#add_email3").val();
        var other2 = $("#add_other2").val();
        var email4 = $("#add_email4").val();

        $(".boder_red").removeClass("boder_red");

        if(!name){
            $("#add_name").addClass("boder_red");
            canSubmit = false;
        }
        if(!address){
            $("#add_address").addClass("boder_red");
            canSubmit = false;
        }
        if(!city){
            $("#add_city").addClass("boder_red");
            canSubmit = false;
        }
        if(!contact){
            $("#add_contact").addClass("boder_red");
            canSubmit = false;
        }
        if(!email1){
            $("#add_email1").addClass("boder_red");
            canSubmit = false;
        }
        if(!contactPay){
            $("#add_contactPay").addClass("boder_red");
            canSubmit = false;
        }
        if(!email2){
            $("#add_email2").addClass("boder_red");
            canSubmit = false;
        }
        if(other1 || email3){
            if(!other1){
                $("#add_other1").addClass("boder_red");
                canSubmit = false;
            }
            if(!email3){
                $("#add_email3").addClass("boder_red");
                canSubmit = false;
            }
        }
        if(other1 || email3){
            if(!other2){
                $("#add_other2").addClass("boder_red");
                canSubmit = false;
            }
            if(!email4){
                $("#add_email4").addClass("boder_red");
                canSubmit = false;
            }
        }

        if(canSubmit){
            
            if($("#add_valideEmail1").prop("checked")){
                $("#add_valide_email_input1").val(1);
            }
            else{
                $("#add_valide_email_input1").val(0);
            }
            if($("#add_valideEmail2").prop("checked")){
                $("#add_valide_email_input2").val(1);
            }
            else{
                $("#add_valide_email_input2").val(0);
            }
            if($("#add_valideEmail3").prop("checked")){
                $("#add_valide_email_input3").val(1);
            }
            else{
                $("#add_valide_email_input3").val(0);
            }
            if($("#add_valideEmail4").prop("checked")){
                $("#add_valide_email_input4").val(1);
            }
            else{
                $("#add_valide_email_input4").val(0);
            }
            
            $("#add_client_form").submit();
        }
    });
    
    $("#edit_client_submit").click(function(){
        var canSubmit = true;
        var name = $("#edit_name").val();
        var address = $("#edit_address").val();
        var city = $("#edit_city").val();
        var contact = $("#edit_contact").val();
        var email1 = $("#edit_email1").val();
        var contactPay = $("#edit_contactPay").val();
        var email2 = $("#edit_email2").val();
        var other1 = $("#edit_other1").val();
        var email3 = $("#edit_email3").val();
        var other2 = $("#edit_other2").val();
        var email4 = $("#edit_email4").val();
        
        $(".boder_red").removeClass("boder_red");

        if(!name){
            $("#edit_name").addClass("boder_red");
            canSubmit = false;
        }
        if(!address){
            $("#edit_address").addClass("boder_red");
            canSubmit = false;
        }
        if(!city){
            $("#edit_city").addClass("boder_red");
            canSubmit = false;
        }
        if(!contact){
            $("#edit_contact").addClass("boder_red");
            canSubmit = false;
        }
        if(!email1){
            $("#edit_email1").addClass("boder_red");
            canSubmit = false;
        }
        if(!contactPay){
            $("#edit_contactPay").addClass("boder_red");
            canSubmit = false;
        }
        if(!email2){
            $("#edit_email2").addClass("boder_red");
            canSubmit = false;
        }
        if(other1 || email3){
            if(!other1){
                $("#edit_other1").addClass("boder_red");
                canSubmit = false;
            }
            if(!email3){
                $("#edit_email3").addClass("boder_red");
                canSubmit = false;
            }
        }
        if(other2 || email4){
            if(!other2){
                $("#edit_other2").addClass("boder_red");
                canSubmit = false;
            }
            if(!email4){
                $("#edit_email4").addClass("boder_red");
                canSubmit = false;
            }
        }
        
        if(canSubmit){
            
            if($("#edit_valideEmail1").prop("checked")){
                $("#edit_valide_email_input1").val(1);
            }
            else{
                $("#edit_valide_email_input1").val(0);
            }
            if($("#edit_valideEmail2").prop("checked")){
                $("#edit_valide_email_input2").val(1);
            }
            else{
                $("#edit_valide_email_input2").val(0);
            }
            if($("#edit_valideEmail3").prop("checked")){
                $("#edit_valide_email_input3").val(1);
            }
            else{
                $("#edit_valide_email_input3").val(0);
            }
            if($("#edit_valideEmail4").prop("checked")){
                $("#edit_valide_email_input4").val(1);
            }
            else{
                $("#edit_valide_email_input4").val(0);
            }
            
            $("#edit_client_form").submit();
        }
    });
    
    $("#delete_client_submit").click(function(){
        $("#delete_client_form").submit();
    });
});
