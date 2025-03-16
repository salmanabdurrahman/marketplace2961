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
    <h5>Tambah Data Kategori</h5>
    <form action="<?php echo base_url('/kategori/tambah'); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" autofocus>
        </div>
        <div class="form-group mb-3">
            <label>Foto Kategori</label>
            <input type="file" name="foto_kategori" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
    </form>
</div>