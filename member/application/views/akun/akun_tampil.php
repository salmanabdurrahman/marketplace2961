<div class="container mt-5">
    <div class="row">
        <div class="col-4 md-4 mt-5 offset-md-4 bg-white shadow p-5">
            <h5>Ubah Akun Member</h5>
            <form action="<?php echo base_url('akun'); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="email_member">Email</label>
                    <input type="text" class="form-control" id="email_member" name="email_member"
                        value="<?php echo set_value("email_member", $this->session->userdata("email_member")); ?>"
                        autofocus>
                    <div class="text-danger small"><?php echo form_error("email_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="nama_member">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_member" name="nama_member"
                        value="<?php echo set_value("nama_member", $this->session->userdata("nama_member")); ?>">
                    <div class="text-danger small"><?php echo form_error("nama_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat_member">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="alamat_member" name="alamat_member"
                        value="<?php echo set_value("alamat_member", $this->session->userdata("alamat_member")); ?>">
                    <div class="text-danger small"><?php echo form_error("alamat_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="wa_member">Nomer WA</label>
                    <input type="text" class="form-control" id="wa_member" name="wa_member"
                        value="<?php echo set_value("wa_member", $this->session->userdata("wa_member")); ?>">
                    <div class="text-danger small"><?php echo form_error("wa_membee"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="nama_distrik_member">Kota/Kabupaten</label>
                    <input type="text" class="form-control" id="nama_distrik_member" name="nama_distrik_member"
                        value="<?php echo set_value("nama_distrik_member", $this->session->userdata("nama_distrik_member")); ?>">
                    <div class="text-danger small"><?php echo form_error("nama_distrik_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="kode_distrik_member">Kode Kota/Kabupaten</label>
                    <input type="text" class="form-control" id="kode_distrik_member" name="kode_distrik_member"
                        value="<?php echo set_value("kode_distrik_member", $this->session->userdata("kode_distrik_member")); ?>">
                    <div class="text-danger small"><?php echo form_error("kode_distrik_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="text-danger small"><?php echo form_error("password"); ?></div>
                    <p class="text-muted">*Biarkan kosong jika tidak ingin mengubah password</p>
                </div>
                <button type=" submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>