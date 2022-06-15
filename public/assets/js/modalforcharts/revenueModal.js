function revenueModal() {

    $(".revenueTab-modal").modal({ backdrop: 'static', keyboard: false });
    $(".show-revenue-table").on("click", function() {
        $(".revenueTab-modal").modal("show");
    });

    $(".close-modal-revenueTab").on("click", function() {
        $(".revenueTab-modal").modal("hide");
    });

    var table = $('#revenueTab-Table').DataTable({
        // columns: [
        //     { "data": "date" },
        //     { "data": "fc" },
        //     { "data": "googleCpc" },
        //     { "data": "googleOrg" },
        //     { "data": "twitter" },
        //     { "data": "instagram" },
        //     { "data": "mailsoc" },
        // ],
        // data: revenueDb.data,
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