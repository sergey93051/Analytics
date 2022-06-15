function pscModel() {

    var data = [];

    $(".psc-modal").modal({ backdrop: 'static', keyboard: false });

    $(".close-modal-psc").on("click", function() {
        data = [];
        $(".psc-modal").modal("hide");

    });

    $(".show-psc-table").on("click", function() {

        $(".psc-modal").modal("show");

        data.push({
            "data": jQuery.parseJSON(localStorage.getItem("pscData"))
        });

        var table = $('#psc-Table').DataTable({
            "bDestroy": true,
            data: data[0].data,
            columns: [
                { data: "pageTitle" },
                { data: "pageCount" }
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

    });


}
