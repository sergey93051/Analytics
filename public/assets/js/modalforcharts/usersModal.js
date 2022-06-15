function usersModal() {

    $(".usersTab-modal").modal({ backdrop: 'static', keyboard: false });
    $(".show-users-table").on("click", function() {
        $(".usersTab-modal").modal("show");
    });

    $(".close-modal-usersTab").on("click", function() {
        $(".usersTab-modal").modal("hide");
    });

    var table = $('#usersTab-Table').DataTable({

        "bInfo": false,
        "paging": false,
        "scrollY": "300px",
        "scrollX": true,
        "scrollCollapse": true,
        // data: dbModal,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, 80]
        ],

    });
}