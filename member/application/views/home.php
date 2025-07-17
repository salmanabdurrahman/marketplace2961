<style>
    .stat-card {
        border: none;
        border-radius: 0.75rem;
        background-color: var(--green-light);
        color: var(--green-dark);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
    }

    .stat-card .stat-icon {
        font-size: 2.5rem;
        opacity: 0.5;
    }

    .stat-card .stat-number {
        font-size: 2rem;
        font-weight: 700;
    }

    .stat-card .stat-label {
        font-size: 0.9rem;
    }
</style>

<main class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4 mb-lg-0">
             <?php require APPPATH . 'views/layout/customer-sidebar.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="mb-4">
                <h4 class="fw-bold">Selamat Datang, <?php echo $this->session->userdata("nama_member"); ?>!</h4>
                <p class="text-muted">Melalui panel ini Anda dapat mengelola aktivitas jual beli produk Anda.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stat-card p-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="stat-number mb-0"><?php echo $jumlah_produk_dijual ?? 0; ?></p>
                                <p class="stat-label mb-0">Produk Dijual</p>
                            </div>
                            <i class="bi bi-box-seam stat-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card p-3">
                         <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="stat-number mb-0"><?php echo $jumlah_penjualan ?? 0; ?></p>
                                <p class="stat-label mb-0">Total Penjualan</p>
                            </div>
                            <i class="bi bi-arrow-up-right-circle stat-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card p-3">
                         <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="stat-number mb-0"><?php echo $jumlah_pembelian ?? 0; ?></p>
                                <p class="stat-label mb-0">Total Pembelian</p>
                            </div>
                            <i class="bi bi-arrow-down-left-circle stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Aktivitas Terbaru</h5>
                </div>
                <div class="card-body p-4">
                    <h6>5 Penjualan Terakhir</h6>
                    <div class="table-responsive mb-4">
                        <table class="table table-sm">
                            <tbody>
                                <?php if(empty($penjualan_terakhir)): ?>
                                    <tr><td class="text-muted text-center">Belum ada penjualan.</td></tr>
                                <?php else: ?>
                                    <?php foreach($penjualan_terakhir as $jual): ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url('/seller/transaksi/detail/' . $jual['id_transaksi']); ?>">#<?php echo $jual['id_transaksi']; ?></a></td>
                                        <td>Kepada: <?php echo $jual['nama_penerima']; ?></td>
                                        <td class="text-end">Rp. <?php echo number_format($jual['total_transaksi'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <h6>5 Pembelian Terakhir</h6>
                     <div class="table-responsive">
                        <table class="table table-sm">
                           <tbody>
                                <?php if(empty($pembelian_terakhir)): ?>
                                    <tr><td class="text-muted text-center">Belum ada pembelian.</td></tr>
                                <?php else: ?>
                                    <?php foreach($pembelian_terakhir as $beli): ?>
                                    <tr>
                                        <td><a href="<?php echo base_url('/transaksi/detail/' . $beli['id_transaksi']); ?>">#<?php echo $beli['id_transaksi']; ?></a></td>
                                        <td>Dari: <?php echo $beli['nama_pengirim']; ?></td>
                                        <td class="text-end">Rp. <?php echo number_format($beli['total_transaksi'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>