$(function() {
    
    $('#materiel_datatable').DataTable({
        "pagingType": "simple_numbers",
        "scrollX": true,
        "columnDefs": [
		   {"targets": 4, 'searchable':false, 'orderable':true},
		   {"targets": 5, 'searchable':false, 'orderable':true},
           {"targets": 6, 'searchable':false, 'orderable':false},
           {"targets": 7, 'searchable':false, 'orderable':false}
		 ]
    });
    
    $('#add_materiel_popup_wrap').popup();
	$('#add_materiel_popup_open').click(function(){
        $('#add_materiel_popup_wrap').popup('show');
	});
    $('#add_close_popup').click(function(){
        $('#add_materiel_popup_wrap').popup('hide');
        
        $("#add_piece_number").val("");
        $("#add_description").val("");
        $("#add_distributor").val("");
        $("#add_fabricant").val("");
        $("#add_cost").val("");
	});
    $('#add_cancel_popup').click(function(){
        $('#add_materiel_popup_wrap').popup('hide');
        
        $("#add_piece_number").val("");
        $("#add_description").val("");
        $("#add_distributor").val("");
        $("#add_fabricant").val("");
        $("#add_cost").val("");
	});
    
    $('#edit_materiel_popup_wrap').popup();
	$('.edit_materiel_popup_open').click(function(){
        var id = $(this).data("id");
        var hasDistributor = false;

        $("#edit_piece_number").val(materiels[id].PieceNumber);
        $("#edit_description").val(materiels[id].Description);
        $("#edit_cost").val(materiels[id].Cost);
        $("#edit_fabricant").val(materiels[id].Fabricant);
        $("#edit_materiel_id").val(id);
        
        $('#added_option').remove();
        $('#edit_distributor').val(0);
        
        var select = '#edit_distributor option[value="' + materiels[id].DistributorId + '"]';
        $(select).prop("selected", true);
        
        if($('#edit_distributor').val() == 0){
            var option = '<option id="added_option" value="' + materiels[id].DistributorId + '">' + materiels[id].DistributorName + '</option>';
            $("#edit_distributor").append(option);
            $(select).prop("selected", true);
        }
        
        $('#edit_materiel_popup_wrap').popup('show');
	});
    $('#edit_close_popup').click(function(){
        $('#edit_materiel_popup_wrap').popup('hide');
	});
    $('#edit_cancel_popup').click(function(){
        $('#edit_materiel_popup_wrap').popup('hide');
	});
    
    $('#delete_materiel_popup_wrap').popup();
	$('.delete_materiel_popup_open').click(function(){
        var id = $(this).data("id");
        
        $("#delete_materiel_id").val(id);
        $('#delete_materiel_popup_wrap').popup('show');
	});
    $('#delete_close_popup').click(function(){
        $('#delete_materiel_popup_wrap').popup('hide');
	});
    $('#delete_cancel_popup').click(function(){
        $('#delete_materiel_popup_wrap').popup('hide');
	});

    $("#add_materiel_submit").click(function(){
        var canSubmit = true;
        var piece_number = $("#add_piece_number").val();
        var description = $("#add_description").val();
        var distributor = $("#add_distributor").val();
        var fabricant = $("#add_fabricant").val();
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
        if(!distributor || distributor == 0){
            $("#add_distributor").addClass("boder_red");
            canSubmit = false;
        }
        if(!fabricant){
            $("#add_fabricant").addClass("boder_red");
            canSubmit = false;
        }
        if(!costValide(cost)){
            $("#add_cost").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            $("#add_materiel_form").submit();
        }
    });
    
    $("#edit_materiel_submit").click(function(){
        var canSubmit = true;
        var piece_number = $("#edit_piece_number").val();
        var description = $("#edit_description").val();
        var distributor = $("#edit_distributor").val();
        var fabricant = $("#edit_fabricant").val();
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
        if(!fabricant){
            $("#edit_fabricant").addClass("boder_red");
            canSubmit = false;
        }
        if(!costValide(cost)){
            $("#edit_cost").addClass("boder_red");
            canSubmit = false;
        }

        if(canSubmit){
            $("#edit_materiel_form").submit();
        }
    });
    
    $("#delete_materiel_submit").click(function(){
        $("#delete_materiel_form").submit();
    });

    function costValide(costBefore)
    {
        var cost = costBefore.replace(",", ".");
        var strArray = cost.split(".");

        if(strArray.length == 2 && strArray[1].length != 2){
            return false;
        }

        var iniSize = cost.length;
        var float = parseFloat(cost);
        var str = float.toString();
        var endSize = str.length;

        if(iniSize == endSize){
            return true;
        }

        return false;
    }
});
