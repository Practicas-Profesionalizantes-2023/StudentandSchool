



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




$('.delete_Btn').click(function () {// modal para poder eliminar las pre inscriptos
    var pre_user = $(this).data('id_id_pre'); 
    
    $('#pre_user').val(pre_user);
    
    $('#delete_modal').modal('show');
});



