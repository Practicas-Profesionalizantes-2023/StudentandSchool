
$(document).ready(function () {// modal para crear carreras
    $('.create_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});


$('.delete_Btn').click(function () {// modal para poder eliminar las Materias
    var id_subject_students = $(this).data('id'); 
    
   
    
    $('#id_students_subject_eliminate').val(id_subject_students);
    
    $('#deleteModal').modal('show');
});

