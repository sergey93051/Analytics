function productsData(data) {
    let color = localStorage.getItem("badgeColor");
    var table = $('#productShopifyTable').DataTable({
        "scrollX": true,
        "processing": true,
        data: data,
        columns: [{
                data: "count",
            },
            {
                data: "title",
            },
            {
                data: "template_suffix"
            },
            {
                data: "status",
            },
            {
                data: "src",
                render: function(data, type, row) {
                    let img = "no";
                    if (row.src != "no") {
                        img = "<img id=" + row.id + " class='imgProduct' src=" + row.src +
                            " width='150' >" +
                            "<p class='text-center p-1' >" + row.width + "x" + row.height +
                            "</p>";
                    }
                    return img;
                },
            },
            {
                data: "image_created_at"
            },
            {
                data: "created_at",
            },
            {
                data: "all_details",
                render: function(data, type, row) {
                    let button = "<button  id=" + row.id + " class='btn btn-primery hrefDetails'>Details</button>";
                    $(".hrefDetails")
                        .css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");
                    return button;
                }
            },
            {
                data: "delete",
                render: function(data, type, row) {
                    let button = "<button  id=" + row.id + " class='btn btn-danger hrefdelete'>Delete</button>";
                    return button;
                }
            }

        ],
        'columnDefs': [{
            'targets': [1, 2, 3, 4, 5, 6, 7, 8],
            'orderable': false,
        }],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
    });

    $(".hrefDetails").on("click", function() {

        var id = $(this).attr("id");
        $.ajax({
            type: "get",
            url: "/private/admin/product/detaly/" + id,
            beforeSend: function() {
                $("#loader").show();
                $("body").css("opacity", "0.6");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error" + " " + thrownError);
                $("#loader").hide();
            },
            success: function() {
                window.location.href =
                    "/private/admin/product/detaly/" + id
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

    var deleteProductID = "";
    $(".hrefdelete").on("click", function() {
        $('#destroy-modal').modal('show');
        deleteProductID = $(this).attr("id");
        $(".del-alert").html(
            "<h4>" + "Are you sure you want to delete?" + "</h4>"
        );
    });


    $(".delete-item").on("click", function() {

        window.location.href = "/private/admin/productsall/delete/" + deleteProductID;

    });

}
