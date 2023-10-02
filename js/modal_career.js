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



$('.career_delete_Btn').click(function () {// modal para poder eliminar las carreras
    var career = $(this).data('id_career'); 
    
   
    
    $('#id_career_eliminate').val(career);
    
    $('#delete_career_modal').modal('show');
});



$(document).ready(function () {// modal para crear carreras
    $('.create_career_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});
