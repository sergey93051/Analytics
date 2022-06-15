function ribbon(data) {


    var table = $('#ribbonTable').DataTable({
        "scrollX": true,
        "processing": true,
        "scrollCollapse": true,
        autoWidth: false,
        data: data,
        columnDefs: [{
                "width": "50%",
                "targets": [1]
            },
            {
                "max-width": "30%",
                "targets": [2]
            }
        ],
        fixedColumns: true,
        columns: [{
                data: "id"

            },
            {
                data: "message",

            },
            {
                data: "created_time"
            },

        ],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
    });


}