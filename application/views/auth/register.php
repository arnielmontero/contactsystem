<!-- application/views/auth/register.php -->
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2>Register</h2>
        <?php echo validation_errors(); ?>
        <form method="post" action="<?php echo site_url('auth/register'); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-success">Register</button>
            <div class="text-center">
                <p>Not a member? <a href="<?=base_url().'login'?>">Login</a></p>    
            </div>
        </form>
    </div>
</div>