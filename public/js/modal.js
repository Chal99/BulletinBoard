$(document).ready(function() {
    $("#resetBtn").click(function() {
        /* Single line Reset function executes on click of Reset Button */
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("type-selected").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("dob").value = "";
        document.getElementById("address").value = "";
        document.getElementById("profile").src = "";
        document.getElementById("profile").alt = "profile reseted";
        document.getElementById("title").value = "";
        document.getElementById("description").value = "";
        document.getElementById("status").value = "";
    });

    $("#resetBtnPost").click(function() {
        /* Single line Reset function executes on click of Reset Button */
        document.getElementById("title").value = "";
        document.getElementById("description").value = "";
        document.getElementById("status").value = "";
    });
});
$(function () {
    $('#UserDeleteModel').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var name = button.data('name');
        var email = button.data('email');
        var type = button.data('type');
        var phone = button.data('phone');
        var dob = button.data('dob');
        var address = button.data('address');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Delete User:' + name);
        modal.find('#id').val(id);
        modal.find('#user_id').val(id);
        modal.find('#name').val(name);
        modal.find('#email').val(email);
        if (type == 0) {
            modal.find('#type').val('Admin');
        }
        else {
            modal.find('#type').val('User');
        }
        modal.find('#phone').val(phone);
        modal.find('#dob').val(dob);
        modal.find('#address').val(address);
    });
});

$(document).on("click", ".open-UserDetailModel", function () {
    var name = $(this).data('name');
    var email = $(this).data('email');
    var type = $(this).data('type');
    var phone = $(this).data('phone');
    var dob = $(this).data('dob');
    var address = $(this).data('address');
    var createuserid = $(this).data('createuserid');
    var updateduserid = $(this).data('updateduserid');
    var createddate = $(this).data('createddate');
    var updateddate = $(this).data('updateddate');
    $(".modal-body #name").val(name);
    $(".modal-body #email").val(email);
    if (type == 0) {
        $(".modal-body #type").val('Admin');
    }
    else {
        $(".modal-body #type").val('User');
    }
    $(".modal-body #phone").val(phone);
    $(".modal-body #dob").val(dob);
    $(".modal-body #address").val(address);
    if (createuserid == 0) {
        $(".modal-body #create-user").val('Admin');
    }
    else {
        $(".modal-body #create-user").val('User');
    }
    if (updateduserid == 0) {
        $(".modal-body #updated-user").val('Admin');
    }
    else {
        $(".modal-body #updated-user").val('User');
    }
    $(".modal-body #created-date").val(createddate);
    $(".modal-body #updated-date").val(updateddate);
    $(".modal-body img").attr("src", $(this).attr('data-photo'));
});

$(function () {
    $('#PostDeleteModel').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var title = button.data('title');
        var description = button.data('description');
        var status = button.data('status');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Delete Post:' + title);
        modal.find('#id').val(id);
        modal.find('#post_id').val(id);
        modal.find('#title').val(title);
        modal.find('#description').val(description);
        if (status == 1) {
            modal.find('#status').val('Active');
        }
        else {
            modal.find('#status').val('No-Active');
        }
    });
});

$(document).on("click", ".open-PostDetailModel", function () {
    var title = $(this).data('title');
    var description = $(this).data('description');
    var status = $(this).data('status');
    var createuserid = $(this).data('createuserid');
    var updateduserid = $(this).data('updateduserid');
    var createddate = $(this).data('createddate');
    var updateddate = $(this).data('updateddate');
    $(".modal-body #title").val(title);
    $(".modal-body #description").val(description);
    if (status == 1) {
        $(".modal-body #status").val('Active');
    }
    else {
        $(".modal-body #status").val('No-Active');
    }
    if (createuserid == 0) {
        $(".modal-body #create-user").val('Admin');
    }
    else {
        $(".modal-body #create-user").val('User');
    }
    if (updateduserid == 0) {
        $(".modal-body #updated-user").val('Admin');
    }
    else {
        $(".modal-body #updated-user").val('User');
    }
    $(".modal-body #created-date").val(createddate);
    $(".modal-body #updated-date").val(updateddate);
});