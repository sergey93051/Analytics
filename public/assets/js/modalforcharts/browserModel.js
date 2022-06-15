function browserModel() {

    var data = [];

    $(".browser-modal").modal({ backdrop: 'static', keyboard: false });

    $(".close-modal-browser").on("click", function() {
        data = [];
        $(".browser-modal").modal("hide");

    });

    $(".show-browser-table").on("click", function() {
        $(".browser-modal").modal("show");

        data.push({
            data: jQuery.parseJSON(localStorage.getItem("prowserData"))
        });

        var table = $('#browser-Table').DataTable({
            "bDestroy": true,
            data: data[0].data,
            columns: [
                { data: "browser" },
                { data: "count" }
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