<div class="container mt-5">
    <div class="row">
        <div class="col-4 md-4 mt-5 offset-md-4 bg-white shadow p-5">
            <h5>Login</h5>
            <form action="<?php echo base_url('login'); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email_member" autofocus
                        value="<?php echo set_value("email_member"); ?>">
                    <div class="text-danger small"><?php echo form_error("email_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password_member"
                        value="<?php echo set_value("password_member"); ?>">
                    <div class="text-danger small"><?php echo form_error("password_member"); ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>