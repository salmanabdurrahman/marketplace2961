<style>
    .summary-card {
        position: sticky;
        top: 100px;
    }

    .summary-item {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .summary-item img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: var(--bs-border-radius);
    }
</style>

<main class="container py-5">
    <div class="mb-4">
        <h2>Checkout Pesanan</h2>
    </div>
    <form method="POST" action="">
        <div class="row g-5">
            <!-- Kolom Kiri: Informasi Pengiriman -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Informasi Pengiriman</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Dikirim Dari:</strong>
                                <p class="text-muted mb-0">
                                    <?php echo $member_jual['nama_member']; ?><br><?php echo $member_jual['nama_distrik_member']; ?>
                                </p>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <strong>Dikirim Ke:</strong>
                                <p class="text-muted mb-0">
                                    <?php echo $member_beli['nama_member']; ?><br>
                                    <?php echo $member_beli['alamat_member']; ?>,
                                    <?php echo $member_beli['nama_distrik_member']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Opsi Pengiriman</h5>
                        <select name="ongkir" id="ongkirSelect" class="form-select" required <?php if (empty($biaya))
                            echo 'disabled'; ?>>
                            <option value="" hidden selected>
                                <?php echo empty($biaya) ? 'Opsi pengiriman tidak tersedia' : 'Pilih Jasa Pengiriman'; ?>
                            </option>
                            <?php foreach ($biaya as $key => $opsi): ?>
                                <option value='<?php echo json_encode($opsi); ?>'>
                                    <?php echo $opsi['name']; ?> - <?php echo $opsi['service']; ?> (Rp.
                                    <?php echo number_format($opsi['cost'], 0, ',', '.'); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-danger small mt-1"><?php echo form_error("ongkir"); ?></div>
                    </div>
                </div>
            </div>
            <!-- Kolom Kanan: Ringkasan Pesanan -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm summary-card">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body p-4">
                        <?php $sub_total = 0; ?>
                        <?php foreach ($keranjang as $item): ?>
                            <?php
                            if (isset($item["diskon"]) && $item["diskon"] > 0) {
                                $harga_diskon = $item["harga_produk"] - ($item["harga_produk"] * $item["diskon"] / 100);
                                $sub_total += $harga_diskon * $item['jumlah'];
                            } else {
                                $sub_total += $item['harga_produk'] * $item['jumlah'];
                            }
                            ?>
                            <div class="summary-item mb-3">
                                <img src="<?php echo $this->config->item("url_produk") . $item["foto_produk"]; ?>" alt="">
                                <div class="flex-grow-1">
                                    <p class="mb-0 small"><?php echo $item['nama_produk']; ?></p>
                                    <?php if (isset($item["diskon"]) && $item["diskon"] > 0): ?>
                                        <?php $harga_diskon = $item["harga_produk"] - ($item["harga_produk"] * $item["diskon"] / 100); ?>
                                        <p class="mb-0 small">
                                            <span style="text-decoration: line-through; color: #dc3545; font-size: 0.75rem;">Rp
                                                <?php echo number_format($item['harga_produk'], 0, ',', '.'); ?></span>
                                            <span class="fw-semibold">Rp
                                                <?php echo number_format($harga_diskon, 0, ',', '.'); ?></span>
                                        </p>
                                    <?php else: ?>
                                        <p class="mb-0 small text-muted">Rp
                                            <?php echo number_format($item['harga_produk'], 0, ',', '.'); ?>
                                        </p>
                                    <?php endif; ?>
                                    <p class="mb-0 small text-muted">x <?php echo $item['jumlah']; ?></p>
                                </div>
                                <p class="mb-0 small fw-semibold">Rp.
                                    <?php
                                    // Tampilkan subtotal dengan harga setelah diskon
                                    if (isset($item["diskon"]) && $item["diskon"] > 0) {
                                        $harga_diskon = $item["harga_produk"] - ($item["harga_produk"] * $item["diskon"] / 100);
                                        echo number_format($harga_diskon * $item['jumlah'], 0, ',', '.');
                                    } else {
                                        echo number_format($item['harga_produk'] * $item['jumlah'], 0, ',', '.');
                                    }
                                    ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                        <hr>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-semibold">Rp. <?php echo number_format($sub_total, 0, ',', '.'); ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Ongkos Kirim</span>
                            <span id="ongkirText" class="fw-semibold">-</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between h5">
                            <span>Total Pembayaran</span>
                            <span id="totalText" style="color: var(--green-dark);">Rp.
                                <?php echo number_format($sub_total, 0, ',', '.'); ?></span>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ongkirSelect = document.getElementById('ongkirSelect');
        const ongkirText = document.getElementById('ongkirText');
        const totalText = document.getElementById('totalText');
        const subtotal = <?php echo $sub_total; ?>;

        ongkirSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];

            if (!selectedOption.value) return;

            const ongkirData = JSON.parse(selectedOption.value);
            const cost = ongkirData.cost || 0;

            const formatter = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 });

            ongkirText.textContent = formatter.format(cost);
            const total = subtotal + cost;
            totalText.textContent = formatter.format(total);
        });
    });
</script>