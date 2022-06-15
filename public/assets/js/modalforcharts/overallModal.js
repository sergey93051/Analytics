function overallModal() {

    $(".overallTab-modal").modal({ backdrop: 'static', keyboard: false });
    $(".show-overallTab-table").on("click", function() {
        $(".overallTab-modal").modal("show");
    });

    $(".close-modal-overallTab").on("click", function() {
        $(".overallTab-modal").modal("hide");
    });

    var table = $('#overallTab-Table').DataTable({

        "bInfo": false,
        "paging": false,
        "scrollY": "300px",
        "scrollX": true,
        "scrollCollapse": true,
        // data: dbModal,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, 80]
        ],

    });
}