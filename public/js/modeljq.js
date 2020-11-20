$(document).ready(function () {
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
            if(type==0){
                modal.find('#type').val('Admin');
            }
            else{
                modal.find('#type').val('User');
            }
            modal.find('#phone').val(phone);
            modal.find('#dob').val(dob);
            modal.find('#address').val(address);
        });
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
            if(status==1){
                modal.find('#status').val('Active');
            }
            else{
                modal.find('#status').val('No-Active');
            }
        });
    });

});