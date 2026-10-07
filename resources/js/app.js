document.addEventListener("DOMContentLoaded", function () {
    // Autoinit of MaterializeCSS
    M.AutoInit();

    // DataTables Initialization
    if (window.jQuery && jQuery.fn.DataTable) {
        $(".datatable").each(function () {
            var $table = $(this);
            if (!$table.parent().hasClass("table-responsive")) {
                $table.wrap("<div class='table-responsive'></div>");
            }

            $table.DataTable({
                responsive: false,
                scrollX: true,
                language: {
                    search: "",
                    searchPlaceholder: "Buscar...",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    infoEmpty: "Mostrando 0 a 0 de 0 registros",
                    infoFiltered: "(filtrado de _MAX_ registros totales)",
                    zeroRecords: "No se encontraron resultados",
                    emptyTable: "No hay datos disponibles en la tabla",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Último",
                    },
                },
                columnDefs: [
                    {
                        targets: "no-sort",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        });
    }
});
