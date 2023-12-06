<!-- application/views/contact/index.php -->
<h2>Contact List</h2>

<table class="table">
    <thead>
        <tr>
            <th>Contact Name</th>
            <!-- Add other columns -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact->contact_name; ?></td>
                <!-- Add other columns -->
                <td>
                    <a href="<?php echo site_url('contact/edit/' . $contact->contact_id); ?>" class="btn btn-primary">Edit</a>
                    <a href="<?php echo site_url('contact/delete/' . $contact->contact_id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo site_url('contact/add'); ?>" class="btn btn-success">Add Contact</a>
