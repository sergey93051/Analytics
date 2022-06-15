function retuserModal() {

    $(".retuser-modal").modal({ backdrop: 'static', keyboard: false });
    $(".show-retuser-table").on("click", function() {
        $(".retuser-modal").modal("show");
    });

    $(".close-modal-retuser").on("click", function() {
        $(".retuser-modal").modal("hide");
    });

    var table = $('#retuser-Table').DataTable({

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