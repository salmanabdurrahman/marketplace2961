<?php
if ($this->session->flashdata("pesan_sukses")) {
    echo "
    <div class='alert alert-success container' role='alert'>
        " . $this->session->flashdata("pesan_sukses") . "
    </div>
    ";
}

if ($this->session->flashdata("pesan_error")) {
    echo "
    <div class='alert alert-danger container' role='alert'>
        " . $this->session->flashdata("pesan_error") . "
    </div>
    ";
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-4 md-4 mt-5 offset-md-4 bg-white shadow p-5">
            <h5>Login</h5>
            <form action="<?php echo base_url('login'); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>