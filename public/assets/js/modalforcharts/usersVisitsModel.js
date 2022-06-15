function usersVisitsModel(data) {
    // console.log(data);
    // // console.log(date, user);
    // // const dateJson2 = data;
    // $(".usersVisits-modal").modal({ backdrop: 'static', keyboard: false });

    // $(".show-usersvisits-table").on("click", function() {
    //     $(".usersVisits-modal").modal("show");
    // });

    // $(".close-modal-usersVisits").on("click", function() {
    //     $(".usersVisits-modal").modal("hide");
    // });

    var table = $('#visits-Table').DataTable({
        data: data,
        columns: [
            { "data": "date" },
            { "data": "users" },
        ],
        // data: dateJson2,
        "bInfo": true, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
        "paging": true, //Dont want paging
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