<div class="container">
    <h5>Data Produk</h5>
    <div class="row">
        <?php foreach ($produk as $k): ?>
            <div class="col-md-4 my-3">
                <div class="card border-0 shadow-sm">
                    <img src="<?php echo base_url("assets/produk/" . urlencode($k["foto_produk"])); ?>"
                        alt="<?php echo $k["nama_produk"]; ?>" height="300" loading="lazy">
                    <div class="card-body text-center">
                        <h6><?php echo $k["nama_produk"]; ?></h6>
                        <p class="lead">Rp. <?php echo number_format($k["harga_produk"]); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>