<?php
if ($this->session->flashdata("pesan_error")) {
    echo "
    <div class='alert alert-danger container' role='alert'>
        " . $this->session->flashdata("pesan_error") . "
    </div>
    ";
}
?>

<div class="container">
    <h5>Edit Data Kategori</h5>
    <form action="<?php echo base_url('/kategori/edit/' . $kategori["id_kategori"]); ?>" method="POST"
        enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                value="<?php echo $kategori["nama_kategori"]; ?>" autofocus>
        </div>
        <div class="mb-1">
            <label>Foto Lama</label>
            <img src="<?php echo base_url("assets/kategori/" . urlencode($kategori["foto_kategori"])); ?>"
                alt="<?php echo $kategori["nama_kategori"]; ?>" class="d-block" width="300">
        </div>
        <div class="form-group mb-3">
            <label>Foto Kategori</label>
            <input type="file" name="foto_kategori" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
    </form>
</div>