$(function() {
    
    $('#distributor_datatable').DataTable({
        "pagingType": "simple_numbers",
        "scrollX": true,
        "columnDefs": [
		   {"targets": 3, 'searchable':false, 'orderable':true},
		   {"targets": 4, 'searchable':false, 'orderable':false},
           {"targets": 5, 'searchable':false, 'orderable':false}
		 ]
    });
    
    $('#add_distributor_popup_wrap').popup();
	$('#add_distributor_popup_open').click(function(){
        $('#add_distributor_popup_wrap').popup('show');
	});
    $('#add_close_popup').click(function(){
        $('#add_distributor_popup_wrap').popup('hide');
        
        $("#add_piece_number").val("");
        $("#add_description").val("");
        $("#add_distributor").val("");
        $("#add_cost").val("");
	});
    $('#add_cancel_popup').click(function(){
        $('#add_distributor_popup_wrap').popup('hide');
        
        $("#add_piece_number").val("");
        $("#add_description").val("");
        $("#add_distributor").val("");
        $("#add_cost").val("");
	});
    
    $('#edit_distributor_popup_wrap').popup();
	$('.edit_distributor_popup_open').click(function(){
        var id = $(this).data("id");

        $("#edit_piece_number").val(distributors[id].PieceNumber);
        $("#edit_description").val(distributors[id].Description);
        $("#edit_distributor").val(distributors[id].Distributor);
        $("#edit_cost").val(distributors[id].Cost);
        $("#edit_distributor_id").val(id);
        
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
        var piece_number = $("#add_piece_number").val();
        var description = $("#add_description").val();
        var distributor = $("#add_distributor").val();
        var cost = $("#add_cost").val();

        $(".boder_red").removeClass("boder_red");

        if(!piece_number){
            $("#add_piece_number").addClass("boder_red");
            canSubmit = false;
        }
        if(!description){
            $("#add_description").addClass("boder_red");
            canSubmit = false;
        }
        if(!distributor){
            $("#add_distributor").addClass("boder_red");
            canSubmit = false;
        }
        if(!costValide(cost)){
            $("#add_cost").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            $("#add_distributor_form").submit();
        }
    });
    
    $("#edit_distributor_submit").click(function(){
        var canSubmit = true;
        var piece_number = $("#edit_piece_number").val();
        var description = $("#edit_description").val();
        var distributor = $("#edit_distributor").val();
        var cost = $("#edit_cost").val();

        $(".boder_red").removeClass("boder_red");

        if(!piece_number){
            $("#edit_piece_number").addClass("boder_red");
            canSubmit = false;
        }
        if(!description){
            $("#edit_description").addClass("boder_red");
            canSubmit = false;
        }
        if(!distributor){
            $("#edit_distributor").addClass("boder_red");
            canSubmit = false;
        }
        if(!costValide(cost)){
            $("#edit_cost").addClass("boder_red");
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
