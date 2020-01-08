$(document).ready( function () {
    $('#table_id').DataTable( {
        ordering: true,
        "order": [[ 2, "desc" ]],
        "columnDefs" : [{"targets":2, "type":"date-eu"}],
        "language": {
            "decimal":        "",
            "emptyTable":     "Nessuno",
            "info":           "_START_ - _END_ su _TOTAL_",
            "infoEmpty":      "0 di 0 su 0 movimenti",
            "infoFiltered":   "(filtro _MAX_)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostra _MENU_",
            "loadingRecords": "Caricamento...",
            "processing":     "Elaborazione...",
            "search":         "Cerca:",
            "zeroRecords":    "Nessuno",
            "paginate": {
                "first":      "Primo",
                "last":       "Ultimo",
                "next":       "Prossimo",
                "previous":   "Precedente"
            },
            "aria": {
                "sortAscending":  ": ascendente",
                "sortDescending": ": discendente"
            }
        }
    } );
} );