<style>
    body {
        background-color: #f7f7f7;
    }

    .form-signup-card {
        border-radius: 1rem;
    }
</style>

<main class="container">
    <div class="row justify-content-center align-items-center py-5">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="card border-0 shadow-lg form-signup-card">
                <div class="card-body p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Buat Akun Baru</h3>
                        <p class="text-muted">Isi data di bawah untuk menjadi member TokoKita.</p>
                    </div>
                    <form action="<?php echo base_url('register'); ?>" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama_member"
                                value="<?php echo set_value("nama_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("nama_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email_member" autofocus
                                value="<?php echo set_value("email_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("email_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="wa" class="form-label">WhatsApp</label>
                            <input type="text" class="form-control" id="wa" name="wa_member"
                                value="<?php echo set_value("wa_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("wa_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat_member" id="alamat_member" class="form-control"
                                rows="2"><?php echo set_value("alamat_member"); ?></textarea>
                            <div class="text-danger small mt-1"><?php echo form_error("alamat_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="city_id" class="form-label">Kota/Kabupaten</label>
                            <select name="city_id" id="city_id" class="form-select">
                                <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                                <?php foreach ($distrik as $key => $value): ?>
                                    <option value="<?php echo $value["city_id"]; ?>" <?php echo set_select("city_id", $value["city_id"]); ?>>
                                        <?php echo $value["type"]; ?>     <?php echo $value["city_name"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="text-danger small mt-1"><?php echo form_error("city_id"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password_member"
                                value="<?php echo set_value("password_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("password_member"); ?></div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <small>Sudah punya akun? <a href="<?php echo base_url('login'); ?>"
                                style="color: var(--green-accent);" class="fw-semibold">Login di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>