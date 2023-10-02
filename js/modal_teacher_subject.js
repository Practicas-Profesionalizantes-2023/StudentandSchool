
$('.teacher_delete_Btn').click(function () {// modal para poder eliminar la materia de profesores
    var teachers = $(this).data('id_teacher_subject'); 
    
   
    
    $('#id_teacher_eliminate').val(teachers);
    
    $('#delete_career_modal').modal('show');
});



$(document).ready(function () {// modal para crear carreras
    $('.create_career_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});


