function shopifyCustomer(data) {
    var inputAllCount = 0;
    var color = localStorage.getItem("badgeColor");
    var table = $('#customersShopifyTable').DataTable({

        "processing": true,
        data: data,
        columns: [{
                data: "id",
                render: function(data, type, row) {
                    return "<input type='checkbox' class='main-menu-customer customerInputItem' id=" + row.id + ">";
                },
                orderable: false
            },
            {
                data: "count",
                render: function(data, type, row) {
                    return "<p class='customerId' id=" + row.id + ">" + data + "</p>";
                },
                'orderable': true,
            },
            {
                data: "first_name",
                render: function(data, type, row) {
                    return "<p  class='orderId' id=" + row.last_order_id + ">" + data + "</p>";
                }
            },
            {
                data: "last_name"
            },
            {
                data: "email"
            },
            {
                data: "phone"
            },
            {
                data: "accepts_marketing"
            },
            {
                data: "orders_count"
            },
            {
                data: "total_spent"
            },
            {
                data: "currency"
            },
            {
                data: "tax_exempt"
            },
            {
                data: "created_at"
            },
            {
                data: "menu",
                render: function(data, type, row) {
                    var dropdown = '' +
                        '<div class="dropdown main-menu-customer">' +
                        '  <a title="menu" class="btn btn-primery dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">' +
                        '   Menu' +
                        '  </a>' +
                        '' +
                        '  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">' +
                        '    <li><a class="dropdown-item edit-customer" title="Edit Customer">Edit</a></li>' +
                        '    <li><a class="dropdown-item delete-customer" id=' + row.id + ' title="Delete Collection">Delete</a></li>' +
                        '  </ul>' +
                        '</div>' +
                        '';

                    $(".dropdown-toggle").css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");
                    return dropdown;
                }
            },
        ],
        drawCallback: function() {
            $('[data-toggle="popover"]').popover();
        },
        'columnDefs': [{
            'targets': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            'orderable': false,
        }],
        "order": [
            [2, 'asc']
        ],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
        drawCallback: function() {
            $('.paginate_button:not(.disabled)', this.api().table().container())
                .on('click', function() {
                    inputAllCount = 0;
                    $(".customerInputItem").prop('checked', false);
                    $(".customerInputAll").prop('checked', false);
                });
        }

    });

    $(".paginate_button").on("click", function() {
        $(".dropdown-toggle").css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");
    })

    var tdTag = $("tbody tr>td");

    tdTag.attr({
        "title": "menu",
        "class": "menu-customer"
    });

    $('.main-menu-customer').parent().removeClass("menu-customer");

    $.each($(".menu-customer"), function(i, v) {
        if ($(this).parent().find("td>p").attr("id") > 0) {
            $(this).css("cursor", "pointer");
            $(this).attr("title", "Last Order");
        }
    });

    var deleteCustomerID = '';
    $(".delete-customer").on('click', function() {
        $('#destroy-modal').modal('show');
        deleteCustomerID = $(this).parents().eq(4).find(".customerId").attr("id");
        $(".del-alert").html(
            "<h4>" + "Are you sure you want to delete?" + "</h4>"
        );
    });

    $(".delete-item").on("click", function() {
        location.href = "/private/admin/customers/delete/" + deleteCustomerID
    });

    $(".edit-customer").on("click", function() {

        var parent = $(this).parents().eq(4).children("td");

        var id = parent.eq(0).find(".customerId").attr("id");

        var firstName = parent.eq(1).find("p").text();
        var lastName = parent.eq(2).text();
        var email = parent.eq(3).text();
        var phone = parent.eq(4).text();


        token_();
        $.ajax({
            type: "post",
            url: "/private/admin/customer/editcustomer/req",
            data: {
                "id": id,
                "firstName": firstName,
                "lastName": lastName,
                "email": email,
                "phone": phone
            },
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
                    "/private/admin/customer/editcustomer";
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });

    });

    $(".menu-customer").on("click", function() {

        var id = $(this).parent().find(".orderId").attr("id");

        if (id > 0) {
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
                success: function(response) {
                    window.location.href =
                        "/private/admin/orders/item/" +
                        id;
                },
                complete: function() {
                    $("#loader").hide();
                    $("body").css("opacity", "1");
                }
            });
        }
    });

    $(".customerInputAll").on("click", function() {

        if (inputAllCount == 0) {
            $(".customerInputItem").prop('checked', true);
            inputAllCount++;
            $("#customerInputAll").prop('checked', true);
        } else {
            $(".customerInputItem").prop('checked', false);
            $("#customerInputAll").prop('checked', false);
            inputAllCount = 0;
        }

    });

    $(".csvFile").on("click", function() {
        var customerId = [];
        $.each($(".customerInputItem"), function(index, value) {
            if ($(this).is(':checked')) {
                customerId.push($(this).attr('id'));
            }
        });
        token_();
        $.ajax({
            type: "post",
            url: "/private/admin/customers/export",
            data: {
                "customerId": customerId,
            },
            beforeSend: function() {
                $("#loader").show();
                $("body").css("opacity", "0.6");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error" + " " + thrownError);
                $("#loader").hide();
            },
            success: function() {
                window.location.href = "/private/admin/customers/export";
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });

    });

}