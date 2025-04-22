<div class="container mt-5">
    <div class="row">
        <div class="col-4 md-4 mt-5 offset-md-4 bg-white shadow p-5">
            <h5>Login</h5>
            <form action="<?php echo base_url('login'); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" autofocus
                        value="<?php echo set_value("username"); ?>">
                    <div class="text-danger small"><?php echo form_error("username"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="<?php echo set_value("password"); ?>">
                    <div class="text-danger small"><?php echo form_error("password"); ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>