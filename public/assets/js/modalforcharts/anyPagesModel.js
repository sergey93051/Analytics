function anyPagesModel() {

    var data = [];

    var localStData = jQuery.parseJSON(localStorage.getItem("anyPagedata"));

    data.push({
        data: localStData[0]
    });

    console.log(localStData)
    $('#select-chart-anypagetable option[value=' + localStData[1] + ']').attr('selected', 'selected');

    var table = $('#anyPages-Table').DataTable({

        data: data[0].data,
        "bDestroy": true,

        columns: [
            { "data": "pageTitle" },
            { "data": "pageCount" }
        ],

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

    $(".select-anypageTablefind-btn").on("click", function() {

        var day = $("#select-chart-anypagetable").val();

        token_();
        $.ajax({
            url: "/private/admin/analytics/anypagetableFilterRequest",
            type: 'POST',
            data: {
                "day": day,
            },
            success: function(response) {

                var data = [];

                var pageTitle = [];
                var count = [];

                $.each(response.analyticsData, function(i, v) {
                    pageTitle.push(v.pageTitle);
                    count.push(v.pageCount);
                });

                data.push({
                    "data": response.analyticsData
                });
                table.clear();
                table.rows.add(data[0].data);
                table.draw();
            }
        });
    });
}