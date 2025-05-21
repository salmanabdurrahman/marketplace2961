<div class="container">
    <h5>Edit Data Slider</h5>
    <form action="<?php echo base_url('/slider/edit/' . $slider["id_slider"]); ?>" method="POST"
        enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Caption Slider</label>
            <!-- <input type="text" name="caption_slider" class="form-control"
                value="<?php echo set_value("caption_slider", $slider["caption_slider"]); ?>" autofocus> -->
            <textarea name="caption_slider" class="form-control"
                id="myEditor"><?php echo set_value("caption_slider", $slider["caption_slider"]); ?></textarea>
            <div class="text-danger small"><?php echo form_error("caption_slider"); ?></div>
        </div>
        <div class="mb-1">
            <label>Foto Lama</label>
            <img src="<?php echo $this->config->item("url_slider") . $slider["foto_slider"]; ?>"
                alt="<?php echo $slider["caption_slider"]; ?>" class="d-block" width="300">
        </div>
        <div class="form-group mb-3">
            <label>Foto Slider</label>
            <input type="file" name="foto_slider" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
    </form>
</div>