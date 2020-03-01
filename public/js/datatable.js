$('#id').delay(3000).fadeOut('fast');

// Ordenar y buscar registros datatable
$(function() {

    // Datatables
    $('#example1').DataTable({
        "lengthMenu": [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        responsive: true,
        "autoWidth": false
    });

})