
$(document).ready(function () {// modal para crear carreras
    $('.create_students_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});




$('.editBtn').click(function () {// modal para poder editar los profesores
    var id_students = $(this).data('id');
    var name_students = $(this).data('name');
    var last_students = $(this).data('last');
    var direction_students = $(this).data('direction');
    var heigh_students = $(this).data('height');
    var dni_students = $(this).data('dni');
    var mail_students = $(this).data('mail');
    var phone_students = $(this).data('phone');
    
    $('#id_students').val(id_students);
    $('#name_students').val(name_students);
    $('#last_students').val(last_students);
    $('#direction_students').val(direction_students);
    $('#heigh_students').val(heigh_students);
    $('#dni_students').val(dni_students);
    $('#mail_students').val(mail_students);
    $('#phone_students').val(phone_students);

    $('#editModal').modal('show');
});



$('.delete_Btn').click(function () {// modal para poder eliminar las Materias
    var studentsId = $(this).data('id_students'); 
    
   
    
    $('#id_students_eliminate').val(studentsId);
    
    $('#deleteModal').modal('show');
});



