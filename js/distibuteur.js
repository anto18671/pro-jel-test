$(function() {
    
    $('#distributor_datatable').DataTable({
        "pagingType": "simple_numbers",
        "scrollX": true,
        "columnDefs": [
		   {"targets": 3, 'searchable':false, 'orderable':false},
           {"targets": 4, 'searchable':false, 'orderable':false}
		 ]
    });
    
    $('#add_distributor_popup_wrap').popup();
	$('#add_distributor_popup_open').click(function(){
        $('#add_distributor_popup_wrap').popup('show');
	});
    $('#add_close_popup').click(function(){
        $('#add_distributor_popup_wrap').popup('hide');
        
        $("#add_name").val("");
        $("#add_phone").val("");
        $("#add_address").val("");
        $("#add_contact").val("");
	});
    $('#add_cancel_popup').click(function(){
        $('#add_distributor_popup_wrap').popup('hide');
        
        $("#add_name").val("");
        $("#add_phone").val("");
        $("#add_address").val("");
        $("#add_contact").val("");
        $("#add_noDistributeur").val("");
        $("#add_telephone1").val("");
        $("#add_telephone2").val("");
        $("#add_ville").val("");
        $("#add_province").val("");
        $("#add_codePostal").val("");
        $("#add_pays").val("");
	});
    
    $('#edit_distributor_popup_wrap').popup();
    $('.box_wrap').on('click', '.edit_distributor_popup_open', function(){
        var id = $(this).data("id");

        $("#edit_name").val(distributors[id].Name);
        $("#edit_phone").val(distributors[id].Telephone1);
        $("#edit_address").val(distributors[id].Address);
        $("#edit_contact").val(distributors[id].Contact);
        $("#edit_distributor_id").val(id);
        $("#edit_noDistributeur").val(distributors[id].noDistributeur);
        $("#edit_telephone1").val(distributors[id].Telephone1);
        $("#edit_telephone2").val(distributors[id].Telephone2);
        $("#edit_ville").val(distributors[id].Ville);
        $("#edit_province").val(distributors[id].Province);
        $("#edit_codePostal").val(distributors[id].CodePostal);
        $("#edit_pays").val(distributors[id].Pays);
        
        $('#edit_distributor_popup_wrap').popup('show');
	});
    $('#edit_close_popup').click(function(){
        $('#edit_distributor_popup_wrap').popup('hide');
	});
    $('#edit_cancel_popup').click(function(){
        $('#edit_distributor_popup_wrap').popup('hide');
	});
    
    $('#delete_distributor_popup_wrap').popup();
	$('.delete_distributor_popup_open').click(function(){
        var id = $(this).data("id");
        
        $("#delete_distributor_id").val(id);
        $('#delete_distributor_popup_wrap').popup('show');
	});
    $('#delete_close_popup').click(function(){
        $('#delete_distributor_popup_wrap').popup('hide');
	});
    $('#delete_cancel_popup').click(function(){
        $('#delete_distributor_popup_wrap').popup('hide');
	});

    $("#add_distributor_submit").click(function(){
        var canSubmit = true;
        var name = $("#add_name").val();
        var phone = $("#add_telephone1").val();
        var address = $("#add_address").val();
        var contact = $("#add_contact").val();

        $(".boder_red").removeClass("boder_red");

        if(!name){
            $("#add_name").addClass("boder_red");
            canSubmit = false;
        }
        if(!phone){
            $("#add_telephone1").addClass("boder_red");
            canSubmit = false;
        }
        if(!address){
            $("#add_address").addClass("boder_red");
            canSubmit = false;
        }
        if(!contact){
            $("#add_contact").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            $("#add_distributor_form").submit();
        }
    });
    
    $("#edit_distributor_submit").click(function(){
        var canSubmit = true;
        var name = $("#edit_name").val();
        var phone = $("#edit_telephone1").val();
        var address = $("#edit_address").val();
        var contact = $("#edit_contact").val();

        $(".boder_red").removeClass("boder_red");

        if(!name){
            $("#edit_name").addClass("boder_red");
            canSubmit = false;
        }
        if(!phone){
            $("#edit_telephone1").addClass("boder_red");
            canSubmit = false;
        }
        if(!address){
            $("#edit_address").addClass("boder_red");
            canSubmit = false;
        }
        if(!contact){
            $("#edit_contact").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            $("#edit_distributor_form").submit();
        }
    });
    
    $("#delete_distributor_submit").click(function(){
        $("#delete_distributor_form").submit();
    });
});
