<style>
    .cart-item {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .cart-item-img img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: var(--bs-border-radius);
    }

    .cart-item-details {
        flex-grow: 1;
    }

    .cart-item-price {
        color: var(--green-dark);
        font-weight: 600;
    }
</style>

<main class="container py-5">
    <div class="d-flex align-items-center mb-4">
        <h2 class="mb-0">Keranjang Belanja</h2>
    </div>
    <?php if (empty($keranjang)): ?>
        <div class="text-center py-5">
            <i class="bi bi-cart-x" style="font-size: 5rem; color: #ccc;"></i>
            <h4 class="mt-3">Keranjang belanjamu kosong</h4>
            <p class="text-muted">Yuk, cari produk menarik untuk diisi ke keranjang!</p>
            <a href="<?php echo base_url('/produk'); ?>" class="btn btn-primary mt-3">Mulai Belanja</a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <div class="col-12">
                <?php foreach ($keranjang as $key => $value): ?>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0"><i
                                    class="bi bi-shop me-2"></i><strong><?php echo $value['nama_member']; ?></strong></h6>
                        </div>
                        <div class="card-body">
                            <!-- Loop produk sesuai dengan logika asli -->
                            <?php foreach ($value['produk'] as $key_produk => $item_produk): // Menggunakan nama variabel berbeda agar tidak bentrok ?>
                                <div
                                    class="cart-item py-3 <?php echo ($key_produk < count($value['produk']) - 1) ? 'border-bottom' : '' ?>">
                                    <div class="cart-item-img">
                                        <img src="<?php echo $this->config->item("url_produk") . $item_produk["foto_produk"]; ?>"
                                            alt="<?php echo $item_produk['nama_produk']; ?>">
                                    </div>
                                    <div class="cart-item-details">
                                        <h6 class="mb-1"><?php echo $item_produk['nama_produk']; ?></h6>
                                        <?php if (isset($item_produk["diskon"]) && $item_produk["diskon"] > 0): ?>
                                            <?php $harga_diskon = $item_produk["harga_produk"] - ($item_produk["harga_produk"] * $item_produk["diskon"] / 100); ?>
                                            <p class="mb-0">
                                                <span style="text-decoration: line-through; color: #dc3545; font-size: 0.8rem;">Rp
                                                    <?php echo number_format($item_produk['harga_produk'], 0, ',', '.'); ?></span>
                                                <span class="cart-item-price">Rp
                                                    <?php echo number_format($harga_diskon, 0, ',', '.'); ?></span>
                                            </p>
                                        <?php else: ?>
                                            <p class="mb-0 cart-item-price">Rp
                                                <?php echo number_format($item_produk['harga_produk'], 0, ',', '.'); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-muted">
                                        Qty: <?php echo $item_produk['jumlah']; ?>
                                    </div>
                                    <a href="<?php echo site_url("keranjang/hapus/" . $item_produk['id_keranjang']); ?>"
                                        class="btn btn-link text-danger" title="Hapus item"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        <i class="bi bi-trash fs-5"></i>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="card-footer bg-white text-end">
                            <!-- Menggunakan $key dari loop terluar untuk id member penjual -->
                            <a href="<?php echo site_url("keranjang/checkout/" . $value['id_member_jual']); ?>"
                                class="btn btn-primary">
                                Checkout dari Toko ini <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</main>