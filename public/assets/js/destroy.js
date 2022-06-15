 function deleteItem(btnelem, url) {

     var id = 0;

     btnelem.on("click", function() {

         //  $(".alert-show-message").css("display", "block");
         //  $(".gradeA>td>input").attr("disabled", "disabled");
         $('#destroy-modal').modal('show');

         id = $(this).attr("id");

         $(".del-alert").html(
             "<h4>" + "Are you sure you want to delete?" + "</h4>" +
             "<strong>" +
             "this lead /customer" +
             "</strong>"
         );

         //  $(".del-alert").html(
         //      "<h4>" + "Are you sure you want to delete?" + "</h4>" +
         //      "<strong>" +
         //      "id" + "->" + id + " " +
         //      "</strong>"
         //  );
     });

     //  $(".delete-item").on("click", function() {
     //      $.ajaxSetup({
     //          headers: {
     //              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //          }
     //      });
     //      $.ajax({
     //          url: url + id,
     //          type: 'POST',

     //          data: {
     //              _method: 'DELETE',
     //              "id": id
     //          },
     //          success: function() {
     //              id = 0;
     //              window.location.reload();
     //          }
     //      });
     //  });

 }

 function modalDelete() {
     $(".modal-close").on("click", function() {
         $(this).parents().eq(3).modal('hide');
     });
 }