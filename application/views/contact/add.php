<!-- application/views/contact/add.php -->
<h2>Add Contact</h2>

<form method="post" action="<?php echo site_url('contact/add'); ?>">
    <div class="form-group">
        <label for="contact_name">Contact Name:</label>
        <input type="text" class="form-control" id="contact_name" name="contact_name" required>
    </div>
    <div class="form-group">
        <label for="company">Company:</label>
        <input type="text" class="form-control" id="company" name="company" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="contact_email">Contact Email:</label>
        <input type="text" class="form-control" id="contact_email" name="contact_email" required>
    </div>
    <!-- Add other fields -->

    <button type="submit" class="btn btn-success">Add</button>
    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-danger">Cancel</a>
</form>
