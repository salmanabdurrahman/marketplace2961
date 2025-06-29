<style>
    /* Style khusus untuk halaman akun */
    .account-nav .list-group-item.active {
        background-color: var(--green-dark);
        border-color: var(--green-dark);
    }

    .account-nav .list-group-item-action:hover {
        background-color: var(--green-light);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--green-accent);
        box-shadow: 0 0 0 0.25rem rgba(58, 90, 64, 0.25);
    }
</style>

<main class="container py-5">
    <div class="row">
        <!-- Kolom Navigasi Samping -->
        <div class="col-lg-3 mb-4 mb-lg-0">
            <nav class="account-nav">
                <div class="list-group">
                    <a href="<?php echo base_url('transaksi'); ?>" class="list-group-item list-group-item-action">
                        <i class="bi bi-receipt me-2"></i> Riwayat Pembelian
                    </a>
                    <a href="<?php echo base_url('akun'); ?>" class="list-group-item list-group-item-action active">
                        <i class="bi bi-person-circle me-2"></i> Profil Saya
                    </a>
                    <a href="<?php echo base_url('logout'); ?>"
                        class="list-group-item list-group-item-action text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </div>
            </nav>
        </div>
        <!-- Kolom Konten Utama -->
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Ubah Profil Akun</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo base_url('akun'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_member" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member"
                                    value="<?php echo set_value("nama_member", $this->session->userdata("nama_member")); ?>">
                                <div class="text-danger small mt-1"><?php echo form_error("nama_member"); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email_member" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_member" name="email_member"
                                    value="<?php echo set_value("email_member", $this->session->userdata("email_member")); ?>">
                                <div class="text-danger small mt-1"><?php echo form_error("email_member"); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="wa_member" class="form-label">Nomor WhatsApp</label>
                                <input type="text" class="form-control" id="wa_member" name="wa_member"
                                    value="<?php echo set_value("wa_member", $this->session->userdata("wa_member")); ?>">
                                <div class="text-danger small mt-1"><?php echo form_error("wa_member"); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kode_distrik_member" class="form-label">Kota/Kabupaten</label>
                                <select name="kode_distrik_member" id="kode_distrik_member" class="form-select">
                                    <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                                    <?php
                                    $selected_city_id = set_value("kode_distrik_member", $this->session->userdata("kode_distrik_member"));
                                    foreach ($distrik as $key => $value):
                                        $is_selected = ($selected_city_id == $value["city_id"]) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $value["city_id"]; ?>" <?php echo $is_selected; ?>>
                                            <?php echo $value["type"]; ?>     <?php echo $value["city_name"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger small mt-1"><?php echo form_error("kode_distrik_member"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_member" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat_member" name="alamat_member"
                                rows="3"><?php echo set_value("alamat_member", $this->session->userdata("alamat_member")); ?></textarea>
                            <div class="text-danger small mt-1"><?php echo form_error("alamat_member"); ?></div>
                        </div>
                        <hr class="my-4">
                        <p class="fw-semibold">Ubah Password</p>
                        <div class="mb-3">
                            <label for="password_member" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password_member" name="password_member">
                            <div class="form-text">*Biarkan kosong jika tidak ingin mengubah password.</div>
                            <div class="text-danger small mt-1"><?php echo form_error("password_member"); ?></div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>