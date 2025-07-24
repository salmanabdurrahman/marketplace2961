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

    /* Style untuk harga diskon */
    .price-original {
        text-decoration: line-through;
        color: #dc3545;
        font-size: 1.5rem;
        font-weight: normal;
        display: block;
    }

    .price-discount {
        color: var(--green-dark);
        font-weight: 700;
    }

    .discount-badge {
        background-color: #dc3545;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        margin-left: 0.5rem;
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
            <?php if (isset($produk["diskon"]) && $produk["diskon"] > 0): ?>
                <?php $harga_diskon = $produk["harga_produk"] - ($produk["harga_produk"] * $produk["diskon"] / 100); ?>
                <div class="mt-2 mb-4">
                    <span class="price-original">Rp.
                        <?php echo number_format($produk["harga_produk"], 0, ',', '.'); ?></span>
                    <p class="product-price h3 d-flex align-items-center mb-0">
                        <span class="price-discount">Rp. <?php echo number_format($harga_diskon, 0, ',', '.'); ?></span>
                        <span class="discount-badge">-<?php echo $produk["diskon"]; ?>%</span>
                    </p>
                </div>
            <?php else: ?>
                <p class="product-price h3 mt-2 mb-4">Rp. <?php echo number_format($produk["harga_produk"], 0, ',', '.'); ?>
                </p>
            <?php endif; ?>
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