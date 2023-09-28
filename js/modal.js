//modal de editar
$('.editBtn').click(function () {// modal para poder editar las carreras
    var id = $(this).data('id');
    var career = $(this).data('career');
    var title = $(this).data('title');
    var subjects = $(this).data('subjects');

    $('#id_career_edit').val(id);
    $('#career_edit').val(career);
    $('#title_edit').val(title);
    $('#subjects_edit').val(subjects);

    $('#editModal').modal('show');
});


$('.subject_edit_Btn').click(function () {// modal para poder editar las Materias
    var id = $(this).data('id');
    var subject = $(this).data('subject');

    $('#id_subject').val(id);
    $('#name').val(subject);
   

    $('#editModal').modal('show');
});

//----------------------------------------------
//modal de eliminar
$('.subject_delete_Btn').click(function () {// modal para poder eliminar las Materias
    var subjectId = $(this).data('id_subject'); 
    
   
    
    $('#id_subject_eliminate').val(subjectId);
    
    $('#deleteModal').modal('show');
});

$('.career_delete_Btn').click(function () {// modal para poder eliminar las Materias
    var career = $(this).data('id_career'); 
    
   
    
    $('#id_career_eliminate').val(career);
    
    $('#delete_career_modal').modal('show');
});


//----------------------------------------------------
//modal para crear


$(document).ready(function () {
    $('.create_subject_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});



$(document).ready(function () {
    $('.create_career_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});