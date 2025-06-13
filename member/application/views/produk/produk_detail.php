<div class="container">
    <div class="row mb-5">
        <div class="col-md-6">
            <img src="<?php echo $this->config->item("url_produk") . $produk["foto_produk"]; ?>" class="w-100" alt="">
        </div>
        <div class="col-md-6">
            <h1><?php echo $produk["nama_produk"]; ?></h1>
            <span class="badge bg-dark"><?php echo $produk["nama_kategori"]; ?></span>
            <p class="lead">Rp. <?php echo number_format($produk["harga_produk"], 0, ',', '.'); ?></p>
            <form action="" method="post">
                <div class="input-group">
                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" required>
                    <button type="submit" class="btn btn-primary">Beli</button>
                </div>
            </form>
            <br>
            <p class="lead"><?php echo $produk["deskripsi_produk"]; ?></p>
        </div>
    </div>
</div>