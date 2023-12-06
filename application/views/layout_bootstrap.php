<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'My Application'; ?></title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom styles if needed -->
</head>
<body>

    <div class="container mt-5">
        <?php echo isset($content) ? $content : ''; ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Include your custom scripts if needed -->

    
    <script>
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
    </script>

</body>
</html>
