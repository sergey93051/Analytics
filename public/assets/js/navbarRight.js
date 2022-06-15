function navbarRight() {
    changeColorTeg();
    //color bar
    $(".change-shopify").css("color", "red");
    $(".badge").on("click", function() {

        var dataColor = $(this).attr("data-color");

        switch (dataColor) {
            case "primary":
                localStorage.setItem("badgeColor", "#cb0c9f");
                changeColorTeg();
                break;
            case "info":
                localStorage.setItem("badgeColor", "#17c1e8");
                changeColorTeg();
                break;
            case "success":
                localStorage.setItem("badgeColor", "#82d616");
                changeColorTeg("#82d616");
                break;
            case "warning":
                localStorage.setItem("badgeColor", "#fbcf33");
                changeColorTeg("#fbcf33");
                break;
            case "danger":
                localStorage.setItem("badgeColor", "#ea0606");
                changeColorTeg();
                break;
            default:
                localStorage.setItem("badgeColor", "#cb0c9f");
                changeColorTeg();
                break;
        }
    });

    function changeColorTeg() {

        if (localStorage.getItem("badgeColor") == null) {
            localStorage.setItem("badgeColor", "#cb0c9f");
        }
        let color = localStorage.getItem("badgeColor");

        $(".navbar-graph").css('border-bottom', "3px solid" + color + "", "!important");
        $(".change-shopify").css("background", color, "!important");
        $(".navbar-vertical .navbar-nav>.nav-item .nav-link.active .icon").css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");
        $(".csvFile,.change-FbId,.inbox-head,.show-browser-table,#dropdownMenuLink,.show-checkout-table,.show-psc-table,.show-usersvisits-table,.show-cartcheckout-table,.show-dayindex-table,.show-userAov-table,.show-revenue-table,.show-overallTab-table,.show-retuser-table,.show-users-table,.show-anypageviwes-table")
            .css("background-image", "linear-gradient(35deg," + color + "," + color + ")", "!important");

        $(".fb-hover-navbar>li a").hover(function() {
            $(this).css('color', color);
        }, function() {
            $(this).css('color', '#344767');
        });

    }


}