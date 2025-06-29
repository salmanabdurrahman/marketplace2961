<style>
    .product-image {
        border-radius: 1rem;
        object-fit: cover;
        border: 1px solid #eee;
    }

    .product-price {
        color: var(--green-dark);
        font-weight: 700;
    }

    .product-category {
        background-color: var(--green-light) !important;
        color: var(--green-dark) !important;
        font-weight: 500;
    }
</style>

<main class="container py-5">
    <div class="row g-5">
        <!-- Kolom Gambar Produk -->
        <div class="col-md-6">
            <img src="<?php echo $this->config->item("url_produk") . $produk["foto_produk"]; ?>"
                class="w-100 shadow-sm product-image" alt="<?php echo $produk["nama_produk"]; ?>">
        </div>
        <!-- Kolom Informasi Produk -->
        <div class="col-md-6">
            <span class="badge product-category mb-2"><?php echo $produk["nama_kategori"]; ?></span>
            <h1 class="fw-bold display-6"><?php echo $produk["nama_produk"]; ?></h1>
            <p class="product-price h3 mt-2 mb-4">Rp. <?php echo number_format($produk["harga_produk"], 0, ',', '.'); ?>
            </p>
            <label class="fw-semibold mb-2">Deskripsi Produk:</label>
            <pre class="bg-light rounded p-3 text-dark"
                style="white-space: pre-wrap; font-family: inherit; font-size: 1rem;">
<?php echo htmlspecialchars($produk["deskripsi_produk"]); ?>
            </pre>
            <hr class="my-4">
            <form action="" method="post" class="mt-4">
                <div class="d-flex align-items-center">
                    <label for="jumlah" class="form-label me-3 mb-0">Jumlah:</label>
                    <div class="input-group">
                        <input type="number" name="jumlah" id="jumlah" class="form-control text-center" value="1"
                            min="1" required>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus me-2"></i>Tambah ke
                            Keranjang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>