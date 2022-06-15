function dayindexModal() {

    $(".dayIndex-modal").modal({ backdrop: 'static', keyboard: false });

    $(".show-dayindex-table").on("click", function() {
        $(".dayIndex-modal").modal("show");
    });

    $(".close-modal-dayIndex").on("click", function() {
        $(".dayIndex-modal").modal("hide");
    });

    var table = $('#dayindex-Table').DataTable({

        columns: [
            { "data": "date" },
            { "data": "User" },
        ],
        data: dateJson2.data,
        "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
        "paging": false, //Dont want paging
        "scrollY": "300px",
        "scrollX": true,
        "scrollCollapse": true,
        "filter": true,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, 80]
        ]

    });

}