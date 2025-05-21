<div class="container">
    <h5>Edit Data Artikel</h5>
    <form action="<?php echo base_url('/artikel/edit/' . $artikel["id_artikel"]); ?>" method="POST"
        enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul_artikel" class="form-control" autofocus
                value="<?php echo set_value("judul_artikel", $artikel["judul_artikel"]); ?>">
            <div class="text-danger small"><?php echo form_error("judul_artikel"); ?></div>
        </div>
        <div class="form-group mb-3">
            <label>Caption Artikel</label>
            <!-- <input type="text" name="isi_artikel" class="form-control"
                value="<?php echo set_value("isi_artikel", $artikel["isi_artikel"]); ?>" autofocus> -->
            <textarea name="isi_artikel" class="form-control"
                id="myEditor"><?php echo set_value("isi_artikel", $artikel["isi_artikel"]); ?></textarea>
            <div class="text-danger small"><?php echo form_error("isi_artikel"); ?></div>
        </div>
        <div class="mb-1">
            <label>Foto Lama</label>
            <img src="<?php echo $this->config->item("url_artikel") . $artikel["foto_artikel"]; ?>"
                alt="<?php echo $artikel["judul_artikel"]; ?>" class="d-block" width="300">
        </div>
        <div class="form-group mb-3">
            <label>Foto Artikel</label>
            <input type="file" name="foto_artikel" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
    </form>
</div>