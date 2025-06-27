<div class="container">
    <div class="row mb-5">
        <div class="col-md-3">
            <h5>Transaksi</h5>
            <p>Id: <?php echo $transaksi["id_transaksi"]; ?></p>
            <p>Waktu: <?php echo date('d M Y H:i', strtotime($transaksi["tanggal_transaksi"])) ?></p>
            <span class="badge bg-primary"><?php echo $transaksi["status_transaksi"]; ?></span>
        </div>
        <div class="col-md-3">
            <h5>Pengirim</h5>
            <p><?php echo $transaksi["nama_pengirim"]; ?>, <?php echo $transaksi["wa_pengirim"]; ?></p>
            <p><?php echo $transaksi["alamat_pengirim"]; ?>, <?php echo $transaksi["distrik_pengirim"]; ?></p>
        </div>
        <div class="col-md-3">
            <h5>Penerima</h5>
            <p><?php echo $transaksi["nama_penerima"]; ?>, <?php echo $transaksi["wa_penerima"]; ?></p>
            <p><?php echo $transaksi["alamat_penerima"]; ?>, <?php echo $transaksi["distrik_penerima"]; ?></p>
        </div>
        <div class="col-md-3">
            <h5>Ekspedisi</h5>
            <p><?php echo $transaksi["nama_ekspedisi"]; ?>, <?php echo $transaksi["layanan_ekspedisi"]; ?></p>
            <p><?php echo $transaksi["estimasi_ekspedisi"]; ?>, <?php echo $transaksi["berat_ekspedisi"]; ?></p>
        </div>
    </div>
    <h5>Detail Produk</h5>
    <table class="table table-bordered table-hover" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi_detail as $k => $v): ?>
                <tr>
                    <td><?php echo $k + 1 ?></td>
                    <td><?php echo $v["nama_beli"]; ?></td>
                    <td><?php echo "Rp." . number_format($v["harga_beli"], 0, ',', '.'); ?></td>
                    <td><?php echo $v["jumlah_beli"]; ?></td>
                    <td><?php echo "Rp." . number_format($v["harga_beli"] * $v["jumlah_beli"], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total Belanja</td>
                <th><?php echo "Rp." . number_format($transaksi["belanja_transaksi"], 0, ',', '.'); ?></th>
            </tr>
            <tr>
                <td colspan="4">Ongkos Kirim</td>
                <th><?php echo "Rp." . number_format($transaksi["ongkir_transaksi"], 0, ',', '.'); ?></th>
            </tr>
            <tr>
                <td colspan="4">Total Harga</td>
                <th><?php echo "Rp." . number_format($transaksi["total_transaksi"], 0, ',', '.'); ?></th>
            </tr>
        </tfoot>
    </table>
    <div class="text-start mt-3">
        <?php if (isset($fromMidtrans) && is_array($fromMidtrans)): ?>
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Detail Pembayaran Midtrans</strong>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.reload();">
                        Reload Status
                    </button>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Status Transaksi</dt>
                        <dd class="col-sm-8">
                            <?php
                            if (!empty($fromMidtrans['transaction_status'])) {
                                echo htmlspecialchars($fromMidtrans['transaction_status'] === 'settlement' ? 'Lunas' : 'Segera lakukan pembayaran');
                            } else {
                                echo '-';
                            }
                            ?>
                        </dd>
                        <dt class="col-sm-4">Waktu Transaksi</dt>
                        <dd class="col-sm-8">
                            <?php
                            if (!empty($fromMidtrans['transaction_time'])) {
                                $tanggal = date('d M Y H:i', strtotime($fromMidtrans['transaction_time']));
                                echo htmlspecialchars($tanggal);
                            } else {
                                echo '-';
                            }
                            ?>
                        </dd>
                        <dt class="col-sm-4">Gross Amount</dt>
                        <dd class="col-sm-8">
                            <?php
                            if (!empty($fromMidtrans['gross_amount'])) {
                                echo "Rp. " . number_format((float) $fromMidtrans['gross_amount'], 0, ',', '.');
                            } else {
                                echo '-';
                            }
                            ?>
                        </dd>
                        <dt class="col-sm-4">Tipe Pembayaran</dt>
                        <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['payment_type'] ?? '-'); ?></dd>
                        <dt class="col-sm-4">Merchant ID</dt>
                        <dd class="col-sm-8"><?php echo htmlspecialchars($fromMidtrans['merchant_id'] ?? '-'); ?></dd>
                        <?php if (!empty($fromMidtrans['va_numbers']) && is_array($fromMidtrans['va_numbers'])): ?>
                            <dt class="col-sm-4">Nomor Virtual Account</dt>
                            <dd class="col-sm-8">
                                <ul class="mb-0">
                                    <?php foreach ($fromMidtrans['va_numbers'] as $va): ?>
                                        <li>
                                            <strong><?php echo strtoupper(htmlspecialchars($va['bank'] ?? '-')); ?>:</strong>
                                            <?php echo htmlspecialchars($va['va_number'] ?? '-'); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </dd>
                        <?php endif; ?>
                        <dt class="col-sm-4">Kadaluarsa Pembayaran</dt>
                        <dd class="col-sm-8">
                            <?php
                            if (!empty($fromMidtrans['expiry_time'])) {
                                $tanggal = date('d M Y H:i', strtotime($fromMidtrans['expiry_time']));
                                echo htmlspecialchars($tanggal);
                            } else {
                                echo '-';
                            }
                            ?>
                    </dl>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="<?php echo $_ENV['MIDTRANS_CLIENT_KEY']; ?>"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        snap.pay('<?= $snapToken ?>', {
            onSuccess: function (result) {
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onPending: function (result) {
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function (result) {
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    })
</script>