

$('.editBtn').click(function () {// modal para poder editar los profesores
    var id_teacher = $(this).data('id');
    var name_teacher = $(this).data('name');
    var surname_teacher = $(this).data('surname');
    var phone_teacher = $(this).data('phone');
    var mail_teacher = $(this).data('mail');
    var direcction_teacher = $(this).data('direcction');
    var height_teacher = $(this).data('height');
    
    $('#id_teacher').val(id_teacher);
    $('#name_teacher').val(name_teacher);
    $('#surname_teacher').val(surname_teacher);
    $('#phone_teacher').val(phone_teacher);
    $('#mail_teacher').val(mail_teacher);
    $('#direction_teacher').val(direcction_teacher);
    $('#height_teacher').val(height_teacher);

    $('#editModal').modal('show');
});




$('.teacher_delete_Btn').click(function () {// modal para poder eliminar Profesores
    var teacher = $(this).data('id_teacher'); 
    
   
    
    $('#id_teacher_eliminate').val(teacher);
    
    $('#delete_career_modal').modal('show');
});



$(document).ready(function () {// modal para crear carreras
    $('.create_career_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});

