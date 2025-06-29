<style>
    body {
        /* Latar belakang abu-abu sangat muda untuk kontras */
        background-color: #f7f7f7;
    }

    .form-signin-card {
        border-radius: 1rem;
    }
</style>

<main class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="card border-0 shadow-lg form-signin-card">
                <div class="card-body p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Selamat Datang!</h3>
                        <p class="text-muted">Login untuk melanjutkan ke TokoKita</p>
                    </div>
                    <form action="<?php echo base_url('login'); ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email_member" autofocus
                                value="<?php echo set_value("email_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("email_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password_member"
                                value="<?php echo set_value("password_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("password_member"); ?></div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <small>Belum punya akun? <a href="<?php echo base_url('register'); ?>"
                                style="color: var(--green-accent);" class="fw-semibold">Daftar sekarang</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>