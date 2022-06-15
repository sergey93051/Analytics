function slideshow() {
    var mainImage = $('.main_product_image');

    $("#thumbnail li").on("click", function() {
        var nextImgSrc = $(this).children("img").attr("src");
        var nextImgId = $(this).children("img").attr("id");
        mainImage.attr("src", nextImgSrc);
        mainImage.attr("id", nextImgId);

    });

}

function imagedelete() {

    $(".img-delete-btn").on("click", function() {
        $('#destroy-modal-image').modal('show');
        $(".del-alert").html(
            "<h4>" + "Are you sure you want to delete?" + "</h4>"
        );
    })

    $(".deleteImages").click(function() {

        var id = $('.main_product_image').attr("id");
        token_();
        $.ajax({
            type: "post",
            url: "/private/admin/image/delete/req",
            data: { id, id },
            beforeSend: function() {
                $("#loader").show();
                $("body").css("opacity", "0.6");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error" + " " + thrownError);
                $("#loader").hide();
            },
            success: function() {
                window.location.reload();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
                id = "";
            }
        });

    });

}

function variants(variants) {

    var image = $("#thumbnail li img");

    $.each(image, function(i, v) {
        if ($(this).attr("alt") == variants[0].image_id) {
            $('.main_product_image').attr("src", $(this).attr("src"));
        } else {
            $('.main_product_image').attr("src", image.eq(0).attr("src"));
        }
    });

    var id = "";

    $("#select-variant").on("change", function() {
        var selectID = $(this).val();
        $.each(variants, function(indexInArray, valueOfElement) {
            if (selectID == indexInArray) {
                $(".variants-delete-btn").attr("id", JSON.stringify([valueOfElement.product_id, valueOfElement.id]))
                $(".variants-price").html(valueOfElement.price);
                $(".li-options").html(valueOfElement.options);
                $(".li-sku").html(valueOfElement.sku);
                $(".li-inventory__quantity").html(valueOfElement.inventory_quantity);
                $(".li-inventory__policy").html(valueOfElement.inventory_policy);
                $(".li-taxable").html(valueOfElement.taxable);
                $(".li-weight").html(valueOfElement.weight);
                $(".li-weight__unit").html(valueOfElement.weight_unit);
                $(".li-created__at").html(valueOfElement.created_at);
                $(".li-updated__at").html(valueOfElement.updated_at);
                $(".variants-image").val(valueOfElement.image_id);
                var image_id = valueOfElement.image_id
                if (image_id) {
                    $.each(image, function(i, v) {
                        if (image_id == $(this).attr("alt")) {
                            $('.main_product_image').attr("src", $(this).attr("src"));
                        }
                    });
                } else {
                    $('.main_product_image').attr("src", image.eq(0).attr("src"));
                }

            }

        });
    });

    $(".variants-delete-btn").on("click", function() {
        $('#destroy-modal-variants').modal('show');

        id = $(this).attr("id");

        $(".del-alert").html(
            "<h4>" + "Are you sure you want to delete?" + "</h4>"
        );
    });

    $(".delete-variants").click(function() {
        token_();
        $.ajax({
            type: "post",
            url: "/private/admin/products/delete/req",
            data: { id, id },
            beforeSend: function() {
                $("#loader").show();
                $("body").css("opacity", "0.6");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error" + " " + thrownError);
                $("#loader").hide();
            },
            success: function() {
                window.location.reload();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
                id = "";
            }
        });
    });


}