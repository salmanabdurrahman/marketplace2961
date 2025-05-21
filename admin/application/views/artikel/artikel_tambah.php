<div class="container">
    <h5>Tambah Data Artikel</h5>
    <form action="<?php echo base_url('/artikel/tambah'); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul_artikel" class="form-control" autofocus
                value="<?php echo set_value("judul_artikel"); ?>">
            <div class="text-danger small"><?php echo form_error("judul_artikel"); ?></div>
        </div>
        <div class="form-group mb-3">
            <label>Isi Artikel</label>
            <!-- <input type="text" name="caption_artikel" class="form-control" autofocus
                value="<?php echo set_value("caption_artikel"); ?>"> -->
            <textarea name="isi_artikel" class="form-control" id="myEditor"></textarea>
            <div class="text-danger small"><?php echo form_error("isi_artikel"); ?></div>
        </div>
        <div class="form-group mb-3">
            <label>Foto Artikel</label>
            <input type="file" name="foto_artikel" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
    </form>
</div>