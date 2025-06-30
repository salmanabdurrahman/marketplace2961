<style>
    .account-nav .list-group-item.active {
        background-color: var(--green-dark);
        border-color: var(--green-dark);
    }

    .table-hover>tbody>tr:hover>* {
        background-color: var(--green-light);
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
    <div class="row">
        <!-- Kolom Navigasi Samping -->
        <div class="col-lg-3 mb-4 mb-lg-0">
            <nav class="account-nav">
                <div class="list-group">
                    <a href="<?php echo base_url('transaksi'); ?>"
                        class="list-group-item list-group-item-action active">
                        <i class="bi bi-receipt me-2"></i> Riwayat Pembelian
                    </a>
                    <a href="<?php echo base_url('akun'); ?>" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-circle me-2"></i> Profil Saya
                    </a>
                    <a href="<?php echo base_url('logout'); ?>"
                        class="list-group-item list-group-item-action text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </div>
            </nav>
        </div>
        <!-- Kolom Konten Utama -->
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Riwayat Transaksi Pembelian -
                        <?php echo $this->session->userdata("nama_member"); ?>
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Resi</th>
                                    <th class="pe-4">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $k => $v): ?>
                                    <tr>
                                        <td class="ps-4"><?php echo $k + 1 ?></td>
                                        <td><?php echo date("d M Y H:i", strtotime($v["tanggal_transaksi"])) ?></td>
                                        <td>Rp. <?php echo number_format($v["total_transaksi"], 0, ',', '.') ?></td>
                                        <td>
                                            <?php
                                            $status = strtolower($v["status_transaksi"]);
                                            $badge_class = 'status-default';
                                            if ($status == 'pending')
                                                $badge_class = 'status-pending';
                                            if ($status == 'lunas')
                                                $badge_class = 'status-lunas';
                                            if ($status == 'batal')
                                                $badge_class = 'status-batal';
                                            ?>
                                            <span
                                                class="badge <?php echo $badge_class; ?>"><?php echo $v["status_transaksi"]; ?></span>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($v["resi_ekspedisi"] ?? ''); ?>
                                        </td>
                                        <td class="pe-4">
                                            <a href="<?php echo base_url('/transaksi/detail/' . $v["id_transaksi"]); ?>"
                                                class="btn btn-outline-secondary btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>