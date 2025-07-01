<style>
    /* Menggunakan style yang konsisten dengan halaman home */
    .card-product {
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: none;
        transition: all 0.2s ease-in-out;
        height: 100%;
        border-radius: 0.75rem;
    }

    .card-product:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
        border-color: var(--green-accent);
    }

    .card-product .card-img-top {
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }

    .card-product .card-title {
        font-weight: 600;
        font-size: 1rem;
        color: #212529;
    }

    .card-product .card-price {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--green-dark);
    }
</style>

<main class="container py-5">
    <div class="pb-4 mb-4 border-bottom">
        <h2><?php echo $kategori["nama_kategori"]; ?></h2>
        <p class="text-muted">Jelajahi semua produk <?php echo strtolower($kategori["nama_kategori"]); ?> terbaik yang
            kami
            tawarkan.</p>
    </div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($produk as $k): ?>
            <div class="col">
                <a href="<?php echo base_url('produk/detail/' . $k["id_produk"]); ?>" class="text-decoration-none">
                    <div class="card card-product">
                        <img src="<?php echo $this->config->item("url_produk") . $k["foto_produk"]; ?>" class="card-img-top"
                            alt="<?php echo $k["nama_produk"]; ?>" loading="lazy">
                        <div class="card-body p-3">
                            <h3 class="card-title"><?php echo $k["nama_produk"]; ?></h3>
                            <p class="card-price">Rp. <?php echo number_format($k["harga_produk"], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>