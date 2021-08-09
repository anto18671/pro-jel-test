$(function() {
    $('#add_text').click(function(){
        addText("", 0);
    });
    
    $('#add_time').click(function(){
        addTime(1, 0, 0);
    });
    
    $('#add_space').click(function(){
        addSpace(0);
    });
    
    $('#add_materiel').click(function(){
        var html = '';

        html += '<div class="task_wrap" data-type="materiel">';
        html += '<div class="task_wrap_header">';
        html += '<p class="task_title">Materiel</p>';
        html += '<label class="close_task_popup">X</label>';
        html += '<img class="arrow_size" src="../images/227604_down_arrow_icon.png">';
        html += '<img class="arrow_size" src="../images/2561334_up_arrow_icon.png">';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="random_questions_disposition_label">Nombre de pièces</label><br>';
        html += '<input type="number" class="random_questions_disposition_input" min="1" value="0">';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="random_questions_disposition_label">Prix</label><br>';
        html += '<input type="number" class="random_questions_disposition_input" min="1" value="0">';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="label_top" for="materiel">Matériel</label>';
        html += '<select id="materiel" name="materiel" style="width: 152px">';
        html += '<option value="0">--</option>';
        
        var size = materiels.length;
        for(let i=0; i<size; i++){
            let materiel = materiels[i];
            html += '<option value="' + materiel.Id + '">' + materiel.Description + '</option>';
        }
        
        html +=     '</select>';
        html +=     '</div>';
        html += '</div>';

        $('.all_task_wrap').append(html);
    });
    
    $('.all_task_wrap, .task_wrap').on('click', '.close_task_popup', function(){
        $(this).closest('.task_wrap').remove();
    });
    $('.all_task_wrap, .task_material_wrap').on('click', '.close_task_popup', function(){
        $(this).closest('.task_material_wrap').remove();
    });
    
    function addSpace(pos){
        var html = '';

        html += '<div class="task_wrap" data-type="space" data-pos="' + pos + '">';
        html += '<p class="task_title">Espace</p>';
        html += '<label class="close_task_popup">X</label>';
        html += '<img class="arrow_size" src="../images/227604_down_arrow_icon.png">';
        html += '<img class="arrow_size" src="../images/2561334_up_arrow_icon.png">';
        html += '</div>';

        $('.all_task_wrap').append(html);
    }
    
    function addText(text, pos){
        var html = '';

        html += '<div class="task_wrap" data-type="text" data-pos="' + pos + '">';
        html += '<div class="task_wrap_header">';
        html += '<p class="task_title">Texte</p>';
        html += '<label class="close_task_popup">X</label>';
        html += '<img class="arrow_size" src="../images/227604_down_arrow_icon.png">';
        html += '<img class="arrow_size" src="../images/2561334_up_arrow_icon.png">';
        html += '</div>';
        html += '<div class="input_label_wrap">';
        html += '<label>Tache</label><br>';
        html += '<textarea class="task_box" name="task_box">' + text + '</textarea>';
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
        html += '<img class="arrow_size" src="../images/227604_down_arrow_icon.png">';
        html += '<img class="arrow_size" src="../images/2561334_up_arrow_icon.png">';
        html += '</div>';
        html += '<div class="input_label_wrapper">';
        html += '<label class="label_top" for="temps_valeur">Client</label>';
        html += '<select id="temps_valeur" name="temps_valeur">';
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
        html += '<input type="number" class="random_questions_disposition_input" min="1" value="' + nb + '">';
        html += '</div>';
        html += '</div>';

        $('.all_task_wrap').append(html);
    }
});

