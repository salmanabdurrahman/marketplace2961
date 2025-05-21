<div class="container">
    <h5>Tambah Data Slider</h5>
    <form action="<?php echo base_url('/slider/tambah'); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Caption Slider</label>
            <!-- <input type="text" name="caption_slider" class="form-control" autofocus
                value="<?php echo set_value("caption_slider"); ?>"> -->
            <textarea name="caption_slider" class="form-control" id="myEditor"></textarea>
            <div class="text-danger small"><?php echo form_error("caption_slider"); ?></div>
        </div>
        <div class="form-group mb-3">
            <label>Foto Slider</label>
            <input type="file" name="foto_slider" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
    </form>
</div>