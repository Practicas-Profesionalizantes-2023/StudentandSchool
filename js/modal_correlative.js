$(document).ready(function () {
    // Modal para crear correlativas
    $('.correlative_Btn').click(function () {
        $('#create_Modal').modal('show');
    });

    // Evento de vinculación para los botones de eliminación
    $('.delete_Btn').click(function () {
        var id_correlative = $(this).data('id');
        $('#id_correlative_eliminate').val(id_correlative);
        $('#deleteModal').modal('show');
    });
});
