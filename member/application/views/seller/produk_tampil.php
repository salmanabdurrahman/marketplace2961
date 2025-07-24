<style>
    .table-hover>tbody>tr:hover>* {
        background-color: var(--green-light);
    }

    .product-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 0.5rem;
    }
</style>

<main class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4 mb-lg-0">
            <?php require APPPATH . 'views/layout/customer-sidebar.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Produk Jual - <?php echo $this->session->userdata("nama_member"); ?></h5>
                        <a href="<?php echo base_url('/seller/produk/tambah'); ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th class="pe-4">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produk as $k => $v): ?>
                                    <tr>
                                        <td class="ps-4 align-middle"><?php echo $k + 1 ?></td>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo $this->config->item("url_produk") . $v["foto_produk"]; ?>"
                                                    alt="<?php echo $v["nama_produk"]; ?>" class="product-thumbnail me-3"
                                                    loading="lazy">
                                                <span><?php echo $v["nama_produk"]; ?></span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <?php if (isset($v["diskon"]) && $v["diskon"] > 0): ?>
                                                <?php $harga_diskon = $v["harga_produk"] - ($v["harga_produk"] * $v["diskon"] / 100); ?>
                                                <span
                                                    style="text-decoration: line-through; color: #dc3545; font-size: 0.9rem;">Rp.
                                                    <?php echo number_format($v["harga_produk"], 0, ',', '.') ?></span><br>
                                                <span>Rp. <?php echo number_format($harga_diskon, 0, ',', '.') ?></span>
                                                <span class="badge bg-danger">-<?php echo $v["diskon"]; ?>%</span>
                                            <?php else: ?>
                                                Rp. <?php echo number_format($v["harga_produk"], 0, ',', '.') ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php echo number_format($v["berat_produk"], 0, ',', '.') ?> gr
                                        </td>
                                        <td class="align-middle pe-4">
                                            <a href="<?php echo base_url('/seller/produk/edit/' . $v["id_produk"]); ?>"
                                                class="btn btn-outline-secondary btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?php echo base_url('/seller/produk/hapus/' . $v["id_produk"]); ?>"
                                                class="btn btn-outline-danger btn-sm" title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus data?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
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