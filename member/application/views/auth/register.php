<div class="container mt-5">
    <div class="row">
        <div class="col-4 md-4 mt-5 offset-md-4 bg-white shadow p-5">
            <h5>Register</h5>
            <form action="<?php echo base_url('register'); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email_member" autofocus
                        value="<?php echo set_value("email_member"); ?>">
                    <div class="text-danger small"><?php echo form_error("email_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama_member"
                        value="<?php echo set_value("nama_member"); ?>">
                    <div class="text-danger small"><?php echo form_error("nama_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="wa">WhatsApp</label>
                    <input type="text" class="form-control" id="wa" name="wa_member"
                        value="<?php echo set_value("wa_member"); ?>">
                    <div class="text-danger small"><?php echo form_error("wa_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat_member" id="alamat_member" class="form-control"
                        rows="3"><?php echo set_value("alamat_member"); ?></textarea>
                    <div class="text-danger small"><?php echo form_error("alamat_member"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="city_id">Kota/Kabupaten</label>
                    <select name="city_id" id="city_id" class="form-select">
                        <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                        <?php foreach ($distrik as $key => $value): ?>
                            <option value="<?php echo $value["city_id"]; ?>" <?php echo set_select("city_id", $value["city_id"]); ?>>
                                <span style="font-weight:bold;"><?php echo $value["city_name"]; ?></span>
                                <span style="color:#888;">(<?php echo $value["type"]; ?>)</span>
                                <span style="color:#007bff;"><?php echo $value["province"]; ?></span>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="text-danger small"><?php echo form_error("city_id"); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password_member"
                        value="<?php echo set_value("password_member"); ?>">
                    <div class="text-danger small"><?php echo form_error("password_member"); ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>