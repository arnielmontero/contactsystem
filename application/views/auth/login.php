<!-- application/views/auth/login.php -->
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2>Login</h2>
        <?php echo validation_errors(); ?>
        <form method="post" action="<?php echo site_url('auth/login'); ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="text-center">
                <p>Not a member? <a href="<?=base_url().'register'?>">Register</a></p>    
            </div>
        </form>
    </div>
</div>