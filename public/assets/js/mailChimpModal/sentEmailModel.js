function sentEmailModel() {

    // $("#sent-email-btn").modal({ backdrop: 'static', keyboard: false });

    // $(".close-modal-browser").on("click", function() {

    //     $(".browser-modal").modal("hide");

    // });

    $(".sent-email-btn").on("click", function() {
        $("#sentEmail-modal").modal("show");
    });


    // var table = $('#takeEmail-Table').DataTable({


    //     "bDestroy": true,
    //     "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
    //     "paging": false, //Dont want paging
    //     "scrollY": "300px",
    //     "scrollX": true,
    //     "scrollCollapse": true,
    //     "filter": true,
    //     // "lengthMenu": [
    //     //     [10, 25, 50, -1],
    //     //     [10, 25, 50, 80]
    //     // ]
    // });

    // $(".select-anypageTablefind-btn").on("click", function() {

    //     var day = $("#select-chart-anypagetable").val();

    //     token_();
    //     $.ajax({
    //         url: "/private/admin/analytics/anypagetableFilterRequest",
    //         type: 'POST',
    //         data: {
    //             "day": day,
    //         },
    //         success: function(response) {

    //             var data = [];

    //             var pageTitle = [];
    //             var count = [];

    //             $.each(response.analyticsData, function(i, v) {
    //                 pageTitle.push(v.pageTitle);
    //                 count.push(v.pageCount);
    //             });

    //             data.push({
    //                 "data": response.analyticsData
    //             });
    //             table.clear();
    //             table.rows.add(data[0].data);
    //             table.draw();
    //         }
    //     });
    // });
}