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
                                <td class="text-end">Rp. <?php echo number_format($v["harga_beli"] ?? 0, 0, ',', '.'); ?>
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
                    <button id="pay-button" class="btn btn-warning btn-lg"><i class="bi bi-credit-card me-2"></i>Lanjutkan
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
                            <dt class="col-sm-4">Tipe Pembayaran</dt>
                            <dd class="col-sm-8">
                                <?php echo ucwords(str_replace('_', ' ', htmlspecialchars($fromMidtrans['payment_type'] ?? '-'))); ?>
                            </dd>
                            <?php if (!empty($fromMidtrans['va_numbers']) && is_array($fromMidtrans['va_numbers'])): ?>
                                <dt class="col-sm-4">Virtual Account</dt>
                                <dd class="col-sm-8">
                                    <?php foreach ($fromMidtrans['va_numbers'] as $va): ?>
                                        <strong><?php echo strtoupper(htmlspecialchars($va['bank'] ?? '-')); ?>:</strong>
                                        <?php echo htmlspecialchars($va['va_number'] ?? '-'); ?>
                                    <?php endforeach; ?>
                                </dd>
                            <?php endif; ?>
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
                        </dl>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="<?php echo $_ENV['MIDTRANS_CLIENT_KEY']; ?>"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const snapToken = '<?php echo $snapToken ?? "" ?>';
        const localStatus = '<?php echo strtolower($transaksi["status_transaksi"] ?? ""); ?>';
        const payButton = document.getElementById('pay-button');

        function triggerPayment() {
            snap.pay(snapToken, {
                onSuccess: function (result) { window.location.reload(); },
                onPending: function (result) { window.location.reload(); },
                onError: function (result) { window.location.reload(); },
                onClose: function () {
                    console.log('Popup ditutup. Klik tombol "Lanjutkan Pembayaran" untuk membuka lagi.');
                }
            });
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