function usersAovModal() {

    $(".usersAov-modal").modal({ backdrop: 'static', keyboard: false });
    $(".show-userAov-table").on("click", function() {
        $(".usersAov-modal").modal("show");
    });
    $(".close-modal-usersAov").on("click", function() {
        $(".usersAov-modal").modal("hide");
    });

    var table = $('#userAov-Table').DataTable({

        columns: [
            { "data": "date" },
            { "data": "User" },
            { "data": "Aov" },
        ],
        data: dateJson.data,
        "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
        "paging": false, //Dont want paging
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