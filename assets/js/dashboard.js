  // Handle delete button click
  $('.delete-contact').click(function () {
    var contactId = $(this).data('contact-id');

    // Set the contact ID in the confirmation modal
    $('#confirmDelete').data('contact-id', contactId);

    // Show the confirmation modal
    $('#deleteModal').modal('show');
});

// Handle confirm delete button click
$('#confirmDelete').click(function () {
    var contactId = $(this).data('contact-id');
    // Send AJAX request to delete the contact
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('contact/delete/'); ?>' + contactId,
        success: function () {
            // Reload the page or update the contact list as needed
            location.reload();
        }
    });

    // Close the confirmation modal
    $('#deleteModal').modal('hide');
});