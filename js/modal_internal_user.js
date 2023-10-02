

$('.user_delete_Btn').click(function () {// modal para poder eliminar los usuarios
    var user = $(this).data('id_user'); 
    
   
    
    $('#id_user_eliminate').val(user);
    
    $('#delete_modal').modal('show');
});



$(document).ready(function () {// modal para crear carreras
    $('.create_career_Btn').click(function () {
        $('#create_Modal').modal('show');
    });
});

