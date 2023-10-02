
$(document).ready(function () {//modal para crear materias
    $('.create_subject_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});



$('.subject_delete_Btn').click(function () {// modal para poder eliminar las Materias
    var subjectId = $(this).data('id_subject'); 
    
   
    
    $('#id_subject_eliminate').val(subjectId);
    
    $('#deleteModal').modal('show');
});


$('.subject_edit_Btn').click(function () {// modal para poder editar las Materias
    var id = $(this).data('id');
    var subject = $(this).data('subject');

    $('#id_subject').val(id);
    $('#name').val(subject);
   

    $('#editModal').modal('show');
});