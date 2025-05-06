<div class="container">
    <h5>Edit Data Produk</h5>
    <form action="<?php echo base_url('/seller/produk/edit/' . $produk["id_produk"]); ?>" method="post"
        enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" autofocus
                value="<?php echo set_value("nama_produk", $produk["nama_produk"]); ?>">
            <div class="text-danger small"><?php echo form_error("nama_produk"); ?></div>
        </div>
        <div class="form-group mb-3">
            <label>Harga Produk</label>
            <input type="number" name="harga_produk" class="form-control"
                value="<?php echo set_value("harga_produk", $produk["harga_produk"]); ?>">
            <div class="text-danger small"><?php echo form_error("harga_produk"); ?></div>
        </div>
        <div class="mb-1">
            <label>Foto Lama</label>
            <img src="<?php echo base_url("assets/produk/" . urlencode($produk["foto_produk"])); ?>"
                alt="<?php echo $produk["nama_produk"]; ?>" class="d-block" width="300">
        </div>
        <div class="form-group mb-3">
            <label>Foto Produk</label>
            <input type="file" name="foto_produk" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Deskripsi Produk</label>
            <textarea name="deskripsi_produk" class="form-control"
                rows="3"><?php echo set_value("deskripsi_produk", $produk["deskripsi_produk"]); ?></textarea>
            <div class="text-danger small"><?php echo form_error("deskripsi_produk"); ?>
            </div>
        </div>
        <div class="form-group mb-3">
            <label>Kategori Produk</label>
            <select name="id_kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?php echo $k["id_kategori"]; ?>" <?php if ($k["id_kategori"] === $produk["id_kategori"])
                           echo "selected"; ?>><?php echo $k["nama_kategori"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="text-danger small"><?php echo form_error("id_kategori"); ?></div>
        </div>
        <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
    </form>
</div>