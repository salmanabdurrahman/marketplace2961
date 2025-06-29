<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Tombol Kembali -->
            <div class="mb-3">
                <a href="<?php echo base_url('/seller/produk'); ?>" class="text-decoration-none fw-semibold"
                    style="color: var(--green-accent);">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Produk
                </a>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Edit Produk</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo base_url('/seller/produk/edit/' . $produk["id_produk"]); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" autofocus
                                value="<?php echo set_value("nama_produk", $produk["nama_produk"]); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("nama_produk"); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Harga Produk</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="harga_produk" class="form-control"
                                        value="<?php echo set_value("harga_produk", $produk["harga_produk"]); ?>">
                                </div>
                                <div class="text-danger small mt-1"><?php echo form_error("harga_produk"); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Berat Produk</label>
                                <div class="input-group">
                                    <input type="number" name="berat_produk" class="form-control"
                                        value="<?php echo set_value("berat_produk", $produk["berat_produk"]); ?>">
                                    <span class="input-group-text">gram</span>
                                </div>
                                <div class="text-danger small mt-1"><?php echo form_error("berat_produk"); ?></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori Produk</label>
                            <select name="id_kategori" class="form-select">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?php echo $k["id_kategori"]; ?>" <?php if ($k["id_kategori"] === $produk["id_kategori"])
                                           echo "selected"; ?>>
                                        <?php echo $k["nama_kategori"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="text-danger small mt-1"><?php echo form_error("id_kategori"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea name="deskripsi_produk" class="form-control"
                                rows="4"><?php echo set_value("deskripsi_produk", $produk["deskripsi_produk"]); ?></textarea>
                            <div class="text-danger small mt-1"><?php echo form_error("deskripsi_produk"); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Foto Saat Ini</label>
                                <img src="<?php echo $this->config->item("url_produk") . $produk["foto_produk"]; ?>"
                                    alt="<?php echo $produk["nama_produk"]; ?>" class="img-thumbnail d-block">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Ganti Foto Produk</label>
                                <input type="file" name="foto_produk" class="form-control">
                                <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                                <div class="text-danger small mt-1"><?php echo form_error("foto_produk"); ?></div>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 mt-4" type="submit" value="simpan">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>