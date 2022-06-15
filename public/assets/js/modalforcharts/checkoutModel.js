function checkoutModel(json) {

    var data = [];

    data.push({
        "data": json
    });

    $(".checkouts").modal({ backdrop: 'static', keyboard: false });

    $(".show-checkout-table").on("click", function() {
        $(".checkout-modal").modal("show");
    });

    $(".close-modal-checkout").on("click", function() {
        $(".checkout-modal").modal("hide");
    });

    var table = $('#checkout-Table').DataTable({
        "bDestroy": true,
        data: data[0].data,
        columns: [
            { "data": "pageTitle" },
            { "data": "pageCount" }
        ],
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