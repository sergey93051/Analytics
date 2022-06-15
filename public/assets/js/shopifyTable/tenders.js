function tenderTransaction(data) {
    var table = $('#tenderTransaction-ShopifyTable').DataTable({
        "scrollX": true,
        "processing": true,
        data: data,
        columns: [{
                data: "count"
            },
            {
                data: "amount",
                render: function(data, type, row) {
                    var ptag = "<p class='tender-p'  id=" + row.order_id + " >" + data +
                        "</p>"
                    return ptag;
                }
            },
            {
                data: "currency"
            },
            {
                data: "test"
            },
            {
                data: "payment_details"
            },
            {
                data: "payment_method"
            },
            {
                data: "processed_at"
            },
        ],
        'columnDefs': [{
            'targets': [1, 2, 3, 4, 5, 6],
            'orderable': false,
        }],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
    });
    $("tbody tr>td").attr("title", "Order").css("cursor", "pointer");
    $("tbody tr").on("click", function() {
        var id = $(this).find(".tender-p").attr("id");
        $.ajax({
            type: "get",
            url: "/private/admin/orders/item/" + id,
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
                    "/private/admin/orders/item/" + id;
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });
}