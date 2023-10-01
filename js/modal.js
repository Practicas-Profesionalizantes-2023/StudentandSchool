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


$('.editBtn').click(function () {// modal para poder editar las preinscriptos
    var id_pre = $(this).data('id');
    var name_pre = $(this).data('name');
    var last=$(this).data('last');
    var phone=$(this).data('phone');
    var mail=$(this).data('mail');
    var career_pre=$(this).data('career');
    var street=$(this).data('street');


    $('#id_pre_user').val(id_pre);
    $('#name').val(name_pre);
    $('#last').val(last);
    $('#phone').val(phone);
    $('#mail').val(mail);
    $('#career').val(career_pre);
    $('#street').val(street);
    $('#editModal').modal('show');
});



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


//----------------------------------------------
//modal de eliminar
$('.subject_delete_Btn').click(function () {// modal para poder eliminar las Materias
    var subjectId = $(this).data('id_subject'); 
    
   
    
    $('#id_subject_eliminate').val(subjectId);
    
    $('#deleteModal').modal('show');
});

$('.career_delete_Btn').click(function () {// modal para poder eliminar las carreras
    var career = $(this).data('id_career'); 
    
   
    
    $('#id_career_eliminate').val(career);
    
    $('#delete_career_modal').modal('show');
});


$('.user_delete_Btn').click(function () {// modal para poder eliminar los usuarios
    var user = $(this).data('id_user'); 
    
   
    
    $('#id_user_eliminate').val(user);
    
    $('#delete_modal').modal('show');
});




$('.user_delete_Btn').click(function () {// modal para poder eliminar laspre inscriptos
    var pre_user = $(this).data('id_pre_user'); 
    
   
    
    $('#id_pre_user').val(pre_user);
    
    $('#delete_modal').modal('show');
});



$('.teacher_delete_Btn').click(function () {// modal para poder eliminar Profesores
    var teacher = $(this).data('id_teacher'); 
    
   
    
    $('#id_teacher_eliminate').val(teacher);
    
    $('#delete_career_modal').modal('show');
});





$('.teacher_delete_Btn').click(function () {// modal para poder eliminar la materia de profesores
    var teachers = $(this).data('id_teacher_subject'); 
    
   
    
    $('#id_teacher_eliminate').val(teachers);
    
    $('#delete_career_modal').modal('show');
});




//----------------------------------------------------
//modal para crear


$(document).ready(function () {//modal para crear materias
    $('.create_subject_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});



$(document).ready(function () {// modal para crear carreras
    $('.create_career_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});




