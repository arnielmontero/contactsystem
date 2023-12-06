<!-- application/views/contact/edit.php -->
<h2>Edit Contact</h2>

<form method="post" action="<?php echo site_url('contact/edit/' . $contact->contact_id); ?>">
    <div class="form-group">
        <label for="contact_name">Contact Name:</label>
        <input type="text" class="form-control" id="contact_name" name="contact_name" value="<?php echo $contact->contact_name; ?>" required>
    </div>

    <div class="form-group">
        <label for="company">Company:</label>
        <input type="text" class="form-control" id="company" name="company" value="<?php echo $contact->company; ?>" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $contact->phone; ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Contact Email:</label>
        <input type="text" class="form-control" id="email" name="contact_email" value="<?php echo $contact->contact_email; ?>" required>
    </div>
    <!-- Add other fields -->

    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-danger">Cancel</a>
</form>
