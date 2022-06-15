$(document).ready(function() {

    hoverProfmenu();
});

function hoverProfmenu() {

    $("#dropdown__SettProf__btn").hover(function() {
        $(this).children().eq(1).css({
            fontSize: '16px',
            color: "#cb0c9f"
        });
    }, function() {
        $(this).children().eq(1).css({
            fontSize: '15px',
            color: "#67748e"
        });
    });
}