<style>
    .invoice-card {
        border-radius: 0.75rem;
    }

    .invoice-header {
        background-color: var(--green-light);
        border-bottom: 1px solid #ddd;
    }

    .badge.status-pending {
        background-color: #ffc107;
        color: #000;
    }

    .badge.status-lunas {
        background-color: #198754;
    }

    .badge.status-batal {
        background-color: #dc3545;
    }

    .badge.status-default {
        background-color: #6c757d;
    }

    .rating-stars {
        display: inline-flex;
        gap: 0.25rem;
        cursor: pointer;
    }

    .rating-stars .bi {
        font-size: 1.5rem;
        color: #ccc;
        transition: color 0.2s;
    }

    .rating-stars:hover .bi {
        color: #ffc107 !important;
    }

    .rating-stars .bi:hover~.bi {
        color: #ccc !important;
    }

    .rating-stars .bi.selected {
        color: #ffc107;
    }
</style>

<main class="container py-5">
    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="<?php echo base_url('/transaksi'); ?>" class="text-decoration-none fw-semibold"
            style="color: var(--green-accent);">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Pembelian
        </a>
    </div>
    <div class="card border-0 shadow-sm invoice-card">
        <!-- Header Invoice -->
        <div class="card-header invoice-header p-4">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h4 class="mb-1">Detail Transaksi</h4>
                    <p class="text-muted mb-0">ID: <?php echo $transaksi["id_transaksi"] ?? 'N/A'; ?></p>
                </div>
                <div>
                    <?php
                    $status = strtolower($transaksi["status_transaksi"] ?? '-');
                    $badge_class = 'status-default';
                    if ($status == 'pending')
                        $badge_class = 'status-pending';
                    if ($status == 'lunas')
                        $badge_class = 'status-lunas';
                    if ($status == 'batal')
                        $badge_class = 'status-batal';
                    ?>
                    <span
                        class="badge fs-6 <?php echo $badge_class; ?>"><?php echo $transaksi["status_transaksi"] ?? '-'; ?></span>
                    <p class="text-muted small mt-1 text-end">
                        <?php echo date('d M Y H:i', strtotime($transaksi["tanggal_transaksi"] ?? '')) ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Body Invoice -->
        <div class="card-body p-4">
            <!-- Informasi Pengirim & Penerima -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <h6>Dikirim oleh:</h6>
                    <p class="text-muted small mb-0">
                        <?php echo $transaksi["nama_pengirim"]; ?><br><?php echo $transaksi["alamat_pengirim"] ?? ''; ?>,
                        <?php echo $transaksi["distrik_pengirim"] ?? ''; ?><br><?php echo $transaksi["wa_pengirim"] ?? ''; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h6>Dikirim kepada:</h6>
                    <p class="text-muted small mb-0">
                        <?php echo $transaksi["nama_penerima"]; ?><br><?php echo $transaksi["alamat_penerima"] ?? ''; ?>,
                        <?php echo $transaksi["distrik_penerima"] ?? ''; ?><br><?php echo $transaksi["wa_penerima"] ?? ''; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h6>Ekspedisi:</h6>
                    <p class="text-muted small mb-0">
                        <?php echo strtoupper($transaksi["nama_ekspedisi"] ?? ''); ?><br><?php echo $transaksi["layanan_ekspedisi"] ?? ''; ?>
                        (Est. <?php echo $transaksi["estimasi_ekspedisi"] ?? ''; ?> hari)
                    </p>
                    <div class="mt-2">
                        <?php
                        $resi = $transaksi["resi_ekspedisi"] ?? '';
                        ?>
                        <span class="fw-semibold">No. Resi:</span>
                        <?php if (!empty($resi)): ?>
                            <span class="text-success"><?php echo htmlspecialchars($resi); ?></span>
                        <?php elseif (empty($resi) && $transaksi["status_transaksi"] === 'lunas'): ?>
                            <span class="text-danger">Belum dikirim</span>
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Tabel Rincian Produk -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-end">Harga Satuan</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi_detail as $k => $v): ?>
                                <tr>
                                    <td><?php echo $v["nama_beli"] ?? ''; ?></td>
                                    <td class="text-center"><?php echo $v["jumlah_beli"] ?? ''; ?></td>
                                    <td class="text-end">Rp.
                                        <?php echo number_format($v["harga_beli"] ?? 0, 0, ',', '.'); ?>
                                    </td>
                                    <td class="text-end">Rp.
                                        <?php echo number_format($v["harga_beli"] * $v["jumlah_beli"], 0, ',', '.'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end border-0">Total Belanja:</th>
                                <th class="text-end border-0">Rp.
                                    <?php echo number_format($transaksi["belanja_transaksi"] ?? 0, 0, ',', '.'); ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end border-0">Ongkos Kirim:</th>
                                <th class="text-end border-0">Rp.
                                    <?php echo number_format($transaksi["ongkir_transaksi"] ?? 0, 0, ',', '.'); ?>
                                </th>
                            </tr>
                            <tr class="h5">
                                <th colspan="3" class="text-end border-0">Total Pembayaran:</th>
                                <th class="text-end border-0" style="color:var(--green-dark);">Rp.
                                    <?php echo number_format($transaksi["total_transaksi"] ?? 0, 0, ',', '.'); ?>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- Tombol Bayar Manual -->
                <?php if (strtolower($transaksi['status_transaksi'] ?? '') !== 'lunas' && isset($snapToken)): ?>
                    <div class="d-grid mt-1">
                        <button id="pay-button" class="btn btn-warning btn-lg"><i
                                class="bi bi-credit-card me-2"></i>Lanjutkan
                            Pembayaran</button>
                    </div>
                <?php endif; ?>
                <!-- Detail Pembayaran Midtrans (jika ada) -->
                <?php if (isset($fromMidtrans) && is_array($fromMidtrans)): ?>
                    <hr class="my-4">
                    <div class="card bg-light border-dashed">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Detail Pembayaran</h6>
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.reload();">
                                    <i class="bi bi-arrow-clockwise"></i> Cek Status
                                </button>
                            </div>
                            <dl class="row mb-0 small">
                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8 fw-semibold">
                                    <?php
                                    $status = $fromMidtrans['transaction_status'] ?? null;
                                    if ($status === 'settlement') {
                                        echo 'Lunas';
                                    } elseif ($status) {
                                        echo htmlspecialchars(ucwords(str_replace('_', ' ', $status)));
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </dd>
                                <dt class="col-sm-4">Order ID</dt>
                                <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['order_id'] ?? '-'); ?></dd>
                                <dt class="col-sm-4">Transaction ID</dt>
                                <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['transaction_id'] ?? '-'); ?>
                                </dd>
                                <dt class="col-sm-4">Tipe Pembayaran</dt>
                                <dd class="col-sm-8">
                                    <?php echo ucwords(str_replace('_', ' ', htmlspecialchars($fromMidtrans['payment_type'] ?? '-'))); ?>
                                </dd>
                                <?php
                                // Virtual Account (va_numbers)
                                if (!empty($fromMidtrans['va_numbers']) && is_array($fromMidtrans['va_numbers'])):
                                    ?>
                                    <dt class="col-sm-4">Virtual Account</dt>
                                    <dd class="col-sm-8">
                                        <?php foreach ($fromMidtrans['va_numbers'] as $va): ?>
                                            <div>
                                                <strong><?php echo strtoupper(htmlspecialchars($va['bank'] ?? '-')); ?>:</strong>
                                                <?php echo htmlspecialchars($va['va_number'] ?? '-'); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </dd>
                                <?php endif; ?>
                                <?php
                                // Permata VA
                                if (!empty($fromMidtrans['permata_va_number'])):
                                    ?>
                                    <dt class="col-sm-4">Permata VA</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['permata_va_number']); ?>
                                    </dd>
                                <?php endif; ?>
                                <?php
                                // BCA KlikPay
                                if (!empty($fromMidtrans['bca_va_number'])):
                                    ?>
                                    <dt class="col-sm-4">BCA VA</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['bca_va_number']); ?></dd>
                                <?php endif; ?>
                                <?php
                                // E-Channel (Mandiri Bill)
                                if (!empty($fromMidtrans['bill_key']) && !empty($fromMidtrans['biller_code'])):
                                    ?>
                                    <dt class="col-sm-4">Mandiri Bill Key</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['bill_key']); ?></dd>
                                    <dt class="col-sm-4">Mandiri Biller Code</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['biller_code']); ?></dd>
                                <?php endif; ?>
                                <?php
                                // Convenience Store (Indomaret/Alfamart)
                                if (!empty($fromMidtrans['payment_code'])):
                                    ?>
                                    <dt class="col-sm-4">Kode Pembayaran</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['payment_code']); ?></dd>
                                <?php endif; ?>
                                <?php
                                // QRIS
                                if (!empty($fromMidtrans['qr_string'])):
                                    ?>
                                    <dt class="col-sm-4">QRIS String</dt>
                                    <dd class="col-sm-8">
                                        <textarea class="form-control form-control-sm"
                                            readonly><?php echo htmlspecialchars($fromMidtrans['qr_string']); ?></textarea>
                                    </dd>
                                <?php endif; ?>
                                <dt class="col-sm-4">Jumlah</dt>
                                <dd class="col-sm-8">
                                    Rp.
                                    <?php echo number_format(floatval($fromMidtrans['gross_amount'] ?? 0), 0, ',', '.'); ?>
                                    <?php if (!empty($fromMidtrans['currency'])): ?>
                                        <span
                                            class="text-muted">(<?php echo htmlspecialchars($fromMidtrans['currency']); ?>)</span>
                                    <?php endif; ?>
                                </dd>
                                <dt class="col-sm-4">Batas Waktu</dt>
                                <dd class="col-sm-8">
                                    <?php
                                    $expiry = $fromMidtrans['expiry_time'] ?? null;
                                    if ($expiry) {
                                        echo date('d M Y, H:i:s', strtotime(htmlspecialchars($expiry)));
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </dd>
                                <dt class="col-sm-4">Waktu Transaksi</dt>
                                <dd class="col-sm-8">
                                    <?php
                                    $trxTime = $fromMidtrans['transaction_time'] ?? null;
                                    if ($trxTime) {
                                        echo date('d M Y, H:i:s', strtotime(htmlspecialchars($trxTime)));
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (strtolower($transaksi['status_transaksi'] ?? '') === 'lunas'): ?>
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white" style="margin-top: -2rem;">
                    <h5 class="mb-0">Beri Ulasan Produk</h5>
                </div>
                <div class="card-body p-4">
                    <form action="" method="post"> <?php foreach ($transaksi_detail as $k => $v): ?>
                            <?php if (!empty($v['ulasan_rating']) && !empty($v['jumlah_rating'])): ?>
                                <div class="mb-4 pb-3 border-bottom bg-light rounded p-3">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <p class="mb-0 fw-semibold"><?php echo $v["nama_beli"] ?? '-'; ?></p>
                                        <small class="text-success"><i class="bi bi-check-circle-fill"></i> Ulasan diberikan</small>
                                    </div>
                                    <!-- Tampilkan Rating Bintang -->
                                    <div class="mb-2">
                                        <?php
                                        $rating = intval($v['jumlah_rating'] ?? 0);
                                        for ($i = 1; $i <= 5; $i++):
                                            ?>
                                            <i class="bi <?php echo $i <= $rating ? 'bi-star-fill' : 'bi-star'; ?>"
                                                style="color: #ffc107; font-size: 1.2rem;"></i>
                                        <?php endfor; ?>
                                        <span class="ms-2 text-muted small">(<?php echo $rating; ?>/5)</span>
                                    </div>
                                    <!-- Tampilkan Komentar -->
                                    <?php if (!empty($v['ulasan_rating'])): ?>
                                        <div class="bg-white p-2 rounded border-start border-3"
                                            style="border-color: #ffc107 !important;">
                                            <small class="text-muted d-block mb-1">Ulasan Anda:</small>
                                            <p class="mb-0 small"><?php echo nl2br(htmlspecialchars($v['ulasan_rating'])); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="mb-4 pb-3 border-bottom">
                                    <p class="mb-1 fw-semibold"><?php echo $v["nama_beli"] ?? '-'; ?></p>
                                    <input type="hidden" name="id_transaksi_detail[]"
                                        value="<?php echo $v['id_transaksi_detail']; ?>">
                                    <input type="hidden" class="jumlah_rating" name="jumlah_rating[]">
                                    <div class="rating-stars mb-2" data-product-id="<?php echo $v['id_produk']; ?>">
                                        <i class="bi bi-star" data-value="1"></i>
                                        <i class="bi bi-star" data-value="2"></i>
                                        <i class="bi bi-star" data-value="3"></i>
                                        <i class="bi bi-star" data-value="4"></i>
                                        <i class="bi bi-star" data-value="5"></i>
                                    </div>
                                    <div class="text-danger small"><?php echo form_error("jumlah_rating[]"); ?></div>
                                    <textarea name="ulasan_rating[]" class="form-control form-control-sm" rows="3"
                                        placeholder="Bagaimana pendapatmu tentang produk ini?"></textarea>
                                    <div class="text-danger small mt-1"><?php echo form_error("ulasan_rating[]"); ?></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (empty($v['ulasan_rating']) && empty($v['jumlah_rating'])): ?>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Kirim Semua Ulasan</button>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        <?php endif; ?>
</main>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="<?php echo $_ENV['MIDTRANS_CLIENT_KEY']; ?>"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const snapToken = '<?php echo $snapToken ?? "" ?>';
        const localStatus = '<?php echo strtolower($transaksi["status_transaksi"] ?? ""); ?>';
        const payButton = document.getElementById('pay-button');

        function triggerPayment() {
            if (snapToken) {
                snap.pay(snapToken, {
                    onSuccess: function (result) { window.location.reload(); },
                    onPending: function (result) { window.location.reload(); },
                    onError: function (result) { window.location.reload(); },
                    onClose: function () {
                        console.log('Popup ditutup. Klik tombol "Lanjutkan Pembayaran" untuk membuka lagi.');
                    }
                });
            }
        }

        if (localStatus !== 'lunas') {
            triggerPayment();
        }

        if (payButton) {
            payButton.addEventListener('click', function () {
                triggerPayment();
            });
        }
    })
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allRatingContainers = document.querySelectorAll('.rating-stars');

        allRatingContainers.forEach(container => {
            const stars = container.querySelectorAll('.bi');
            const jumlahInput = container.parentElement.querySelector('.jumlah_rating');

            stars.forEach(star => {
                star.addEventListener('click', function () {
                    const value = this.getAttribute('data-value');

                    stars.forEach(s => {
                        if (parseInt(s.getAttribute('data-value')) <= value) {
                            s.classList.add('selected');
                            s.classList.remove('bi-star');
                            s.classList.add('bi-star-fill');
                        } else {
                            s.classList.remove('selected');
                            s.classList.remove('bi-star-fill');
                            s.classList.add('bi-star');
                        }
                    });

                    if (jumlahInput) {
                        jumlahInput.value = value;
                    }
                });
            });
        });
    });
</script>