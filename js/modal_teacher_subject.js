
$('.edit_Btn').click(function () {// modal para poder editar las carreras
    var id = $(this).data('id');
    var subject = $(this).data('subject'); // Corrige $this a $(this)

    $('#id_teacher_subject').val(id);
    $('#id_subject').val(subject);

    $('#editModal').modal('show');
});



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


