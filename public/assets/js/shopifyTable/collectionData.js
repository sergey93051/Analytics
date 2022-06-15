function collectionData(data) {

    var table = $('#collectionShopifyTable').DataTable({

        "processing": true,
        data: data,
        columns: [{
                data: "count",
            },
            {
                data: "title",
                render: function(data, type, row) {
                    var ptag = "<p  id=" + row.id + " >" + data + "</p>"
                    return ptag;
                }
            },
            {
                data: "body_html"
            },
            {
                data: "published_scope"
            },
            {
                data: "src",
                render: function(data, type, row) {
                    var img = "no";
                    if (row.src != "no") {
                        img = "<img  class='imgCollection' src=" + row
                            .src +
                            " width='150'>" +
                            "<p class='text-center p-1' >" + row.width + "x" + row.height +
                            "</p>";
                    }
                    return img;
                },
            },
            {
                data: "published_at"
            },
            {
                data: "dropdown",
                render: function(data, type, row) {
                    var dropdown = '' +
                        '<div class="dropdown main-menu-collection">' +
                        '  <a title="menu" class="btn btn-primery dropdown-toggle collection-dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">' +
                        '   Menu' +
                        '  </a>' +
                        '' +
                        '  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">' +
                        '    <li><a class="dropdown-item addProduct-collection" title="add product in the collection" >Add Product</a></li>' +

                        '    <li><a class="dropdown-item edit-collection" title="Edit Collection">Edit</a></li>' +
                        '    <li><a class="dropdown-item delete-collection" id=' + row.id + ' title="Delete Collection">Delete</a></li>' +
                        '  </ul>' +
                        '</div>' +
                        '';
                    let color = localStorage.getItem("badgeColor");
                    $(".collection-dropdown-toggle").css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");
                    return dropdown;
                }
            }
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

    $("tbody tr>td").attr({
        "title": "Products",
        "class": "menu-collection"
    });

    $('.main-menu-collection').parent().removeClass("menu-collection");

    $(".addProduct-collection").on("click", function() {
        var id = $(this).parents().eq(4).find("p").attr("id");
        location.href = "/private/admin/collection/addProducts/" + id
    });

    $(".edit-collection").on("click", function() {
        var parent = $(this).parents().eq(4).children("td");
        var id = parent.eq(1).find("p").attr("id");
        var name = parent.eq(1).find("p").text();
        var bodyHtml = parent.eq(2).text();
        var publishedScope = parent.eq(3).text();
        var src = parent.eq(3).find(".imgCollection").attr("src");

        token_();
        $.ajax({
            type: "post",
            url: "/private/admin/collection/editcollection/req",
            data: {
                "id": id,
                "name": name,
                "bodyHtml": bodyHtml,
                "publishedScope": publishedScope,
                "src": src
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
                    "/private/admin/collection/editcollection";
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });

    });

    var deleteCollectionId = '';
    $(".delete-collection").on('click', function() {
        $('#destroy-modal').modal('show');
        deleteCollectionId = $(this).attr("id");
        $(".del-alert").html(
            "<h4>" + "Are you sure you want to delete?" + "</h4>"
        );
    });

    $(".create-collection").on("click", function() {
        location.href = "/private/admin/collection/createcollection";
    });

    $(".delete-item").on("click", function() {
        location.href = "/private/admin/collection/deletecollection/" + deleteCollectionId;
    });

    $(".menu-collection").on("click", function(e) {

        var id = $(this).parent().find("p").attr("id");

        $.ajax({
            type: "get",
            url: "/private/admin/collection/products/" + id,
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

}