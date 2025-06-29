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

    .badge.status-diproses {
        background-color: #0dcaf0;
    }

    .badge.status-dikirim {
        background-color: #0d6efd;
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
        <a href="<?php echo base_url('/seller/transaksi'); ?>" class="text-decoration-none fw-semibold"
            style="color: var(--green-accent);">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Penjualan
        </a>
    </div>
    <div class="row g-4">
        <!-- Kolom Kiri: Detail Invoice -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm invoice-card">
                <div class="card-header invoice-header p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="mb-1">Detail Penjualan</h4>
                            <p class="text-muted mb-0">ID: <?php echo $transaksi["id_transaksi"]; ?></p>
                        </div>
                        <div class="text-end">
                            <?php
                            $status = strtolower($transaksi["status_transaksi"]);
                            $badge_class = 'status-default';
                            if ($status == 'pending')
                                $badge_class = 'status-pending';
                            if ($status == 'lunas')
                                $badge_class = 'status-lunas';
                            if ($status == 'diproses')
                                $badge_class = 'status-diproses';
                            if ($status == 'dikirim')
                                $badge_class = 'status-dikirim';
                            if ($status == 'batal')
                                $badge_class = 'status-batal';
                            ?>
                            <span
                                class="badge fs-6 <?php echo $badge_class; ?>"><?php echo $transaksi["status_transaksi"]; ?></span>
                            <p class="text-muted small mt-1">
                                <?php echo date('d M Y H:i', strtotime($transaksi["tanggal_transaksi"])) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Info Pembeli:</h6>
                            <p class="text-muted small mb-0">
                                <?php echo $transaksi["nama_penerima"]; ?><br>
                                <?php echo $transaksi["wa_penerima"]; ?><br>
                                <?php echo $transaksi["alamat_penerima"]; ?>,
                                <?php echo $transaksi["distrik_penerima"]; ?>
                            </p>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <h6>Info Pengiriman:</h6>
                            <p class="text-muted small mb-0">
                                <?php echo strtoupper($transaksi["nama_ekspedisi"]); ?>
                                (<?php echo $transaksi["layanan_ekspedisi"]; ?>)<br>
                                Berat: <?php echo $transaksi["berat_ekspedisi"]; ?> gram
                            </p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi_detail as $k => $v): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v["nama_beli"]; ?><br>
                                            <small class="text-muted"><?php echo $v["jumlah_beli"]; ?> x Rp.
                                                <?php echo number_format($v["harga_beli"], 0, ',', '.'); ?></small>
                                        </td>
                                        <td class="text-end">Rp.
                                            <?php echo number_format($v["harga_beli"] * $v["jumlah_beli"], 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-end border-0">Total Belanja:</td>
                                    <th class="text-end border-0">Rp.
                                        <?php echo number_format($transaksi["belanja_transaksi"], 0, ',', '.'); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td class="text-end border-0">Ongkos Kirim:</td>
                                    <th class="text-end border-0">Rp.
                                        <?php echo number_format($transaksi["ongkir_transaksi"], 0, ',', '.'); ?>
                                    </th>
                                </tr>
                                <tr class="h5">
                                    <td class="text-end border-0">Total Penjualan:</td>
                                    <th class="text-end border-0" style="color:var(--green-dark);">Rp.
                                        <?php echo number_format($transaksi["total_transaksi"], 0, ',', '.'); ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kolom Kanan: Aksi Penjual -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="position: sticky; top: 100px;">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Tindakan Penjual</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo base_url('seller/transaksi/update/' . $transaksi["id_transaksi"]); ?>"
                        method="post">
                        <div class="mb-3">
                            <label for="status_transaksi" class="form-label">Ubah Status Pesanan</label>
                            <select name="status_transaksi" id="status_transaksi" class="form-select">
                                <option value="Diproses" <?php if ($transaksi['status_transaksi'] == 'Diproses')
                                    echo 'selected'; ?>>Diproses</option>
                                <option value="Dikirim" <?php if ($transaksi['status_transaksi'] == 'Dikirim')
                                    echo 'selected'; ?>>Dikirim</option>
                                <option value="Selesai" <?php if ($transaksi['status_transaksi'] == 'Selesai')
                                    echo 'selected'; ?>>Selesai</option>
                                <option value="Batal" <?php if ($transaksi['status_transaksi'] == 'Batal')
                                    echo 'selected'; ?>>Batal</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_resi" class="form-label">Nomor Resi</label>
                            <input type="text" class="form-control" name="nomor_resi" id="nomor_resi"
                                value="<?php echo $transaksi['nomor_resi'] ?? ''; ?>" placeholder="Masukkan nomor resi">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Pesanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>