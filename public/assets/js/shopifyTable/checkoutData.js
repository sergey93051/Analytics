function checkoutData(d) {
    let color = localStorage.getItem("badgeColor");
    var data = d;
    var table = $('#Checkouts-ShopifyTable').DataTable({
        "scrollX": true,
        "processing": true,
        data: data,
        columns: [{
                data: "count"
            },
            {
                data: "phone"
            },
            {
                data: "email"
            },
            {
                data: "taxes_included"
            },
            {
                data: "total_weight"
            },
            {
                data: "total_discounts"
            },
            {
                data: "total_price"
            },
            {
                data: "currency"
            },
            {
                data: "total_tax"
            },
            {
                data: "created_at"
            },
            {
                data: "updated_at"
            },
            {
                data: "products_item",
                render: function(data, type, row) {
                    var ptag = "<button class='btn  product-but'  id=" + row.id +
                        " >" + 'show' +
                        "</button>"

                    $(".product-but").css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");
                    return ptag;
                }
            },
            {
                data: "shipping_address",
                render: function(data, type, row) {
                    var ptag = "<button class='btn shipping_address-but'  id=" + row.id +
                        " >" + 'show' +
                        "</button>"
                    $(".shipping_address-but").css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");
                    return ptag;
                }
            },

        ],
        'columnDefs': [{
            'targets': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            'orderable': false,
        }],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
    });
    $(".product-but").on("click", function() {
        var id = $(this).attr("id");
        $.ajax({
            type: "get",
            url: "/private/admin/checkouts/products/" + id,
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
                    "/private/admin/products/item/" + id;
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

    $(".shipping_address-but").on("click", function() {
        var id = $(this).attr("id");
        $.ajax({
            type: "get",
            url: "/private/admin/checkouts/ShippingAddress/" + id,
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
                    "/private/admin/checkouts/ShippingAddress/" + id;
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

    $(".customer-but").on("click", function() {
        var id = $(this).attr("id");
        $.ajax({
            type: "get",
            url: "/private/admin/customers/item/" + id,
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
                    "/private/admin/customers/item/" + id;
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });


}
