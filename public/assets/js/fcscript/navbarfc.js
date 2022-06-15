    var count = 0;
    $('body').on('click', $('#dropdown-Analytics-fcGraphNav'), function(e) {

        if ($(e.target)[0].id == 'dropdown-Analytics-fcGraphNav') {

            if (count == 0) {
                $('#dropdown-Analytics-fcGraphNav').parent().find(".dropdown-menu").addClass('show');
                count++;
            } else {
                $('#dropdown-Analytics-fcGraphNav').parent().find(".dropdown-menu").removeClass('show');
                count = 0;
            }
        } else {
            $('#dropdown-Analytics-fcGraphNav').parent().find(".dropdown-menu").removeClass('show');
            count = 0;
        }
    });