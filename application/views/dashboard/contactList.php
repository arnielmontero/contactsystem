<div class="row">
    <div class="col-md-12">
        <h2>Contact List</h2>  <a href="<?php echo site_url('contact/add/'); ?>" class="btn btn-success">Add</a>
        <!-- Contact list HTML with search, pagination, and delete confirmation -->
        <table class="table">
            <thead>
                <tr>
                    <th>Contact Name</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Contact Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $contact->contact_name; ?></td>
                        <td><?php echo $contact->company; ?></td>
                        <td><?php echo $contact->phone; ?></td>
                        <td><?php echo $contact->contact_email; ?></td>
                        <td>
                            <a href="<?php echo site_url('contact/edit/' . $contact->contact_id); ?>" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger delete-contact" data-contact-id="<?php echo $contact->contact_id; ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>

<!-- Delete confirmation modal -->
<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this contact?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>


