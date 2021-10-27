$(function() {
    
    addArray();
    
    $('#add_text').click(function(){
        addText("", $('.task_wrap').length);
    });
    
    $('#add_time').click(function(){
        addTime(1, 0, $('.task_wrap').length);
    });
    
    $('#add_space').click(function(){
        addSpace($('.task_wrap').length);
    });
    
    $('#add_materiel').click(function(){
         addMateriel(0, 15, 1, $('.task_wrap').length);
    });
    
    $('.all_task_wrap, .task_wrap').on('click', '.close_task_popup', function(){
        $(this).closest('.task_wrap').remove();
    });
    $('.all_task_wrap, .task_material_wrap').on('click', '.close_task_popup', function(){
        $(this).closest('.task_material_wrap').remove();
    });
    
    $('#submit_facture').click(function(){
        var factures = $('.task_wrap');
        var array = [];
         
        for (let i = 0; i < factures.length; i++) {
            var facture = factures[i];
            var type = facture.attributes[1].value;
            if(type == 'time'){
                var target = '#temps_valeur' + i;
                var target2 = '#time_number' + i;
                array.push([type, $(target).val(), $(target2).val()]);
            }
            else if (type == 'text'){
                var target = '#text_box' + i;
                array.push([type, $(target).val()]);
            }
            else if (type == 'materiel'){
                var target = '#nb_materiel' + i;
                var target2 = '#prix_materiel' + i;
                var target3 = '#materiel' + i;
                array.push([type, $(target).val(), $(target2).val(), $(target3).val()]);
            }
            else if (type == 'space'){
                array.push([type]);
            }
        }
        
        $.ajax({
			url : "../action/HomeController.php",
			data : { 
				task : 'save_facture',
                factureId : factureId,
				client: $('#client').val(),
                poClient: $('#POClient').val(),
                conditionVente: $('#conditionVente').val(),
                note1: $('#note1').val(),
                note2: $('#note2').val(),
                remarque: $('#remarque').val(),
                remarquePrix: $('#remarquePrix').val(),
                array: array
		    },
			type: 'POST',
			success : function(data) {			
				window.location.reload();
			},
            error : function() {
                console.log('error');
            }
		});
    });
    
    function addSpace(pos){
        var html = '';

        html += '<div class="task_wrap" data-type="space" data-pos="' + pos + '">';
        html += '<p class="task_title">Espace</p>';
        html += '<label class="close_task_popup">X</label>';
        html += '</div>';

        $('.all_task_wrap').append(html);
    }
    
    function addText(text, pos){
        var html = '';

        html += '<div class="task_wrap" data-type="text" data-pos="' + pos + '">';
        html += '<div class="task_wrap_header">';
        html += '<p class="task_title">Texte</p>';
        html += '<label class="close_task_popup">X</label>';
        html += '</div>';
        html += '<div class="input_label_wrap">';
        html += '<label>Tache</label><br>';
        html += '<textarea class="task_box" id="text_box' + pos + '" name="task_box">' + text + '</textarea>';
        html += '</div>';
        html += '</div>';

        $('.all_task_wrap').append(html);
    }
    
    function addTime(type, nb, pos){
        var html = '';

        html += '<div class="task_wrap" data-type="time" data-pos="' + pos + '">';
        html += '<div class="task_wrap_header">';
        html += '<p class="task_title">Temps</p>';
        html += '<label class="close_task_popup">X</label>';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="label_top" for="temps_valeur">Client</label>';
        html += '<select id="temps_valeur' + pos + '" name="temps_valeur">';
        if(type == '1'){
            html += '<option value="1" selected>1x</option>';
        }
        else{
            html += '<option value="1">1x</option>';
        }
        if(type == '1.5'){
            html += '<option value="1.5" selected>1.5x</option>';
        }
        else{
            html += '<option value="1.5">1.5x</option>';
        }
        if(type == '2'){
            html += '<option value="2" selected>2x</option>';
        }
        else{
            html += '<option value="2">2x</option>';
        }
        html += '</select>';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="random_questions_disposition_label">Temps</label><br>';
        html += '<input type="number" id="time_number' + pos + '" class="random_questions_disposition_input" min="1" value="' + nb + '">';
        html += '</div>';
        html += '</div>';

        $('.all_task_wrap').append(html);
    }
    
    function addMateriel(id, prix, nb, pos){
        var html = '';

        html += '<div class="task_wrap" data-type="materiel" data-pos="' + pos + '">';
        html += '<div class="task_wrap_header">';
        html += '<p class="task_title">Materiel</p>';
        html += '<label class="close_task_popup">X</label>';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="random_questions_disposition_label">Nombre de pièces</label><br>';
        html += '<input type="number" id="nb_materiel' + pos + '" class="random_questions_disposition_input" min="0" value="' + nb + '">';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="random_questions_disposition_label">Prix %</label><br>';
        html += '<input type="number" id="prix_materiel' + pos + '" class="random_questions_disposition_input" min="0" value="' + prix + '">';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="label_top" for="materiel">Matériel</label>';
        html += '<select id="materiel' + pos + '" name="materiel" style="width: 152px">';
        html += '<option value="0">--</option>';
        
        var size = materiels.length;
        for(let i=0; i<size; i++){
            let materiel = materiels[i];
            if(id == materiel.Id ){
                html += '<option value="' + materiel.Id + '" selected>' + materiel.Description + '</option>';
            }
            else{
                html += '<option value="' + materiel.Id + '">' + materiel.Description + '</option>';
            }
        }
        
        html += '</select>';
        html += '</div>';
        html += '</div>';

        $('.all_task_wrap').append(html);
    }
    
    function addArray(){
        var size = array.length;
        
        for(let i = 0; i < size; i++){
            if(array[i][0] == "text"){
                addText(array[i][1], $('.task_wrap').length);
            }
            else if (array[i][0] == "time"){
                addTime(array[i][1], array[i][2], $('.task_wrap').length);
            }
            else if (array[i][0] == "materiel"){
                addMateriel(array[i][3], array[i][2], array[i][1], $('.task_wrap').length)
            }
            else if (array[i][0] == "space"){
                addSpace($('.task_wrap').length);
            }
        }
    }
});

