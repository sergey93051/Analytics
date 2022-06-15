function profile() {

    let count = 0;
    $(".show-editProfile").click(function() {
        if (count == 0) {
            $(".profile-info").hide(500);
            $(".form-edit-profile").show();
            $(".profile-info-header").html("Update your profile");
            count++;
        } else if (count == 1) {
            count = 0;
            $(".form-edit-profile").hide();
            $(".profile-info").show(500);
            $(".profile-info-header").html("Profile Information");
        }
    });

}
